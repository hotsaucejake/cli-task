<?php namespace hotsaucejake;

use PDO;

class DatabaseAdapter {
   
   protected $connection;
   
   function __construct(PDO $connection)
   {
      $this->connection = $connection;
   }
   
   public function fetchAll($tableName)
   {
      return $this->connection->query('SELECT * FROM ' . $tableName)->fetchAll();
   }
   
   public function query($sql, $parameters)
   {
      // insert into tasks (name) values(:name)
      return $this->connection->prepare($sql)->execute($parameters);
   }
   
}