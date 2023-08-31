<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ResetAutoIncrement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:increment {table : The name of the table to reset auto increment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset auto increment of a specified table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $table = $this->argument('table');
        try {
            $max = DB::table($table)->max('id') + 1;
            DB::statement("ALTER TABLE $table AUTO_INCREMENT =  $max");

            $this->info("Auto increment for table $table has been reset to $max");
        } catch (QueryException $e) {
            $this->comment(sprintf(
                "\n  <options=bold>%s</>\n  <fg=red>- %s</>",
                trim("Error resetting auto increment for table $table: "),
                trim($e->getMessage()),
            ));
        }
    }
}
