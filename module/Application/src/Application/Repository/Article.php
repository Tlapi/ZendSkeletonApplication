<?php

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class Article
 * @package Application\Repository
 */
class Article extends EntityRepository
{
    /**
     * getLatest
     */
    public function getLatest()
    {
        return $this->findBy(array(), array('inserted' => 'DESC'), 10);
    }
}