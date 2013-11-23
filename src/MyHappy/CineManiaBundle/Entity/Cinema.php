<?php

namespace MyHappy\CineManiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cinema
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cinema
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
     * @var Pessoa
     * 
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="pessoa", referencedColumnName="id")
     * 
     */
    private $pessoa;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=255, nullable=true)
     */
    private $cnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255, nullable=true)
     */
    private $senha;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=255)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text")
     */
    private $descricao;

    /**
     * 
     * @return String
     */
    public function __toString()
    {
        return $this->getNome();
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
     * Set nome
     *
     * @param string $nome
     * @return Cinema
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
     * Set cnpj
     *
     * @param string $cnpj
     * @return Cinema
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    
        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string 
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Cinema
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set senha
     *
     * @param string $senha
     * @return Cinema
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    
        return $this;
    }

    /**
     * Get senha
     *
     * @return string 
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     * @return Cinema
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    
        return $this;
    }

    /**
     * Get endereco
     *
     * @return string 
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set pessoa
     *
     * @param integer $pessoa
     * @return Cinema
     */
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
    
        return $this;
    }

    /**
     * Get pessoa
     *
     * @return integer 
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Cinema
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
}