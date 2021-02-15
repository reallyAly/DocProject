<?php

require_once "../vendor/autoload.php";

use MyProject\DocProject\Entity\Student;
use MyProject\DocProject\Helper\EntityManagerFactory;
use MyProject\DocProject\Entity\Telephone;
use MyProject\DocProject\Entity\Course;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $students */
$students = $studentRepository->findAll();

foreach($students as $student){
    $telephones = $student->getTelephones()->map(function(Telephone $telephone){
        return $telephone->getNumber();
    });

    $courses = $student->getCourses()->map(function(Course $course){
        return $course->getName();
    });

    echo "Name: {$student->getName()}";

    echo PHP_EOL;
    echo PHP_EOL;

    echo 'Telephones: ';
    echo PHP_EOL;

    foreach($telephones as $telephone){
        echo $telephone;
    }

    echo PHP_EOL;
    echo PHP_EOL;

    echo 'Cursos: ';
    echo PHP_EOL;

    foreach($courses as $course){
        echo $course;
    }

    echo PHP_EOL;

}