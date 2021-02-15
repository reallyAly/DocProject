<?php

namespace MyProject\DocProject\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="MyProject\DocProject\Repository\StudentRepository")
 */
class Student
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="string")
     */
    private string $name;

    /** @OneToMany(targetEntity="Telephone", mappedBy="student", cascade={"remove", "persist"}, fetch="EAGER") */
    private $telephones;

    /** @ManyToMany(targetEntity="Course", mappedBy="students") */
    private $courses;

    public function __construct()
    {
        $this->telephones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }


    public function getTelephones()
    {
        return $this->telephones;
    }

    /**
     * @param Telephone $telephone
     * @return Student
     */
    public function addTelephone(Telephone $telephone): self
    {
        $this->telephones->add($telephone);
        $telephone->addStudent($this);
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * @var Course $course
     * @return Student
     */
    public function addCourse(Course $course)
    {
        if($this->courses->contains($course)){
            return $this;
        }

        $this->courses->add($course);
        $course->addStudent($this);
        return $this;
    }
}