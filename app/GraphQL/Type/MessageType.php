<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MessageType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Message',
        'description' => 'A user message in a channel.'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => "The id of the message."
            ],
            'payload' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "The user's name."
            ],
            'channel_id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => "The channel id of the message."
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "The creation time of the message."
            ]
        ];
    }
}