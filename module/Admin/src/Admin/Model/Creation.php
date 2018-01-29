<?php
/**
 * User model class
 *
 * @package Model
 */

namespace Admin\Model;

use Admin\Entity\Creation as CreationEntity;
use Admin\Entity\Media as MediaEntity;

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

    public function addMedia(CreationEntity $creation, $title, $image)
    {
        $media = new MediaEntity();

        $media->setTitle($title);
        $media->setImage($image);
        $media->setCreation($creation);

        return $media;
    }

    public function removeMediaFromCreation($creationId, $mediaId)
    {
        /* @var $creation CreationEntity */
        $creation   = $this->em->getRepository(CreationEntity::class)->findOneBy(['id' => $creationId]);
        $media      = $this->em->getRepository(MediaEntity::class)->findOneBy(['id' => $mediaId]);

        $creation->removeMedia($media);

        $this->em->persist($creation);
        $this->em->remove($media);
        $this->em->flush();
    }

}
