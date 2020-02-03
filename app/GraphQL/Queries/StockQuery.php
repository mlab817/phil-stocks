<?php

namespace App\GraphQL\Queries;

use Closure;
use App\Models\Stock;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class StockQuery extends Query
{
    protected $attributes = [
        'name' => 'Stock query'
    ];

    public function type(): Type
    {
        return GraphQL::type('stock');
    }

    public function args(): array
    {
        return [
            'symbol' => ['name' => 'symbol', 'type' => Type::nonNull(Type::string()) ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $stock = Stock::find($args['symbol']);

        if (!$stock) {
          return null;
        }

        return $stock;
    }
}