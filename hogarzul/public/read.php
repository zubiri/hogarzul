<?php

class Read 
{
  private $connection;

  
  function __construct()
  {
      $connection = $this->connection;
  }  


  /**
   * Método para actualizar
   * @param mixed
   * @return update
   */
  function read( $connection, $post_fecha)
  {   
     $sql = "SELECT * 
            FROM mediciones_diarias
            WHERE fecha = :fecha";

      $statement = $connection->prepare($sql);
      $statement->bindParam(':fecha',  $post_fecha, PDO::PARAM_STR);
      $statement->execute();

      $result = $statement->fetchAll();

      return $result;
  }

}  

?>