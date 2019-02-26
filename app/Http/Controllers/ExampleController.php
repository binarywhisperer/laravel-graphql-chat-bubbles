<?php

namespace App\Http\Controllers;

use App\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExampleController extends Controller
{
    function chatBubbles(){
        $me = Auth::user();
        if(!$me){
            $faker = Factory::create();
            $me = new User();
            $me->name = $faker->name;
            $me->display = $faker->userName;
            $me->color = $faker->hexColor;
            $me->color_two = $faker->hexColor;
            $me->email = $faker->email;
            $me->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; //secret
            $me->save();
            Auth::attempt(['email' => $me->email, 'password' => 'secret']);
        }

        return view('chat-bubbles');
    }
}
