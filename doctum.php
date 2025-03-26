<?php

use Doctum\Doctum;
use Doctum\Parser\Filter\PublicFilter;
use Doctum\RemoteRepository\GitHubRemoteRepository;
use Symfony\Component\Finder\Finder;

$dir = __DIR__ . '/src';


$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude(['vendor', 'tests']) 
    ->in($dir);

return new Doctum($iterator, [
    'title'                => 'Documentation du projet',
    'build_dir'            => __DIR__ . '/docs/build',
    'cache_dir'            => __DIR__ . '/docs/cache',
    'remote_repository'    => new GitHubRemoteRepository('ton-utilisateur/ton-projet', __DIR__),
    'default_opened_level' => 2,
    'filter'               => new PublicFilter(), 
]);
