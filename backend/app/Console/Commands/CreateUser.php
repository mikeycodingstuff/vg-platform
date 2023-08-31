<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = [
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => $this->argument('password'),
        ];
        
        $user = User::create($data);
        $token = $user->createToken('api-token')->plainTextToken;

        if ($user) {
            echo "User $user->id $user->name successfully created. API token: $token";
            echo PHP_EOL;
        } else {
            echo "Could not create user. Please try again with different information.";
            echo PHP_EOL;
        }
    }
}
