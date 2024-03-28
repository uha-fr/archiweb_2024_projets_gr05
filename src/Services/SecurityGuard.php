<?php
namespace UHA\Services;

use UHA\Repositories\UserRepository;

class SecurityGuard {
    private $userRepository;
    public function __construct()
    {
        $this->userRepository = new UserRepository("utilisateurs");
        session_start();
    }

    public function authenticate($email,$password){
        $user = $this->userRepository->getUserByEmail($email);
        if($user != null){
    	    return ($user->mot_de_passe == md5($password))?$user:null;
        } else {
            return null;
        }
    } 

    public function storeInSession($user){
        $_SESSION["email"] = $user->email;
        $_SESSION["user_id"] = $user->user_id;
    }

    public function getUser()
    {
        return (isset($_SESSION["email"]))?$this->userRepository->getUserByEmail($_SESSION["email"]):null;
    }

    
}

?>