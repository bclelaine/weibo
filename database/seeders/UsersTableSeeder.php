<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create();

        $user = User::find(1);
        $user->name = 'bcl';
        $user->email = '1354690171@qq.com';
        $user->is_admin = true;
        $user->save();
    }
}
