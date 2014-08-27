<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 *
 * @ORM\Entity(repositoryClass="\Application\Repository\Article")
 * @ORM\Table(name="mfdata_article")
 * @property integer $id
 * @package Application\Entity
 */
class Article
{
    /**
     * @ORM\Id
	 * @ORM\Column(type="integer");
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string");
     * @var string
     */
    protected $main_title;
    
    /**
     * @ORM\Column(type="string");
     * @var string
     */
    protected $main_description;

    /**
     * @ORM\Column(type="datetime");
     * @var string
     */
    protected $inserted;
    
    public function __construct() 
    {
        $this->inserted = new \DateTime("now");
    }
    
    /**
     * getID
     *
     * @return int
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * getTitle
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->main_title;
    }
    
    /**
     * getDescription
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->main_description;
    }
    
    /**
     * getTimestamp
     *
     * @return string
     */
    public function getTimestamp()
    {
        return $this->inserted;
    }
    
    /**
    * Exchange array - used in ZF2 form
    *
    * @param array $data An array of data
    */
    public function exchangeArray($data)
    {
        $this->id = (isset($data['id']))? $data['id'] : null;
        $this->main_title = (isset($data['main_title']))? $data['main_title'] : null;
        $this->main_description = (isset($data['main_description']))? $data['main_description'] : null;
    }

    /**
    * Get an array copy of object
    *
    * @return array
    */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}