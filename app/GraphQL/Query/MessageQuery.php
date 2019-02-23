<?php

namespace App\GraphQL\Query;

use App\Message;
use App\User;
use GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;

class MessageQuery extends Query
{
    protected $attributes = [
        'name' => 'messages'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Message'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
            'payload' => ['name' => 'payload', 'type' => Type::string()],
            'channel_id' => ['name' => 'id', 'type' => Type::id()]
        ];
    }

    public function resolve($root, $args){
        if(isset($args['id'])){
            return Message::find('id')->get();
        }elseif (isset($args['channel_id'])){
            return Message::where('channel_id', $args['channel_id'])->get();
        }
        return Message::all();
    }
}