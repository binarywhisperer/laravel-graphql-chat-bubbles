<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ChannelType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Channel',
        'description' => 'A public channel'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => "The id of the user. Primary key on users table."
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "The user's name."
            ],
            'purpose' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "The channel's purpose."
            ]
        ];
    }
}