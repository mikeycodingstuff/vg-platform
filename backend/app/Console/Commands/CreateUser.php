<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($data, [
            'name' => 'string|max:255',
            'email' => 'string|unique:users|max:255',
            'password' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            $this->comment(static::formatErrorsForConsole(errors: $validator->errors()));
            exit(1);
        }

        $validated = $validator->validated();

        $user = User::create($validated);
        $token = $user->createToken('api-token')->plainTextToken;

        if ($user) {
            $this->comment(static::formatForConsole($user, $token));
        }
    }

    /**
     * Formats the given text for a pretty console output.
     *
     * @param  string  $quote
     * @return string
     */
    protected static function formatForConsole(User $user, string $token): string
    {
        return sprintf(
            "\n  <options=bold>%s </>\n  %s\n",
            trim("User $user->id $user->name successfully created."),
            trim("API token: $token"),
        );
    }

    /**
     * Formats the given errors for a console output.
     *
     * @param MessageBag $errors
     * @return string
     */
    protected static function formatErrorsForConsole(MessageBag $errors): string
    {
        $errorMessages = "";

        foreach ($errors->all() as $message) {
            $errorMessages .= "\n  <fg=red>- $message</>";
        }

        return sprintf(
            "\n  <options=bold>%s</>\n",
            trim("Could not create user. Please try again with different information.$errorMessages"),
        );
    }
}
