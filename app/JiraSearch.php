<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10.05.17
 * Time: 13:56
 */

namespace App;


class JiraSearch
{
    public static function search()
    {
        $projetc = array();
        $result = json_decode(self::request( 'project' ));
        foreach ($result as $project_result)
            array_push($projetc , $project_result);
        return $projetc;
    }


    private static function request( $request, $is_post = 0, $is_put = 0 )
    {
        $ch = curl_init();
        curl_setopt_array( $ch, array(
            CURLOPT_URL            => config( 'jira.url' ) . '/rest/api/2/' .$request,
            CURLOPT_USERPWD        => config( 'jira.username' ) . ':' . config( 'jira.password' ),
            CURLOPT_HTTPHEADER     => array( 'Content-type: application/json' ),
            CURLOPT_RETURNTRANSFER => 1,
        ) );
        if( $is_post )
        {
            curl_setopt( $ch, CURLOPT_POST, 1 );
        }
        if( $is_put )
        {
            curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PUT' );
        }
        $response = curl_exec( $ch );
        curl_close( $ch );
        return $response;
    }
}