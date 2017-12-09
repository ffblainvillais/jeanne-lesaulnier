<?php

namespace Application\Model;

class Identity {

    use SessionContainerTrait;

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

            if ($this->authenticationService->hasIdentity()) {

                $this->identity = $this->authenticationService->getIdentity();
            }
        }

        return $this->identity;
    }
}

