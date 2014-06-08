<?php

namespace project\muridBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * nilai
 *
 * @ORM\Entity
 * @ORM\Table(name="nilai")
 * @ORM\Entity(repositoryClass="project\muridBundle\Entity\nilaiRepository")
 */
class nilai
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="murid", inversedBy="nilai", cascade="remove")
     * @ORM\JoinColumn(name="no_induk", referencedColumnName="no_murid")
     */
    public $murid;

    /**
     * @ORM\ManyToOne(targetEntity="pelajaran", inversedBy="nilai", cascade="remove")
     * @ORM\JoinColumn(name="pelajaran", referencedColumnName="id")
     */
    public $pelajaran;

    /**
     * @ORM\Column(name="nilai_ujian", type="integer", nullable=True)
     * @var integer
     */
    private $nilai_ujian;
  
   /**
     * @ORM\Column(name="nilai_tryout", type="integer", nullable=True)
     * @var integer
     */
    private $nilai_tryout;
}