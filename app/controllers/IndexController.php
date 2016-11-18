<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        //get mobile from mongodb
        $uuid = '582d5fa021b8cf1a733d7344';
        $team = Teams::findById($uuid);
        $this->view->setVar("mobile", $team->mobile);

        //get uuid from mysql
        $user = Users::findFirst(1);
        $this->view->setVar("uuid", $user->uuid);
    }

}

