<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PrimarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => Hash::make('password'),
            'phone' => '0989586517',
            'photo' => 'https://picsum.photos/200/300'
        ]);

        User::factory(100)->create();
        Project::factory(100)->create();
        Task::factory(500)->create();
    }
}
