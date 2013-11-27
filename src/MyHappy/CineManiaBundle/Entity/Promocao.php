<?php

namespace MyHappy\CineManiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promocao
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Promocao
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
     * @var \DateTime
     *
     * @ORM\Column(name="dataCriacao", type="date")
     */
    private $dataCriacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataValidade", type="date")
     */
    private $dataValidade;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="filme", type="string", length=255)
     */
    private $filme;

    /**
     * @var string
     *
     * @ORM\Column(name="imagem", type="blob", nullable=true)
     */
    private $imagem;

    /**
     * @var string
     *
     * @ORM\Column(name="regra", type="text", nullable=true)
     */
    private $regra;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Cinema")
     * @ORM\JoinColumn(name="cinema", referencedColumnName="id")
     */
    private $cinema;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="cinefilo", referencedColumnName="id")
     */
    private $cinefilo;

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
     * Set dataCriacao
     *
     * @param \DateTime $dataCriacao
     * @return Promocao
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * Get dataCriacao
     *
     * @return \DateTime 
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * Set dataValidade
     *
     * @param \DateTime $dataValidade
     * @return Promocao
     */
    public function setDataValidade($dataValidade)
    {
        $this->dataValidade = $dataValidade;

        return $this;
    }

    /**
     * Get dataValidade
     *
     * @return \DateTime 
     */
    public function getDataValidade()
    {
        return $this->dataValidade;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Promocao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set filme
     *
     * @param string $filme
     * @return Promocao
     */
    public function setFilme($filme)
    {
        $this->filme = $filme;

        return $this;
    }

    /**
     * Get filme
     *
     * @return string 
     */
    public function getFilme()
    {
        return $this->filme;
    }

    /**
     * Set imagem
     *
     * @param string $imagem
     * @return Promocao
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get imagem
     *
     * @return string 
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set regra
     *
     * @param string $regra
     * @return Promocao
     */
    public function setRegra($regra)
    {
        $this->regra = $regra;

        return $this;
    }

    /**
     * Get regra
     *
     * @return string 
     */
    public function getRegra()
    {
        return $this->regra;
    }

    /**
     * Set cinema
     *
     * @param string $cinema
     * @return Promocao
     */
    public function setCinema($cinema)
    {
        $this->cinema = $cinema;

        return $this;
    }

    /**
     * Get cinema
     *
     * @return string 
     */
    public function getCinema()
    {
        return $this->cinema;
    }

    /**
     * Set cinefilo
     *
     * @param integer $cinefilo
     * @return Promocao
     */
    public function setCinefilo($cinefilo)
    {
        $this->cinefilo = $cinefilo;

        return $this;
    }

    /**
     * Get cinefilo
     *
     * @return integer 
     */
    public function getCinefilo()
    {
        return $this->cinefilo;
    }

        /**
         * @ORM\PrePersist
         */
        public function doStuffOnPrePersist()
        {
            $this->dataCriacao = new \DateTime('now');
        }

}
