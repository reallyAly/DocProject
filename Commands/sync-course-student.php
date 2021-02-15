<?php

require_once '../vendor/autoload.php';

use MyProject\DocProject\Entity\Student;
use MyProject\DocProject\Entity\Course;
use MyProject\DocProject\Helper\EntityManagerFactory;
use Doctrine\Common\Collections\ArrayCollection;


$entityManageFactory = new EntityManagerFactory();
$entityManager = $entityManageFactory->getEntityManager();

$student = $entityManager->find(Student::class, 1);
$course = $entityManager->find(Course::class, 2);

$student->addCourse($course);

$entityManager->flush();
