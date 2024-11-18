<?php

namespace Esign\ScoutMultiWordDatabaseEngine;

use Laravel\Scout\Builder;
use Laravel\Scout\Engines\DatabaseEngine;

class ScoutMultiWordDatabaseEngine extends DatabaseEngine
{
    protected function initializeSearchQuery(Builder $builder, array $columns, array $prefixColumns = [], array $fullTextColumns = [])
    {
        if (blank($builder->query)) {
            return $builder->model->newQuery();
        }

        return $builder->model->newQuery()->where(function ($query) use ($builder, $columns, $prefixColumns, $fullTextColumns) {
            $connectionType = $builder->model->getConnection()->getDriverName();

            $canSearchPrimaryKey = ctype_digit($builder->query) &&
                                   in_array($builder->model->getKeyType(), ['int', 'integer']) &&
                                   ($connectionType != 'pgsql' || $builder->query <= PHP_INT_MAX) &&
                                   in_array($builder->model->getKeyName(), $columns);

            if ($canSearchPrimaryKey) {
                $query->orWhere($builder->model->getQualifiedKeyName(), $builder->query);
            }

            $likeOperator = $connectionType == 'pgsql' ? 'ilike' : 'like';

            foreach ($columns as $column) {
                if (in_array($column, $fullTextColumns)) {
                    $query->orWhereFullText(
                        $builder->model->qualifyColumn($column),
                        $builder->query,
                        $this->getFullTextOptions($builder)
                    );
                } else {
                    if ($canSearchPrimaryKey && $column === $builder->model->getKeyName()) {
                        continue;
                    }

                    $keywords = explode(' ', $builder->query);
                    $query->orWhere(function ($query) use ($builder, $column, $likeOperator, $keywords, $prefixColumns) {
                        foreach ($keywords as $keyword) {
                            $query->where(
                                $builder->model->qualifyColumn($column),
                                $likeOperator,
                                in_array($column, $prefixColumns) ? $keyword.'%' : '%'.$keyword.'%',
                            );
                        }
                    });
                }
            }
        });
    }
}
