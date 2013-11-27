<?php

namespace MyHappy\CineManiaBundle\Utils;

use Symfony\Component\Translation\Translator;

/**
 * Notice
 *
 */
class Notice
{
    
    const SUCCESS_CREATE = 1;
    const SUCCESS_UPDATE = 2;
    const SUCCESS_DELETE = 7;
    const SUCCESS = 3;
    
    const ERROR_CREATE = 9;
    const ERROR_UPDATE = 8;
    const ERROR_DELETE = 10;
    const ERROR = 4;
    
    const INFO = 5;
    const ALERT = 6;


    
    /**
     * @var string
     *
     */
    private $type;

    /**
     * @var string
     *
     */
    private $title;

    /**
     * @var string
     *
     */
    private $message;

    /**
     * @var string
     *
     */
    private $translator;
    

    function __construct($type, $title = null , $message = null) {
        $this->setType($type);
        $this->setTitle($title);
        $this->setMessage($message);
    }

    public function getTranslator() {
        return $this->translator;
    }

    public function setTranslator(Translator $translator) {
        $this->translator = $translator;
    }

        
    /**
     * Set type
     *
     * @param string $type
     * @return Notice
     */
    private function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Notice
     */
    private function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        if (!$this->title)
        {
            $this->title = $this->getTitleDefault();
        }
        
        return $this->getTranslator()?$this->getTranslator()->trans($this->title):$this->title;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Notice
     */
    private function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        if (!$this->message)
        {
            $this->message = $this->getMessageDefault();
        }
        
        return $this->getTranslator()?$this->getTranslator()->trans($this->message):$this->message;
    }
    
    /**
     * Retorna um title padrão para o mesmo
     * @return string
     */
    private function getTitleDefault()
    {
        $map = $this->getMap();
        
        return $map[$this->type]['title'];
    }
    
    /**
     * Retorna uma menssagem padrão para o Notice
     * @return string
     */
    private function getMessageDefault()
    {
        $map = $this->getMap();
        
        return $map[$this->type]['message'];
    }
    
    /**
     * Retorna o tipo strinf do notice
     * @return string
     */
    public function getTypeString()
    {
        $map = $this->getMap();
        
        return $map[$this->type]['type'];
    }
    
    private function getMap()
    {
        return array(
            self::SUCCESS_CREATE => array(
                "message" => "alerta.sucesso_cadastrar.menssagem",
                "title" => "alerta.sucesso_cadastrar.titulo",
                "type" => "success",
                ),
            self::SUCCESS_UPDATE => array(
                "message" => "alerta.sucesso_atualizar.menssagem",
                "title" => "alerta.sucesso_atualizar.titulo",
                "type" => "success",
                ),
            self::SUCCESS_DELETE => array(
                "message" => "alerta.sucesso_deletar.menssagem",
                "title" => "alerta.sucesso_deletar.titulo",
                "type" => "success",
                ),
            self::SUCCESS => array(
                "message" => "alerta.sucesso.menssagem",
                "title" => "alerta.sucesso.titulo",
                "type" => "success",
                ),
            
            self::ERROR_CREATE => array(
                "message" => "alerta.erro_cadastrar.menssagem",
                "title" => "alerta.erro_cadastrar.titulo",
                "type" => "error",
                ),
            self::ERROR_UPDATE => array(
                "message" => "alerta.erro_atualizar.menssagem",
                "title" => "alerta.erro_atualizar.titulo",
                "type" => "error",
                ),
            self::ERROR_DELETE => array(
                "message" => "alerta.erro_deletar.menssagem",
                "title" => "alerta.erro_deletar.titulo",
                "type" => "error",
                ),
            self::ERROR => array(
                "message" => "alerta.erro.menssagem",
                "title" => "alerta.erro.titulo",
                "type" => "error",
                ),
            
            self::ALERT => array(
                "message" => "alerta.alerta.menssagem",
                "title" => "alerta.alerta.titulo",
                "type" => "alert",
                ),
            self::INFO => array(
                "message" => "alerta.informacao.menssagem",
                "title" => "alerta.informacao.titulo",
                "type" => "info",
                ),
        ) ;
    }

    public function toArray() {
        return array(
            'title'     => $this->getTitle(),
            'message'   => $this->getMessage(),
            'type'      => $this->getTypeString()
        );
    }
    
}