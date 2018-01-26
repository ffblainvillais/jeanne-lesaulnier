<?php
/**
 * User model class
 *
 * @package Model
 */

namespace Admin\Model;

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


}
