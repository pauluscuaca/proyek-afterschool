<?php

namespace project\adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DataPendaftaran
 *
 * @ORM\Entity
 * @ORM\Table(name="DataPendaftaran")
 * @ORM\Entity(repositoryClass="project\adminBundle\Entity\DataPendaftaranRepository")
 */
class DataPendaftaran
{
    /**
     * @ORM\Id
     * @ORM\Column(name="No_Pendaftaran", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="project\homeBundle\Entity\User", inversedBy="DataPendaftar")
     * @ORM\JoinColumn(name="UserPendaftar", referencedColumnName="id")
     */
    public $UserPendaftar;

    /**
     * @ORM\Column(name="agama", type="string")
     * @var string
     */
    private $agama;

    /**
     * @ORM\Column(name="warganegara", type="string")
     * @var string
     */
    private $warganegara;

    /**
     * @ORM\Column(name="sekolah", type="string")
     * @var string
     */
    private $sekolah;

    /**
     * @ORM\Column(name="tingkatpendidikan", type="string")
     * @var string
     */
    private $tingkatpendidikan;

    /**
     * @ORM\Column(name="Pembayaran", type="string", nullable=True)
     * @var string
     */
    private $Pembayaran;

    /**
     * @ORM\Column(name="Tgl_Pembayaran", type="datetime",nullable=True)
     * @var datetime
     */
    private $Tgl_Pembayaran;


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
     * Set agama
     *
     * @param string $agama
     * @return DataPendaftaran
     */
    public function setAgama($agama)
    {
        $this->agama = $agama;

        return $this;
    }

    /**
     * Get agama
     *
     * @return string 
     */
    public function getAgama()
    {
        return $this->agama;
    }

    /**
     * Set warganegara
     *
     * @param string $warganegara
     * @return DataPendaftaran
     */
    public function setWarganegara($warganegara)
    {
        $this->warganegara = $warganegara;

        return $this;
    }

    /**
     * Get warganegara
     *
     * @return string 
     */
    public function getWarganegara()
    {
        return $this->warganegara;
    }

    /**
     * Set sekolah
     *
     * @param string $sekolah
     * @return DataPendaftaran
     */
    public function setSekolah($sekolah)
    {
        $this->sekolah = $sekolah;

        return $this;
    }

    /**
     * Get sekolah
     *
     * @return string 
     */
    public function getSekolah()
    {
        return $this->sekolah;
    }

    /**
     * Set tingkatpendidikan
     *
     * @param string $tingkatpendidikan
     * @return DataPendaftaran
     */
    public function setTingkatpendidikan($tingkatpendidikan)
    {
        $this->tingkatpendidikan = $tingkatpendidikan;

        return $this;
    }

    /**
     * Get tingkatpendidikan
     *
     * @return string 
     */
    public function getTingkatpendidikan()
    {
        return $this->tingkatpendidikan;
    }

    /**
     * Set Pembayaran
     *
     * @param string $pembayaran
     * @return DataPendaftaran
     */
    public function setPembayaran($pembayaran)
    {
        $this->Pembayaran = $pembayaran;

        return $this;
    }

    /**
     * Get Pembayaran
     *
     * @return string 
     */
    public function getPembayaran()
    {
        return $this->Pembayaran;
    }

    /**
     * Set Tgl_Pembayaran
     *
     * @param \DateTime $tglPembayaran
     * @return DataPendaftaran
     */
    public function setTglPembayaran($tglPembayaran)
    {
        $this->Tgl_Pembayaran = $tglPembayaran;

        return $this;
    }

    /**
     * Get Tgl_Pembayaran
     *
     * @return \DateTime 
     */
    public function getTglPembayaran()
    {
        return $this->Tgl_Pembayaran;
    }

    /**
     * Set UserPendaftar
     *
     * @param \project\homeBundle\Entity\User $userPendaftar
     * @return DataPendaftaran
     */
    public function setUserPendaftar(\project\homeBundle\Entity\User $userPendaftar = null)
    {
        $this->UserPendaftar = $userPendaftar;

        return $this;
    }

    /**
     * Get UserPendaftar
     *
     * @return \project\homeBundle\Entity\User 
     */
    public function getUserPendaftar()
    {
        return $this->UserPendaftar;
    }
}
