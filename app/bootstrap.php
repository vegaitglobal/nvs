<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

require_once __DIR__.'/../vendor/autoload.php';

// Entity
$files = glob(__DIR__ . '/../src/Entity/*.php');

foreach ($files as $file) {
    require_once $file;
}

// Utils
require_once __DIR__.'/../src/Utils/AlertService.php';
require_once __DIR__.'/../src/Mails/Mailer.php';
require_once __DIR__.'/config.php';

$paths = [
    __DIR__.'/../src/Entity',
];

$isDevMode = true;

// the connection configuration
$dbParams = config('doctrine_db');

$config = Setup::createConfiguration($isDevMode);
$driver = new AnnotationDriver(new AnnotationReader(), $paths);

// registering noop annotation autoloader - allow all annotations by default
AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl($driver);

$entityManager = EntityManager::create($dbParams, $config);
// Load our autoloader
require_once __DIR__.'/../vendor/autoload.php';

$alertsService = new AlertService();

// Specify our Twig templates location
$loader = new Twig\Loader\FilesystemLoader([
    __DIR__.'/../src/CustomerBundle/Resources/views',
    __DIR__.'/../src/EmailBundle/Resources/views',
]);

// Instantiate our Twig
$twig = new Twig\Environment($loader, [
    'debug' => true,
]);

$twig->addExtension(new Twig\Extension\DebugExtension());

$mailer = new Mailer($twig);
