<?php

namespace project\adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * admin
 *
 * @ORM\Entity
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="project\adminBundle\Entity\adminRepository")
 */
class admin
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id_admin", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="project\homeBundle\Entity\User", inversedBy="useradmin")
     * @ORM\JoinColumn(name="useradmin", referencedColumnName="id")
     */
    public $useradmin;

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
     * Set useradmin
     *
     * @param \project\homeBundle\Entity\User $useradmin
     * @return admin
     */
    public function setUseradmin(\project\homeBundle\Entity\User $useradmin = null)
    {
        $this->useradmin = $useradmin;

        return $this;
    }

    /**
     * Get useradmin
     *
     * @return \project\homeBundle\Entity\User 
     */
    public function getUseradmin()
    {
        return $this->useradmin;
    }
}
