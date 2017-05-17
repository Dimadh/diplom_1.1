<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20.04.17
 * Time: 20:18
 */

namespace App;


use PhpParser\Node\Expr\Array_;

class JiraProgrammer
{
    /**
     * Search function to search issues with JQL string
     *
     * @param null $jql
     * @return mixed
     */
    public static function search()
    {
        $items = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o",
                        "p","q","r","s","t","u","v","w","x","y","z");
        $user = array();
        foreach ($items as $item) {
            $result = json_decode(self::request('user/search?username=' . $item));
            foreach ($result as $add_result) {
                    array_push($user, $add_result->name);
                    array_push($user, $add_result ->emailAddress);
                    array_push($user, $add_result ->key);
                }
           }
        $concut_user = array_unique($user);
        return $concut_user;
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