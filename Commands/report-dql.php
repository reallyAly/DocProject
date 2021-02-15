<?php

require_once "../vendor/autoload.php";

use MyProject\DocProject\Entity\Student;
use MyProject\DocProject\Entity\Telephone;
use MyProject\DocProject\Entity\Course;
use MyProject\DocProject\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$class = Student::class;

$dql = "SELECT student, telephones, courses FROM $class student JOIN student.telephones telephones JOIN student.courses courses";
$query = $entityManager->createQuery($dql);
$students = $query->getResult();

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