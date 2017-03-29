<?php

class mongoController extends ControllerBase
{

    public function insertAction()
    {
        $robot       = new Teams();
        $robot->type = "mechanical";
        $robot->name = "Astro Boy";
        $robot->year = 1952;
        if ($robot->save() == false) {
            echo "Umh, We can't store robots right now: \n";
            foreach ($robot->getMessages() as $message) {
                echo $message, "\n";
            }
        } else {
            echo "The generated id is: ", $robot->getId();
        }
        $this->view->disable();
    }

    public function updateAction()
    {
        $team = Teams::findById("58db6d8d64bcfa083bd56df2");
        $team->name = 'kevin';
        $team->save();
        $this->view->disable();
    }

    public function deleteAction()
    {
        $team = Teams::findFirst();
        if ($team != false) {
            if ($team->delete() == false) {
                echo "Sorry, we can't delete the robot right now: \n";
                foreach ($team->getMessages() as $message) {
                    echo $message, "\n";
                }
            } else {
                echo "The robot was deleted successfully!";
            }
        }
        $this->view->disable();
    }

    public function findAction()
    {
        $teams = Teams::find(
            array(
                array(
                    "type" => "mechanical"
                ),
                "sort" => array(
                    "name" => 1
                )
            )
        );

        foreach ($teams as $team) {
            echo $team->name, "<br />";
        }
        $this->view->disable();
    }

    public function findoneAction()
    {
        $team = Teams::findFirst(
            array(
                array(
                    'name' => 'Astro Boy'
                )
            )
        )->toArray();
        print_r($team);
        $this->view->disable();
    }

    public function findbyidAction()
    {
        $team = Teams::findById("58db2a0e64bcfa083bd56ded");
        $team->name = 'bluerainerz11';
        $team->save();
        echo $team->name;
        $this->view->disable();
    }
}

