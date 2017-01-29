<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DumpQueries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:dump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump queries';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $migrator = app('migrator');
        $db = $migrator->resolveConnection(null);
        $migrations = $migrator->getMigrationFiles('database/migrations');
        $queries = [];

        foreach($migrations as $migration) {
            $migration = $migrator->resolve($migration);

            $queries[] = array_column($db->pretend(function() use ($migration) { $migration->up(); }), 'query');
        }

        dd($queries);
    }
}
