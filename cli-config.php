<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use \MyProject\DocProject\Helper\EntityManagerFactory;

// replace with file to your own project bootstrap
require_once 'vendor/autoload.php';

// replace with mechanism to retrieve EntityManager in your app]
$entityManagerFactory = new EntityManagerFactory;

$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);