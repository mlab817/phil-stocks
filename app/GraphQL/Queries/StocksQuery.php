<?php

namespace App\GraphQL\Queries;

use Closure;
use App\Models\Stock;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class StocksQuery extends Query
{
    protected $attributes = [
        'name' => 'Stocks query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('stock'));
    }

    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'name' => ['name' => 'name', 'type' => Type::string()],
            'symbol' => ['name' => 'symbol', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        if (isset($args['id'])) {
            return Stock::where('id' , $args['id'])->get();
        }

        if (isset($args['name'])) {
            return Stock::where('name', $args['name'])->get();
        }

        if (isset($args['symbol'])) {
          return Stock::where('symbol', $args['symbol'])->get();
        }

        return Stock::all();
    }
}