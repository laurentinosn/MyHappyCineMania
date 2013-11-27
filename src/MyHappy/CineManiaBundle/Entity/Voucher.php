<?php

namespace MyHappy\CineManiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voucher
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Voucher
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Cinema")
     * @ORM\JoinColumn(name="cinema", referencedColumnName="id")
     */
    private $cinema;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="MyHappy\UsuarioBundle\Entity\Usuario")
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     */
    private $usuario;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Promocao")
     * @ORM\JoinColumn(name="promocao", referencedColumnName="id")
     */
    private $filme;

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
     * Set status
     *
     * @param integer $status
     * @return Voucher
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }


    /**
     * Set cinema
     *
     * @param Cinema $cinema
     * @return Voucher
     */
    public function setCinema(Cinema $cinema = null)
    {
        $this->cinema = $cinema;
    
        return $this;
    }

    /**
     * Get cinema
     *
     * @return Cinema 
     */
    public function getCinema()
    {
        return $this->cinema;
    }

    /**
     * Set usuario
     *
     * @param \MyHappy\CineManiaBundle\Entity\Usuario $usuario
     * @return Voucher
     */
    public function setUsuario(\MyHappy\UsuarioBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \MyHappy\UsuarioBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set filme
     *
     * @param Promocao $filme
     * @return Voucher
     */
    public function setFilme(Promocao $filme = null)
    {
        $this->filme = $filme;
    
        return $this;
    }

    /**
     * Get filme
     *
     * @return Promocao 
     */
    public function getFilme()
    {
        return $this->filme;
    }
}