<?php

require_once '../vendor/autoload.php';

use MyProject\DocProject\Entity\Student;
use MyProject\DocProject\Helper\EntityManagerFactory;
use MyProject\DocProject\Entity\Telephone;
use Doctrine\Common\Collections\ArrayCollection;

$student = new Student();
$student->setName('Alysson Victor');
$phoneNumber = '(43) 00000 - 0000';

$studentTelephone = new Telephone();
$studentTelephone->setNumber($phoneNumber);

$student->addTelephone($studentTelephone);

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$entityManager->persist($student);
$entityManager->flush();


