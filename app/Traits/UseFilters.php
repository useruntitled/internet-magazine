<?php

namespace App\Traits;

trait UseFilters
{
    public function getQueries()
    {
        $queries = request()->query();
        unset($queries['page']);
        unset($queries['sorting']);

        return $queries;
    }

    public function getSorting()
    {
        $sorting = data_get(request()->query(), 'sorting');
        if ($sorting == 'new') {
            return ['created_at', 'desc'];
        }

        return ['created_at', 'asc'];
    }

    public function paginate(&$builder)
    {
        $page = request()->page;
        $builder = $builder->skip(($page - 1) * 5)->take(5);
    }
}
