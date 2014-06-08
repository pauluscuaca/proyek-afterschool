<?php

namespace project\homeBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 * @ORM\Entity
 * @ORM\Table(name="tbl_user")
 */
class User extends BaseUser
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id",type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="project\adminBundle\Entity\admin", mappedBy="useradmin", cascade="remove")
     */
    public $useradmin;

    /**
     * @ORM\OneToOne(targetEntity="project\adminBundle\Entity\DataPendaftaran", mappedBy="UserPendaftar", cascade="remove")
     */
    public $DataPendaftar;  

    /**
     * @var integer
     * @ORM\Column(name="facebook_id", type="integer",nullable=true)
     */
    protected $facebookId;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_access_token", type="string", length=255,nullable=true)
     */
    protected $facebookAccessToken;

   /**
     * @ORM\Column(name="nama", type="string")
     * @var string
     */
    private $nama;

    /**
     * @ORM\Column(name="JK", type="string")
     * @var string
     */
    private $jK;

    /**
     * @ORM\Column(name="telepon", type="string")
     * @var string
     */
    private $telepon;

    /**
     * @ORM\Column(name="tglLahir", type="datetime")
     * @var datetime
     */
    private $tglLahir;

    /**
     * @ORM\Column(name="alamat", type="string")
     * @var string
     */
    private $alamat;

    /**
     * set id
     *
     * @param integer $id
     * @return user
     */
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * Set facebookId
     *
     * @param integer $facebookId
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return integer 
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     * @return User
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string 
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * Set nama
     *
     * @param string $nama
     * @return User
     */
    public function setNama($nama)
    {
        $this->nama = $nama;

        return $this;
    }

    /**
     * Get nama
     *
     * @return string 
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Set jK
     *
     * @param string $jK
     * @return User
     */
    public function setJK($jK)
    {
        $this->jK = $jK;

        return $this;
    }

    /**
     * Get jK
     *
     * @return string 
     */
    public function getJK()
    {
        return $this->jK;
    }

    /**
     * Set telepon
     *
     * @param string $telepon
     * @return User
     */
    public function setTelepon($telepon)
    {
        $this->telepon = $telepon;

        return $this;
    }

    /**
     * Get telepon
     *
     * @return string 
     */
    public function getTelepon()
    {
        return $this->telepon;
    }

    /**
     * Set tglLahir
     *
     * @param datetime $tglLahir
     * @return User
     */
    public function setTglLahir($tglLahir)
    {
        $this->tglLahir = $tglLahir;

        return $this;
    }

    /**
     * Get tglLahir
     *
     * @return datetime 
     */
    public function getTglLahir()
    {
        return $this->tglLahir;
    }

    /**
     * Set alamat
     *
     * @param string $alamat
     * @return User
     */
    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;

        return $this;
    }

    /**
     * Get alamat
     *
     * @return string 
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * Set useradmin
     *
     * @param \project\adminBundle\Entity\admin $useradmin
     * @return User
     */
    public function setUseradmin(\project\adminBundle\Entity\admin $useradmin = null)
    {
        $this->useradmin = $useradmin;

        return $this;
    }

    /**
     * Get useradmin
     *
     * @return \project\adminBundle\Entity\admin 
     */
    public function getUseradmin()
    {
        return $this->useradmin;
    }

    /**
     * Set DataPendaftar
     *
     * @param \project\adminBundle\Entity\DataPendaftaran $dataPendaftar
     * @return User
     */
    public function setDataPendaftar(\project\adminBundle\Entity\DataPendaftaran $dataPendaftar = null)
    {
        $this->DataPendaftar = $dataPendaftar;

        return $this;
    }

    /**
     * Get DataPendaftar
     *
     * @return \project\adminBundle\Entity\DataPendaftaran 
     */
    public function getDataPendaftar()
    {
        return $this->DataPendaftar;
    }
}
