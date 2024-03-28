<?php 
namespace UHA\Models;
use Doctrine\ORM\Mapping as ORM;
use UHA\Repositories\UserRepository;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends Model
{

    private $user_id;

    private $username;

    private $token;

    private $email;

    private $nom;

    private $prenom;

    private $password;

    private $role;

    public function __construct()
    {
        parent::__construct();
        $this->setTable("utilisateurs");
        $this->repository = new UserRepository($this->table);
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    public function getAll(){
        return $this->repository->getAll();
    }

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(){
        if($this->role == null){
            $role = $this->repository->getRole($this->user_id);
        }
        return $this->role;
    }

    public function assignRole(Role $role){

    }
}


?>