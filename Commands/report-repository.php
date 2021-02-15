<?php

require_once "../vendor/autoload.php";

use MyProject\DocProject\Entity\Student;
use MyProject\DocProject\Entity\Telephone;
use MyProject\DocProject\Entity\Course;
use MyProject\DocProject\Helper\EntityManagerFactory;

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

$students = $studentRepository->searchCoursesByStudent();

foreach($students as $student){
    echo $student->getName();
}



