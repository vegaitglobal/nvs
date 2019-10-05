<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

require_once __DIR__.'/../vendor/autoload.php';

// Entity
require_once __DIR__.'/../src/Entity/Product.php';
require_once __DIR__.'/../src/Entity/Volunteer.php';
require_once __DIR__.'/../src/Entity/Wishlist.php';

// Utils
require_once __DIR__.'/../src/Utils/AlertService.php';
require_once __DIR__.'/../src/Utils/TwigExtensions/Hash.php';

$paths = [
    __DIR__.'/../src/Entity',
];

$isDevMode = true;

// the connection configuration
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'nvs_nvs',
];

$config = Setup::createConfiguration($isDevMode);
$driver = new AnnotationDriver(new AnnotationReader(), $paths);

// registering noop annotation autoloader - allow all annotations by default
AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl($driver);

$entityManager = EntityManager::create($dbParams, $config);

$alertsService = new AlertService();

// Specify our Twig templates location
$loader = new Twig\Loader\FilesystemLoader([
    __DIR__.'/../src/CustomerBundle/Resources/views',
]);

// Instantiate our Twig
$twig = new Twig\Environment($loader, [
    'debug' => true,
]);

$twig->addExtension(new Twig\Extension\DebugExtension());
$twig->addExtension(new Hash());
