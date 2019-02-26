<?php

namespace App\GraphQL\Query;

use App\Channel;
use GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;

class ChannelsQuery extends Query
{
    protected $attributes = [
        'name' => 'Channel Query',
        'description' => 'A query of channels'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Channel'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
            'name' => ['name' => 'name', 'type' => Type::string()],
            'purpose' => ['name' => 'purpose', 'type' => Type::string()]
        ];
    }

    public function resolve($root, $args){
        if(isset($args['id'])){
            return Channel::where('id',$args['id'])->get();
        }

        return Channel::all();
    }
}