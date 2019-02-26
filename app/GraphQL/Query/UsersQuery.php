<?php

namespace App\GraphQL\Query;

use App\User;
use Rebing\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\Type;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'Users Query',
        'description' => 'A query of users'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('User'));
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
        if(isset($args['id'])){
            return User::where('id', $args['id'])->get();
        }elseif (isset($args['email'])){
            return User::where('email', $args['email'])->get();
        }
        return User::all();
    }
}