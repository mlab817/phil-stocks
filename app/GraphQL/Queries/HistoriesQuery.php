<?php

namespace App\GraphQL\Queries;

use Closure;
use App\Models\History;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class HistoriesQuery extends Query
{
    protected $attributes = [
        'name' => 'Stocks query'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('history');
    }

    public function args(): array
    {
        return [
            'symbol' => ['name' => 'symbol', 'type' => Type::nonNull(Type::string()) ],
            'limit' => ['name' => 'limit', 'type' => Type::int() ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $limit = (isset($args['limit']) && $args['limit']) ? $args['limit']: 100;
        $history = History::where('symbol', $args['symbol'])->paginate($limit);
        
        return $history;
    }
}