<?php

namespace Stephenjude\FilamentBlog\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filament-blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the blog resources';

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
     * @return int
     */
    public function handle()
    {
        $this->comment('Publishing Blog Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'filament-blog-config']);

        $this->comment('Publishing Filament Blog Migrations...');
        $this->callSilent('vendor:publish', ['--tag' => 'filament-blog-migrations']);
        $this->callSilent('vendor:publish', ['--tag' => 'tags-migrations']);

        $this->info('Filament blog was installed successfully.');

        return 0;
    }
}
