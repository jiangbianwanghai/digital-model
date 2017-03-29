<?php

class Teams extends \Phalcon\Mvc\Collection
{
/*public function onConstruct() {

    echo '<h1>onConstruct!</h1>';
}*/
    public function initialize()
    {
        $this->price = null;
        $this->size = null;
        $this->test = null;
        echo '<h1>initialize!</h1>';
        //$this->writeAttribute('test', null);
    }

    public function getSource()
    {
        return 'teams';
    }

}
