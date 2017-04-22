<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20.04.17
 * Time: 1:11
 */

namespace App;


use Illuminate\Support\Facades\Facade;
class JiraFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'jira';
    }
}