<?php

require_once '../vendor/autoload.php';

use MyProject\DocProject\Entity\Student;
use MyProject\DocProject\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

$studentsList = $studentRepository->findAll();

foreach($studentsList as $student){
    echo "ID: {$student->getId()} " . "Student Name: {$student->getName()}";
    echo PHP_EOL;
}
