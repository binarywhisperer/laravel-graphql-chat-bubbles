<?php

use Illuminate\Database\Seeder;

class ExampleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $channelNames = [
            'General' => 'Welcome. Stay a while and read.',
            'Trade Chat' => 'WTS [Tome of Laravel GraphQL] 1337G or best offer',
            'LFG' => 'The best way to look for groups. Irreplaceable.'
        ];

        foreach($channelNames as $name => $purpose){
            $channel = new \App\Channel();
            $channel->name = $name;
            $channel->purpose = $purpose;
            $channel->save();
        }

        factory('App\User', 10)->create()->each(function($user) use ($faker){
            $user->channels()->attach(1);
            for($i = 0; $i < $faker->numberBetween(1,10); $i++){
                $message = new \App\Message();
                $message->created_at = \Carbon\Carbon::now()->addMinutes(-1 * $faker->numberBetween(0, 30))->toDateTimeString();
                $message->payload = $faker->paragraph($faker->numberBetween(1, 3));
                $message->channel_id = 1;
                $message->user_id = $user->id;
                $message->save();
            }
        });
    }
}
