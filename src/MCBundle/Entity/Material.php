<?php

namespace MCBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="material")
 * @ORM\Entity(repositoryClass="MCBundle\Repository\MaterialRepository")
 */
class Material
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="MCBundle\Entity\TypeMaterial",  cascade={"persist"})
     */
    private $typeMaterial;
    
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",  cascade={"persist"})
     */
    private $user;



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
     * Set description
     *
     * @param string $description
     * @return Material
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set typeMaterial
     *
     * @param \MCBundle\Entity\TypeMaterial $typeMaterial
     * @return Material
     */
    public function setTypeMaterial(\MCBundle\Entity\TypeMaterial $typeMaterial = null)
    {
        $this->typeMaterial = $typeMaterial;

        return $this;
    }

    /**
     * Get typeMaterial
     *
     * @return \MCBundle\Entity\TypeMaterial 
     */
    public function getTypeMaterial()
    {
        return $this->typeMaterial;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Material
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
}
