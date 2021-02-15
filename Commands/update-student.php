<?php

require_once '../vendor/autoload.php';

use MyProject\DocProject\Entity\Student;
use MyProject\DocProject\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

/** @var Student $student */
$student = $entityManager->find(Student::class,1);

$student->setName('Alysson Victor dos Santos');

$entityManager->flush();



