<?php
class IndexController extends ControllerBase
{

    public function indexAction()
    {
        //get mobile from mongodb by mongo extension
        /*$uuid = '582d5fa021b8cf1a733d7344';
        $team = Teams::findById($uuid);
        $this->view->setVar("mobile", $team->mobile);*/

        //get uuid from mysql
        /*$user = Users::findFirst(1);
        $this->view->setVar("uuid", $user->uuid);*/

    }

    public function findoneAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $restaurant = $collection->findOne(
            [
                'name' => 'Hinterland',
            ],
            [
                'projection' => [
                    'name' => 1,
                    'brewery' => 1,
                ],
            ]
        );
        var_dump($restaurant);
        $this->view->disable();
    }

    public function findAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $cursor = $collection->find(
            [
                'name' => 'Hinterland',
            ],
            [
                'limit' => 5,
                'projection' => [
                    'name' => 1,
                    'brewery' => 1,
                ],
            ]
        );
        foreach ($cursor as $restaurant) {
           var_dump($restaurant);
        };
        $this->view->disable();
    }

    public function insertoneAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
        echo "Inserted with Object ID '{$result->getInsertedId()}'";
        $this->view->disable();
    }

    public function insertmanyAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $result = $collection->insertMany([
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'name' => 'Admin User',
            ],
            [
                'username' => 'test',
                'email' => 'test@example.com',
                'name' => 'Test User',
            ],
        ]);
        printf("Inserted %d document(s)\n", $result->getInsertedCount());
        var_dump($result->getInsertedIds());
        $this->view->disable();
    }

    public function updateoneAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $updateResult = $collection->updateOne(
            [ 'name' => 'Hinterland' ],
            [ '$set' => [ 'brewery' => 'Brunos on Astoria' ]]
        );
        printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
        printf("Modified %d document(s)\n", $updateResult->getModifiedCount());
        $this->view->disable();
    }

    public function updatemanyAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $updateResult = $collection->updateMany(
            [ 'name' => 'Hinterland' ],
            [ '$set' => [ 'active' => 'True' ]]
        );
        printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
        printf("Modified %d document(s)\n", $updateResult->getModifiedCount());
    }

    public function deleteoneAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $deleteResult = $collection->deleteOne(['name' => 'Hinterland']);
        printf("Deleted %d document(s)\n", $deleteResult->getDeletedCount());
    }

    public function deletemanyAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $deleteResult = $collection->deleteMany(['name' => 'Hinterland']);
        printf("Deleted %d document(s)\n", $deleteResult->getDeletedCount());
    }

    public function findoneanddeleteAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $deletedRestaurant = $collection->findOneAndDelete(
            [ 'username' => 'admin' ],
            [
                'projection' => [
                    'name' => 1,
                    'email' => 1,
                    'username' => 1,
                ],
            ]
        );
        var_dump($deletedRestaurant);
    }

    public function countAction()
    {
        $client = new MongoDB\Client("mongodb://mongoadmin:mongoadmin@192.168.8.234:27017");
        $collection = $client->demo->teams;
        $count = $collection->count(
            [
                'username' => 'admin',
            ]
        );
        printf("Find %d document(s)\n", $count);
        $this->view->disable();
    }

    public function route404Action()
    {
        header("HTTP/1.1 404 Not Found");exit;
    }

}

