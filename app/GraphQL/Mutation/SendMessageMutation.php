<?php

namespace App\GraphQL\Mutation;


use App\Message;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Mutation;

class SendMessageMutation extends Mutation
{
    protected $attributes = [
        'name' => 'sendMessage'
    ];

    public function type(){
        return GraphQL::type('Message');
    }

    public function args(){
        return [
            'payload' => ['name' => 'payload', 'type' => Type::string()],
            'channel_id' => ['name' => 'channel_id', 'type' => Type::int()]
        ];
    }


    public function resolve($root, $args){
        $me = Auth::user();
        if(!$me){
            //return null;
        }

        Message::create([
            'payload'  => $args['payload'],
            'channel_id'  => $args['channel_id'],
            'user_id' => 1
        ]);
    }
}