<?php

require_once '../vendor/autoload.php';

use MyProject\DocProject\Entity\Student;
use MyProject\DocProject\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$student = $entityManager->getReference(Student::class,3);

$entityManager->remove($student);

$entityManager->flush();

