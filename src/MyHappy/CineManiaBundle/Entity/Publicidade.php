<?php

namespace MyHappy\CineManiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publicidade
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Publicidade
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
     * @ORM\Column(name="dataInicio", type="date")
     */
    private $dataInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataFim", type="date")
     */
    private $dataFim;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imagem", type="blob")
     */
    private $imagem;
    
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
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Publicidade
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;
    
        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return \DateTime 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return Publicidade
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;
    
        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Publicidade
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    
        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set imagem
     *
     * @param string $imagem
     * @return Publicidade
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
}