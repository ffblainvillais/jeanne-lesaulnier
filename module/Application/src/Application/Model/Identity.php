<?php

namespace Application\Model;

class Identity {

    protected $em;
    protected $authenticationModel;
    protected $identity;


    public function __construct($em, $authenticationModel)
    {
        $this->em                   = $em;
        $this->authenticationModel  = $authenticationModel;
    }

    /**
     * Retourne l'utilisateur BDD courant
     *
     * @return UserInterface
     */
    public function getDbUser()
    {
        if (($identity = $this->getIdentity())) {
            if (isset($identity['db']) && $identity['db'] instanceof UserInterface) {
                return $identity['db'];
            }
        }

        return null;
    }

    /**
     * Retourne les données d'identité correspondant à l'utilisateur courant.
     *
     * @return mixed
     */
    public function getIdentity()
    {
        if (!$this->identity) {

            if ($this->authenticationModel->hasIdentity()) {

                $this->identity = $this->authenticationModel->getIdentity();
            }
        }

        return $this->identity;
    }
}

