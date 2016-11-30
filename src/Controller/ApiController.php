<?php
/**
 * Created by IntelliJ IDEA.
 * User: benturkia
 * Date: 30/11/2016
 * Time: 16:06
 */

namespace Chat\Controller;


use Chat\Core\Controller;
use Chat\Entity\Message;
use Chat\Entity\User;

class ApiController extends Controller
{
    /**
     * @return jsonResponse
     */
    public function messages (){
        $messages = Message::all();
        $this->renderJson($messages);
        return;
    }

    /**
     *  jsonResponse
     */
    public function users (){

        $users = User::find('all',array('select' => 'id, username'));

        /**
         * @var $user User
         */
        foreach ($users as $key =>$user){
            $users[$key] = $user->to_array();
        }
        return $this->renderJson($users);
    }

    /**
     *  jsonResponse
     */
    public function send (){

        /**
         * @var $user User
         */
        $user = User::create(array('content' => $_POST['content'], 'uid' => $_SESSION['uid']));

        if($user){
            $this->renderJson(['ok'=>'ok']);
            return;
        }
    }


}