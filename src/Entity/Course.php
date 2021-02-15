<?php


namespace MyProject\DocProject\Entity;


use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Course
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
    private $name;

    /** @ManyToMany(targetEntity="Student", inversedBy="courses") */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @var Student $student
     * @return Course
     */
    public function addStudent(Student $student): Course
    {
        if($this->students->contains($student)){
            return $this;
        }

        $this->students->add($student);
        $student->addCourse($this);
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getStudents(): ArrayCollection
    {
        return $this->students;
    }
}