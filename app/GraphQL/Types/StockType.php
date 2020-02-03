<?php

namespace App\GraphQL\Types;

use App\Models\Stock;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StockType extends GraphQLType
{    
    protected $attributes = [
        'name'          => 'Stock',
        'description'   => 'A stock',
        'model'         => Stock::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the stock'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of stock'
            ],
            'symbol' => [
                'type' => Type::string(),
                'description' => 'The symbol of the stock'
            ],
            'histories' => [
              'type'        => Type::listOf(GraphQL::type('history')),
              'description' => 'The historical data'
            ],
            'count' => [
              'type' => Type::int(),
              'description' => 'Count of historical data entry',
              'selectable' => 'false'
            ]
        ];
    }
}