<?php
class IndexController extends ControllerBase
{

    public function indexAction()
    {
        //get mobile from mongodb by mongo extension
        $uuid = '582d5fa021b8cf1a733d7344';
        $team = Teams::findById($uuid);
        $this->view->setVar("mobile", $team->mobile);

        //get uuid from mysql
        $user = Users::findFirst(1);
        $this->view->setVar("uuid", $user->uuid);

        //get mobile from mongodb by mongodb extension
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
        echo "Inserted with Object ID '{$result->getInsertedId()}'";exit();

    }

    public function route404Action()
    {
        header("HTTP/1.1 404 Not Found");exit;
    }

}

