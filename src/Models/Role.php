<?php
namespace UHA\Models;


class Role extends Model{
    private $role_id;
    private $nom_du_role;

    public function __construct()
    {
        parent::__construct();
        $this->setTable("roles");
    }

    public function getAll(){

    }
}
?>