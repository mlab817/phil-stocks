<?php

namespace App\GraphQL\Types;

use App\Models\History;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class HistoryType extends GraphQLType
{    
    protected $attributes = [
        'name'          => 'Stock history',
        'description'   => 'A stock historical data',
        'model'         => History::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the stock'
            ],
            'symbol' => [
                'type' => Type::string(),
                'description' => 'The symbol of the stock'
            ],
            'date' => [
              'type' => Type::string(),
              'description' => 'The date of the trade'
            ],
            'open' => [
              'type' => Type::float(),
              'description' => 'The opening daily trading price'
            ],
            'high' => [
              'type' => Type::float(),
              'description' => 'The highest daily trading price'
            ],
            'close' => [
              'type' => Type::float(),
              'description' => 'The closing daily trading price'
            ]
        ];
    }
}