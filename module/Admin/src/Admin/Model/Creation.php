<?php
/**
 * User model class
 *
 * @package Model
 */

namespace Admin\Model;

use Admin\Entity\Creation as CreationEntity;

class Creation
{
    /**
     * @var string
     */
    protected $em;

    public function __construct($em)
    {
        $this->em                   = $em;
    }

    public function addCreation($title, $logo)
    {
        $creation = new CreationEntity();

        $creation->setImage($logo);
        $creation->setTitle($title);

        return $creation;
    }

}
