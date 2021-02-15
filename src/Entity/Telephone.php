<?php

namespace MyProject\DocProject\Entity;

/**
 * @Entity
 */
class Telephone
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $number;

    /** @ManyToOne(targetEntity="Student") */
    private $student;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param self
     */
    public function setNumber($number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @param Student $student
     * @return Telephone
     */
    public function addStudent(Student $student): self
    {
        $this->student = $student;
        return $this;
    }

    /**
     * @return Student
     */
    public function getStudent(): Student
    {
        return $this->student;
    }
}