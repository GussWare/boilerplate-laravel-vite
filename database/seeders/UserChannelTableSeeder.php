<?php 
namespace Database\Seeders;

use App\Models\User;
use App\Models\Channel;
use Illuminate\Database\Seeder;

class UserChannelTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $channels = Channel::all();


        foreach ($users as $user) {
            $randomChannels = $channels->random(mt_rand(1, count($channels)));

            // Asignar los canales seleccionados al usuario
            foreach ($randomChannels as $channel) {
                $user->channels()->attach($channel->id);
            }
        }
    }
}
