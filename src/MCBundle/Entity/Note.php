<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Session",  cascade={"persist"})
     */
    private $session;

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
     * @param \MCBundle\Entity\TypeNote $typeNote
     * @return Note
     */
    public function setTypeNote(\MCBundle\Entity\TypeNote $typeNote = null)
    {
        $this->typeNote = $typeNote;

        return $this;
    }

    /**
     * Get typeNote
     *
     * @return \MCBundle\Entity\TypeNote 
     */
    public function getTypeNote()
    {
        return $this->typeNote;
    }

    /**
     * Set session
     *
     * @param \MCBundle\Entity\Session $session
     * @return Note
     */
    public function setSession(\MCBundle\Entity\Session $session = null)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return \MCBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Note
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set assign
     *
     * @param \UserBundle\Entity\User $assign
     * @return Note
     */
    public function setAssign(\UserBundle\Entity\User $assign = null)
    {
        $this->assign = $assign;

        return $this;
    }

    /**
     * Get assign
     *
     * @return \UserBundle\Entity\User 
     */
    public function getAssign()
    {
        return $this->assign;
    }
}
