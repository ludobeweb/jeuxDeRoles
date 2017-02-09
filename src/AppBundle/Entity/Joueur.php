<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JoueurRepository")
 */
class Joueur
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
     * @var \stdClass
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \stdClass
     * @ORM\OneToOne(targetEntity="Personnage")
     * @ORM\JoinColumn(name="fk_personnage",referencedColumnName="id", nullable=true)
     */
    private $personnage;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param \stdClass $email
     *
     * @return Joueur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return \stdClass
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set personnage
     *
     * @param \stdClass $personnage
     *
     * @return Joueur
     */
    public function setPersonnage($personnage)
    {
        $this->personnage = $personnage;

        return $this;
    }

    /**
     * Get personnage
     *
     * @return \stdClass
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }
}

