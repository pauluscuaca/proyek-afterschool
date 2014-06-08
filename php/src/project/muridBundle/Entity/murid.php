<?php

namespace project\muridBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * murid
 *
 * @ORM\Entity
 * @ORM\Table(name="murid")
 * @ORM\Entity(repositoryClass="project\muridBundle\Entity\muridRepository")
 */
class murid
{
    /**
     * @ORM\Id
     * @ORM\Column(name="no_murid", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="project\adminBundle\Entity\DataPendaftaran", inversedBy="UserPendaftar",cascade="remove")
     * @ORM\JoinColumn(name="Data_Pendaftaran", referencedColumnName="No_Pendaftaran")
     */
    public $DataPendaftaran;

    /**
     * @ORM\OneToMany(targetEntity="project\muridBundle\Entity\nilai", mappedBy="murid")
     */
    public $nilai;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idjadwal = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set DataPendaftaran
     *
     * @param \project\adminBundle\Entity\DataPendaftaran $dataPendaftaran
     * @return murid
     */
    public function setDataPendaftaran(\project\adminBundle\Entity\DataPendaftaran $dataPendaftaran = null)
    {
        $this->DataPendaftaran = $dataPendaftaran;

        return $this;
    }

    /**
     * Get DataPendaftaran
     *
     * @return \project\adminBundle\Entity\DataPendaftaran 
     */
    public function getDataPendaftaran()
    {
        return $this->DataPendaftaran;
    }

    /**
     * Add idjadwal
     *
     * @param \project\muridBundle\Entity\jadwal $idjadwal
     * @return murid
     */
    public function addIdjadwal(\project\muridBundle\Entity\jadwal $idjadwal)
    {
        $this->idjadwal[] = $idjadwal;

        return $this;
    }

    /**
     * Remove idjadwal
     *
     * @param \project\muridBundle\Entity\jadwal $idjadwal
     */
    public function removeIdjadwal(\project\muridBundle\Entity\jadwal $idjadwal)
    {
        $this->idjadwal->removeElement($idjadwal);
    }

    /**
     * Get idjadwal
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdjadwal()
    {
        return $this->idjadwal;
    }
}
