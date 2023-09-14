<?php

namespace Stephenjude\FilamentBlog\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Filament\Actions\ActionsServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Infolists\InfolistsServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Filament\Widgets\WidgetsServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use RyanChandler\BladeCaptureDirective\BladeCaptureDirectiveServiceProvider;
use Spatie\Tags\TagsServiceProvider;
use Stephenjude\FilamentBlog\BlogServiceProvider;
use Stephenjude\FilamentBlog\Tests\Models\User;
use Stephenjude\FilamentBlog\Tests\Panel\TestPanelProvider;

class TestCase extends Orchestra
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Stephenjude\\FilamentBlog\\Tests\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );

        $this->artisan(
            'migrate',
            ['--database' => 'testbench']
        )->run();
    }

    protected function getPackageProviders($app)
    {
        return [
            ActionsServiceProvider::class,
            BladeCaptureDirectiveServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            InfolistsServiceProvider::class,
            LivewireServiceProvider::class,
            NotificationsServiceProvider::class,
            SupportServiceProvider::class,
            TablesServiceProvider::class,
            WidgetsServiceProvider::class,
            TagsServiceProvider::class,

            BlogServiceProvider::class,

            TestPanelProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('auth.providers.users.model', User::class);
        config()->set('database.default', 'testbench');
        config()->set('app.key', 'base64:EWcFBKBT8lKlGK8nQhTHY+wg19QlfmbhtO9Qnn3NfcA=');

        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }
}
