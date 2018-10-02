<?php

namespace TodoBundle\Entity;

Use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="Todo")
 * @ORM\Entity
 */

class Todo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id" , type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_todo;
        /**
     * @var string
     *
     * @ORM\Column(name="task" , type="string" , length=255)
     */
    private $task;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline" , type="datetime" , length=255)
     */
    private $deadline;

    /**
     * @var \User
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="iduser" , referencedColumnName="id")
     * })
     */

    private $iduser;

    /**
     * @return \User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param \User $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * Todo constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id_todo;
    }

    /**
     * @return string
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id_todo = $id;
    }

    /**
     * @param string $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @param \DateTime $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

}