<?php


use Stephenjude\FilamentBlog\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

uses()->beforeEach(fn () => $this->artisan('migrate:fresh')->run())->in(__DIR__.'/Resources');
