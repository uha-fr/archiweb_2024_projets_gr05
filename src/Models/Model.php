<?php
namespace UHA\Models;

abstract class Model{
   
   protected $table; 
   protected $repository;

   public function  __construct(){
      
   }

   abstract public function getAll();

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