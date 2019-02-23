<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user'
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
            'display' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "The user's display name."
            ],
            'color' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "Primary color for the user."
            ],
            'color_two' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "Secondary color for the user."
            ],
            'messages' => [
                'args' => [
                    'channel_id' => [
                        'type' => Type::int(),
                        'description' => 'channel id of the message',
                    ],
                ],
                'type' => Type::listOf(GraphQL::type('Message')),
                'description' => 'Messages from the user.',
            ]
        ];
    }

    public function resolveMessagesField($root, $args)
    {
        if (isset($args['id'])) {
            return  $root->messages->where('id', $args['id']);
        }
        return $root->messages;
    }
}