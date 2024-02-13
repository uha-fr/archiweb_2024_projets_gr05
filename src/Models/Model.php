<?php
   namespace UHA\Models;

use UHA\Services\Database;

abstract class Model{
   protected static $pdo;
   protected $table; 

   public function  __construct(){
      $database = new Database();
      self::$pdo =  $database->getPDO();
      print_r($database->getPDO());
   }

   
      


   /**
    * Get the value of table
    */ 
   public function getTable()
   {
      return $this->table;
   }

   /**
    * Set the value of table
    *
    * @return  self
    */ 
   public function setTable($table)
   {
      $this->table = $table;

      return $this;
   }
}
?>