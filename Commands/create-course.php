<?php

require_once '../vendor/autoload.php';

use MyProject\DocProject\Helper\EntityManagerFactory;
use MyProject\DocProject\Entity\Course;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$course = new Course();

$course->setName('Laboratório de Informática');

$entityManager->persist($course);

$entityManager->flush();


