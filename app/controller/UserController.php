<?php
require_once(__DIR__.'/../model/UserModel.php');

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function getUser($mail) {
        $user = $this->userModel->getUser($mail);
        return $user;
    }

    public function detectedAdmin($idUser) {
        $detectedAdmin = $this->userModel->detectedAdmin($idUser);
        return $detectedAdmin?true:false;
    }

    public function getUserData($idUser) {
        $userData = $this->userModel->getUserData($idUser);
        return $userData;
    }


    public function countUser() {
        $countUser = $this->userModel->countUser();
        return $countUser;
    }

    public function getUsers() {
        $users = $this->userModel->getUsers();
        return $users;
    }

    public function searchUser() {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            if(isset($_GET['search-user'])) {
                $term = $_GET['term'];
                $searchUser = $this->userModel->searchUser($term);
                return $searchUser;
            } elseif(isset($_GET['all-user'])) {
                return $this->getUsers();
            } else {
                return $this->getUsers();
            }
        }
    }
}

?>