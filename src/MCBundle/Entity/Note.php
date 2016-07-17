<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MCBundle\Entity\Seance;
use MCBundle\Entity\TypeNote;
use UserBundle\Entity\User;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\NoteRepository")
 */
class Note
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="appreciation", type="string", length=255)
     */
    private $appreciation;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\TypeNote",  cascade={"persist"})
     */
    private $typeNote;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Seance",  cascade={"persist"})
     */
    private $seance;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",  cascade={"persist"})
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",  cascade={"persist"})
     */
    private $assign;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set appreciation
     *
     * @param string $appreciation
     * @return Note
     */
    public function setAppreciation($appreciation)
    {
        $this->appreciation = $appreciation;

        return $this;
    }

    /**
     * Get appreciation
     *
     * @return string 
     */
    public function getAppreciation()
    {
        return $this->appreciation;
    }

    /**
     * Set typeNote
     *
     * @param TypeNote $typeNote
     * @return Note
     */
    public function setTypeNote(TypeNote $typeNote = null)
    {
        $this->typeNote = $typeNote;

        return $this;
    }

    /**
     * Get typeNote
     *
     * @return TypeNote 
     */
    public function getTypeNote()
    {
        return $this->typeNote;
    }

    /**
     * Set seance
     *
     * @param Seance $seance
     * @return Note
     */
    public function setSeance(Seance $seance = null)
    {
        $this->seance = $seance;

        return $this;
    }

    /**
     * Get seance
     *
     * @return Seance 
     */
    public function getSeance()
    {
        return $this->seance;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Note
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set assign
     *
     * @param User $assign
     * @return Note
     */
    public function setAssign(User $assign = null)
    {
        $this->assign = $assign;

        return $this;
    }

    /**
     * Get assign
     *
     * @return User 
     */
    public function getAssign()
    {
        return $this->assign;
    }
}
