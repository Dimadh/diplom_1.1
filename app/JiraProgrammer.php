<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20.04.17
 * Time: 20:18
 */

namespace App;


class JiraProgrammer
{
    /**
     * Search function to search issues with JQL string
     *
     * @param null $jql
     * @return mixed
     */
    public static function search( $jql = NULL )
    {
        $data   = json_encode( array( 'jql' => $jql ) );
        $result = self::request( 'search', $data );
        return json_decode( $result );
    }

    private static function request( $request, $data, $is_post = 0, $is_put = 0 )
    {
        $ch = curl_init();
        curl_setopt_array( $ch, array(
            CURLOPT_URL            => config( 'jira.url' ) . '/rest/api/2/user?username=' /*. $request*/,
            CURLOPT_USERPWD        => config( 'jira.username' ) . ':' . config( 'jira.password' ),
            CURLOPT_POSTFIELDS     => $data,
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
        dd($response);
        curl_close( $ch );
        return $response;
    }
}