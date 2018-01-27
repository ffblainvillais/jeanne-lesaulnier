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
        $this->em = $em;
    }

    /**
     * Create an Entity Creation and set title and logo
     *
     * @param string $title
     * @param string $logo
     * @return CreationEntity
     */
    public function addCreation($title, $logo)
    {
        $creation = new CreationEntity();

        $creation->setImage($logo);
        $creation->setTitle($title);

        return $creation;
    }

    /**
     * Remove an entity Creation with his id
     *
     * @param string $creationId
     */
    public function removeCreationById($creationId)
    {
        $creation = $this->em->getRepository(CreationEntity::class)->findOneBy(['id' => $creationId]);

        $this->em->remove($creation);
        $this->em->flush();
    }

}
