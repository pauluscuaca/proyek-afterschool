<?php

namespace project\muridBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jadwal
 * @ORM\Entity
 * @ORM\Table(name="jadwal")
 * @ORM\Entity(repositoryClass="project\muridBundle\Entity\jadwalRepository")
 */
class jadwal
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="kelas", inversedBy="idjadwal", cascade="remove")
     *      @ORM\JoinTable(name="jadwal_kelas",
     *      joinColumns={@ORM\joinColumn(name="jadwal_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="kelas_id", referencedColumnName="id")}
     * )
     */
    public $idkelas;

    /**
     * @ORM\ManyToMany(targetEntity="pelajaran", inversedBy="idjadwal",cascade="remove")
     * @ORM\JoinTable(name="jadwal_pelajaran",
     *      joinColumns={@ORM\joinColumn(name="jadwal_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="pelajaran_id", referencedColumnName="id")}
     * )
     */
    public $idpelajaran;

    /**
     * @ORM\Column(name="jadwal", type="datetime")
     * @var datetime
     */
    private $jadwal;
    
    /**
     * @ORM\Column(name="jenis", type="string")
     * @var datetime
     */
    private $jenis;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idkelas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idmurid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idpelajaran = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set Tgl
     *
     * @param \DateTime $tgl
     * @return jadwal
     */
    public function setTgl($tgl)
    {
        $this->Tgl = $tgl;

        return $this;
    }

    /**
     * Get Tgl
     *
     * @return \DateTime 
     */
    public function getTgl()
    {
        return $this->Tgl;
    }

    /**
     * Add idkelas
     *
     * @param \project\muridBundle\Entity\kelas $idkelas
     * @return jadwal
     */
    public function addIdkela(\project\muridBundle\Entity\kelas $idkelas)
    {
        $this->idkelas[] = $idkelas;

        return $this;
    }

    /**
     * Remove idkelas
     *
     * @param \project\muridBundle\Entity\kelas $idkelas
     */
    public function removeIdkela(\project\muridBundle\Entity\kelas $idkelas)
    {
        $this->idkelas->removeElement($idkelas);
    }

    /**
     * Get idkelas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdkelas()
    {
        return $this->idkelas;
    }

    /**
     * Add idmurid
     *
     * @param \project\muridBundle\Entity\murid $idmurid
     * @return jadwal
     */
    public function addIdmurid(\project\muridBundle\Entity\murid $idmurid)
    {
        $this->idmurid[] = $idmurid;

        return $this;
    }

    /**
     * Remove idmurid
     *
     * @param \project\muridBundle\Entity\murid $idmurid
     */
    public function removeIdmurid(\project\muridBundle\Entity\murid $idmurid)
    {
        $this->idmurid->removeElement($idmurid);
    }

    /**
     * Get idmurid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdmurid()
    {
        return $this->idmurid;
    }

    /**
     * Add idpelajaran
     *
     * @param \project\muridBundle\Entity\pelajaran $idpelajaran
     * @return jadwal
     */
    public function addIdpelajaran(\project\muridBundle\Entity\pelajaran $idpelajaran)
    {
        $this->idpelajaran[] = $idpelajaran;

        return $this;
    }

    /**
     * Remove idpelajaran
     *
     * @param \project\muridBundle\Entity\pelajaran $idpelajaran
     */
    public function removeIdpelajaran(\project\muridBundle\Entity\pelajaran $idpelajaran)
    {
        $this->idpelajaran->removeElement($idpelajaran);
    }

    /**
     * Get idpelajaran
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdpelajaran()
    {
        return $this->idpelajaran;
    }

    /**
     * Set jadwal
     *
     * @param \DateTime $jadwal
     * @return jadwal
     */
    public function setJadwal($jadwal)
    {
        $this->jadwal = $jadwal;

        return $this;
    }

    /**
     * Get jadwal
     *
     * @return \DateTime 
     */
    public function getJadwal()
    {
        return $this->jadwal;
    }

    /**
     * Set jenis
     *
     * @param string $jenis
     * @return jadwal
     */
    public function setJenis($jenis)
    {
        $this->jenis = $jenis;

        return $this;
    }

    /**
     * Get jenis
     *
     * @return string 
     */
    public function getJenis()
    {
        return $this->jenis;
    }
}
