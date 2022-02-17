<?php


use Stephenjude\FilamentBlog\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

uses()->beforeEach(fn () => $this->artisan('migrate')->run())->in(__DIR__.'/Resources');
