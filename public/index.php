<?php

require_once '../vendor/autoload.php';
session_start();

$container = new Illuminate\Container\Container();
$request = Illuminate\Http\Request::capture();

$request->setUserResolver(function () {
    return \App\Models\User::find($_SESSION['user_id']);
});

$container->instance('Illuminate\Http\Request', $request);

$manager = new \Illuminate\Database\Capsule\Manager();
$databaseConfig = require_once '../config/db.php';
$manager->addConnection($databaseConfig);
$manager->bootEloquent();
$manager->setAsGlobal();

$pathsToTemplates = ['../templates'];
$pathToCompiledTemplates = '../templates/compiled';

$filesystem = new \Illuminate\Filesystem\Filesystem();
$eventDispatcher = new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container());

$viewResolver = new \Illuminate\View\Engines\EngineResolver();
$bladeCompiler = new \Illuminate\View\Compilers\BladeCompiler($filesystem, $pathToCompiledTemplates);
$viewResolver->register('blade', function () use ($bladeCompiler, $filesystem) {
    return new \Illuminate\View\Engines\CompilerEngine($bladeCompiler, $filesystem);
});
$viewResolver->register('php', function () {
    return new \Illuminate\View\Engines\PhpEngine();
});

$viewFinder = new \Illuminate\View\FileViewFinder($filesystem, $pathsToTemplates);
$viewFactory = new \Illuminate\View\Factory($viewResolver, $viewFinder, $eventDispatcher);

$container->instance(\Illuminate\View\Factory::class, $viewFactory);

$events = new \Illuminate\Events\Dispatcher($container);
$router = new \Illuminate\Routing\Router($events, $container);

require_once '../routes.php';

$redirect = new \Illuminate\Routing\Redirector(new \Illuminate\Routing\UrlGenerator($router->getRoutes(), $request));
$response = $router->dispatch($request);
$response->send();

