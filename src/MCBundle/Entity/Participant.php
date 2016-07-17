<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;

/**
 * Participant
 *
 * @ORM\Table(name="participant")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\ParticipantRepository")
 */
class Participant
{
    
    
    /**
     * @var User
     * @ORM\Id
     *     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


    /**
     * @var Seance
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\Seance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="seance_id", referencedColumnName="id")
     * })
     */
    private $seance;

    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\StateParticipant",  cascade={"persist"})
     */
    private $stateParticipant;
    
     /**
     * @var boolean
     *
     * @ORM\Column(name="disable", type="boolean", options={"default":false})
     */
    private $disable;




    /**
     * Set disable
     *
     * @param boolean $disable
     * @return Participant
     */
    public function setDisable($disable)
    {
        $this->disable = $disable;

        return $this;
    }

    /**
     * Get disable
     *
     * @return boolean 
     */
    public function getDisable()
    {
        return $this->disable;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Participant
     */
    public function setUser(User $user)
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
     * Set seance
     *
     * @param Seance $seance
     * @return Participant
     */
    public function setSeance(Seance $seance)
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
     * Set stateParticipant
     *
     * @param StateParticipant $stateParticipant
     * @return Participant
     */
    public function setStateParticipant(StateParticipant $stateParticipant = null)
    {
        $this->stateParticipant = $stateParticipant;

        return $this;
    }

    /**
     * Get stateParticipant
     *
     * @return StateParticipant 
     */
    public function getStateParticipant()
    {
        return $this->stateParticipant;
    }
}
