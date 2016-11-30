<?php
/**
 * Created by IntelliJ IDEA.
 * User: benturkia
 * Date: 30/11/2016
 * Time: 14:33
 */

namespace Chat\Controller;

use Chat\Entity\User;
use Chat\Core\Controller;

class UserController extends Controller
{
    public function login()
    {
        if ($this->isAuthenticated()) {
            header('location:' . URL . 'chat/index');
            return;
        }
        if (!$this->isAuthenticated() && $_POST['username'] && $_POST['password']) {
            if (! $this->validateUsername($_POST['username']) || !$this->validatePassword($_POST['password'])) {
                header('location: ' . URL . 'user/login?error=true');
            }
            $username = $this->validateUsername($_POST['username']);
            $password = $this->validatePassword($_POST['password']);

            /**
             * @var $user User
             */
            $user = User::find_by_username_and_password($username, $password);
            if (isset($user)&& $user->errors === null) {
                $_SESSION['uid'] = (int)$user->id;
                $_SESSION['current_user'] = $user->attributes();
                header('location:' . URL . 'chat/index');
                return;
            }else{
                header('location: ' . URL . '?error=true');
                return;
            }
        } else {
            header('location: ' . URL . '?error=true');
            return;
        }
    }

    public function logout()
    {
        $_SESSION['uid'] = null;
        $_SESSION['current_user'] = null;
        header('location: ' . URL);
        return;
    }

    public function register()
    {

        if (isset($_POST['username']) && isset($_POST['password'])) {

            if (! $this->validateUsername($_POST['username']) || !$this->validatePassword($_POST['password'])) {
                header('location: ' . URL . 'user/register?error=true');
            }

            $username = $this->validateUsername($_POST['username']);
            $password = $this->validatePassword($_POST['password']);
            User::create(array('username' => $username, 'password' => $password, 'status'=>0));
            header('location: ' . URL);
        } else {
            $this->render('views/register.php');
        }

        return;
    }

    private function isAuthenticated()
    {
        if (isset($_SESSION['uid']) && !empty($_SESSION['uid']) && ((int)$_SESSION['uid']) != 0) {
            return true;
        }
        return false;
    }

    private function validateUsername($username)
    {
        $username = trim($username);
        $regex = '/^([\p{Greek}a-zA-Z0-9]*[\p{Greek}a-zA-Z][\p{Greek}a-zA-Z0-9]*)$/';
        if ($this->validateLen($username, 20, 3) === false || preg_match($regex, $username) === 0) {
            return false;
        }
        return $username;
    }

    private function validatePassword($password)
    {
        $password = trim($password);
        if ($this->validateLen($password, 'inf', 6) === false) {
            return false;
        }

        $salt = '43h,HFge`#q#j!56VPzM';
        return hash('sha256', $password . $salt);
        return $password;
    }

    private function validateLen($str, $max_len, $min_len = 1)
    {
        if ($max_len !== 'inf') {
            if (mb_strlen($str, 'UTF-8') > $max_len || mb_strlen($str, 'UTF-8') < $min_len) {
                return false;
            }
        } else {
            if (mb_strlen($str, 'UTF-8') < $min_len) {
                return false;
            }
        }
        return true;
    }
}