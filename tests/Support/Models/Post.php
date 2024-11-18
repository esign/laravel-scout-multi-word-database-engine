<?php

namespace Esign\ScoutMultiWordDatabaseEngine\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\EngineManager;
use Laravel\Scout\Engines\Engine;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    protected $guarded = [];
    public $timestamps = false;

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }

    public function searchableUsing(): Engine
    {
        return app(EngineManager::class)->engine('multi-word-database');
    }
}
