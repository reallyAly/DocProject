<?php

namespace MyProject\DocProject\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
use MyProject\DocProject\Entity\Student;
use MyProject\DocProject\Helper\EntityManagerFactory;

class StudentRepository extends EntityRepository
{
    public function searchCoursesByStudent()
    {
        $query = $this->createQueryBuilder('student')
            ->join('student.telephones','telephones')
            ->join('student.courses', 'courses')
            ->addSelect('telephones')
            ->addSelect('courses')
            ->getQuery();

        return $query->getResult();
    }
}