<?php


declare(strict_types=1);

use Framework\{TemplateEngine, Database};
use App\Config\Paths;
use App\Services\VaildatorService;



return [
    TemplateEngine::class => fn() => new TemplateEngine(Paths::VIEW),
    VaildatorService::class => fn() => new VaildatorService(),
    Database::class => fn() => new Database($_ENV['DB_DRIVER'], [
        'host'  => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'dbname' => $_ENV['DB_NAME'],
    ], $_ENV['DB_USER'], $_ENV['DB_PASS'])
];
