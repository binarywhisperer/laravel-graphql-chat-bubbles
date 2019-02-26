<?php

namespace App\GraphQL\Mutation;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Mutation;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateUser'
    ];

    public function type(){
        return GraphQL::type('User');
    }

    public function args(){
        return [
            'name' => ['name' => 'name', 'type' => Type::string()],
            'display' => ['name' => 'display', 'type' => Type::string()],
            'color' => ['name' => 'color', 'type' => Type::string()],
            'color_two' => ['name' => 'color_two', 'type' => Type::string()]
        ];
    }


    public function resolve($root, $args){
        $me = Auth::user();
        if(!$me){
            //return null;
        }

        $user = User::all()->first();
        $user->name = $args['name'];
        $user->display = $args['display'];
        $user->color = $args['color'];
        $user->color_two = $args['color_two'];
        $user->save();


        return $user;
    }
}