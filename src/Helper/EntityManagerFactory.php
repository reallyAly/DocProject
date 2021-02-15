<?php

namespace MyProject\DocProject\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';

        $config = Setup::createAnnotationMetadataConfiguration(
            [$rootDir . '/src'],
            true
        );

        $connection = [
            'driver' => 'pdo_mysql',
            'host' => '127.0.0.1',
            'dbname' => 'orm_alura',
            'user' => 'alyssonDBA',
            'password' => 'dev12@12'
        ];

        return EntityManager::create($connection, $config);
    }
}