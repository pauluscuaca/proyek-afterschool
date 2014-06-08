<?php

namespace project\muridBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * kelas
 *
 * @ORM\Entity
 * @ORM\Table(name="kelas")
 * @ORM\Entity(repositoryClass="project\muridBundle\Entity\kelasRepository")
 */
class kelas
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManytoMany(targetEntity="jadwal", mappedBy="idkelas", cascade="remove")
     */
    public $idjadwal;

    /**
     * @ORM\Column(name="ruang", type="string")
     * @var string
     */
    private $ruang;
    
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
     * Set namakelas
     *
     * @param string $namakelas
     * @return kelas
     */
    public function setNamakelas($namakelas)
    {
        $this->namakelas = $namakelas;

        return $this;
    }

    /**
     * Get namakelas
     *
     * @return string 
     */
    public function getNamakelas()
    {
        return $this->namakelas;
    }

    /**
     * Add idjadwal
     *
     * @param \project\muridBundle\Entity\jadwal $idjadwal
     * @return kelas
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

    /**
     * Set ruang
     *
     * @param string $ruang
     * @return kelas
     */
    public function setRuang($ruang)
    {
        $this->ruang = $ruang;

        return $this;
    }

    /**
     * Get ruang
     *
     * @return string 
     */
    public function getRuang()
    {
        return $this->ruang;
    }
}
