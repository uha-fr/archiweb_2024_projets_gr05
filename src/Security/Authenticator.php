<?php
namespace UHA\Security;

use UHA\Models\User;
use UHA\Repositories\UserRepository;

class Authenticator{
    protected static $repository;

    public function __construct()
    {
        self::$repository = new UserRepository("User");
    }
    public static function authenticate(User $user){
        $userDB = self::$repository->getUserByEmail($user->getEmail());
        // Validate user credentials
        if ( isset($user) && password_verify($user->getPassword(), $userDB->password)) {
            return true;
        } else {
            return false;
        }      
    }

}
?>