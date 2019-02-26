<?php

namespace App\GraphQL\Query;

use App\User;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\Type;

class MeQuery extends Query
{
    protected $attributes = [
        'name' => 'Me Query',
        'description' => 'Get currently authed user'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::id()],
            'name' => ['name' => 'name', 'type' => Type::string()],
            'display' => ['name' => 'display', 'type' => Type::string()],
            'color' => ['name' => 'color', 'type' => Type::string()],
            'color_two' => ['name' => 'color_two', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args){
        $me = Auth::user();
        if(!$me){
            return null;
        }
        return $me;
    }
}