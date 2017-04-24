<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateDoc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:doc:generate {--O|output=storage/docs : 文档生成位置}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate api doc';

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
        $output = $this->option('output');

        $docTempleteSourcePath = base_path("public/packages/apidoc/views/documentarian.blade.php");
        $docTempleteDistPath =  base_path("vendor/mpociot/laravel-apidoc-generator/src/resources/views/documentarian.blade.php");

        exec('cp '.$docTempleteSourcePath.' '.$docTempleteDistPath);

        // php artisan api:generate --routePrefix="v1" --output="storage/docs" --router="Dingo"
        $this->call('api:generate', [
            '--routePrefix' => 'v1',
            '--output' => $output,
            '--router' => "Dingo"
        ]);

        // git checkout documentarian file
//        exec('git checkout '.$docTempleteDistPath);

        $this->info('Generate api doc success!');
    }
}
