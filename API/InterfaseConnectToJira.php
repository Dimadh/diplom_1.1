<?php

use App\Jira;
use App\JiraSearch;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11.06.17
 * Time: 1:39
 */
class InterfaseConectToJira
{
        private function getUser(){
            return JiraSearch::searchUser();
        }

    private function createUser($name ,$password,$emailAddress,$displayName ){

        $data = collect([
            'name' => $name,
            'password' => $password,
            'emailAddress' => $emailAddress,
            'displayName' =>$displayName
        ]);

        return Jira::createUser(array($data));
    }

    private function createTask($key ,$summary,$description,$name ){

        $data = collect([array(
                'project'=> array(
                    'key' => $key
                ),
                'summary'     => $summary,
                'description' => $description,
                'issuetype'   => array(
                    'name' => $name))
        ]);

        return Jira::createTask(array($data));
    }

    private function updateTask($key ,$summary,$description,$name ){

        $data = collect([
             $key , array(
                    'summary'     => $summary,
                    'description' => $description,
                    'issuetype'   => array(
                        'name' => $name))

        ]);

        return Jira::createTask(array($data));
    }

    private function getProgect(){
        return JiraSearch::searchProject();
    }
}