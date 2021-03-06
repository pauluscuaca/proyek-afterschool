<?php

namespace project\muridBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pelajaran
 *
 * @ORM\Entity
 * @ORM\Table(name="pelajaran")
 * @ORM\Entity(repositoryClass="project\muridBundle\Entity\pelajaranRepository")
 */
class pelajaran
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManytoMany(targetEntity="jadwal", mappedBy="idpelajaran", cascade="remove")
     */
    public $idjadwal;

    /**
     * @ORM\OneToMany(targetEntity="project\muridBundle\Entity\nilai", mappedBy="pelajaran")
     */
    public $nilai;

    /**
     * @ORM\Column(name="pelajaran", type="string")
     * @var string
     */
    private $pelajaran;
    
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
     * Set pelajaran
     *
     * @param string $pelajaran
     * @return pelajaran
     */
    public function setPelajaran($pelajaran)
    {
        $this->pelajaran = $pelajaran;

        return $this;
    }

    /**
     * Get pelajaran
     *
     * @return string 
     */
    public function getPelajaran()
    {
        return $this->pelajaran;
    }

    /**
     * Set nilai_ujian
     *
     * @param integer $nilaiUjian
     * @return pelajaran
     */
    public function setNilaiUjian($nilaiUjian)
    {
        $this->nilai_ujian = $nilaiUjian;

        return $this;
    }

    /**
     * Get nilai_ujian
     *
     * @return integer 
     */
    public function getNilaiUjian()
    {
        return $this->nilai_ujian;
    }

    /**
     * Set nilai_tryout
     *
     * @param integer $nilaiTryout
     * @return pelajaran
     */
    public function setNilaiTryout($nilaiTryout)
    {
        $this->nilai_tryout = $nilaiTryout;

        return $this;
    }

    /**
     * Get nilai_tryout
     *
     * @return integer 
     */
    public function getNilaiTryout()
    {
        return $this->nilai_tryout;
    }

    /**
     * Add idjadwal
     *
     * @param \project\muridBundle\Entity\jadwal $idjadwal
     * @return pelajaran
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
