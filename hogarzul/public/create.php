<?php

class Create 
{

  private $new_mediciones_diarias;

  
  function __construct()
  {
      $new_mediciones_diarias = $this->new_mediciones_diarias;
  }  


  /**
   * Método para actualizar
   * @param mixed
   * @return update
   */
  function create($new_mediciones_diarias)
  {   
      $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "mediciones_diarias" ,
                implode(", ", array_keys($new_mediciones_diarias)),
                ":" . implode(", :", array_keys($new_mediciones_diarias)) 
              );

      return $sql;
  }

}  

?>