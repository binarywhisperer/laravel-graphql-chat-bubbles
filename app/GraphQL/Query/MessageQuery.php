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
        'name' => 'Messages Qyert'
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
            'channel_id' => ['name' => 'channel_id', 'type' => Type::id()],
            'created_at' => ['name' => 'created_at', 'type' => Type::string()],
            'all' => ['name' => 'all', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args){
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['channel_id'])) {
                $query->where('channel_id',$args['channel_id']);
            }
        };

        $messages = Message::where($where)->orderBy('created_at', 'DESC');

        if(!isset($args['all'])) {
           $messages->take(5);
        }

        return $messages->get()->sortBy('created_at');
    }
}