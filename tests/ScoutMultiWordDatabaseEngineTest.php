<?php

namespace Esign\ScoutMultiWordDatabaseEngine\Tests;

use Esign\ScoutMultiWordDatabaseEngine\Tests\Support\Models\Post;
use PHPUnit\Framework\Attributes\Test;

class ScoutMultiWordDatabaseEngineTest extends TestCase
{
    #[Test]
    public function it_can_find_models_by_matching_multiple_words()
    {
        $postA = Post::create(['title' => 'The quick brown fox']);
        $postB = Post::create(['title' => 'The quick brown dog']);
        $postC = Post::create(['title' => 'The quick black fox']);

        $results = Post::search('brown quick')->get();

        $this->assertTrue($results->contains($postA));
        $this->assertTrue($results->contains($postB));
        $this->assertFalse($results->contains($postC));
    }
}
