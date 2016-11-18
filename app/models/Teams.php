<?php

class Teams extends \Phalcon\Mvc\Collection
{

    public function getSource()
    {
        return 'teams';
    }
    /*public function initialize()
    {
        $this->setSource("teams");
    }*/
}
