<?php

class Update 
{

  /**
   * Método para actualizar
   * @param mixed
   * @return update
   */
  function update()
  {   
     $sql = "UPDATE mediciones_diarias 
                      SET fecha = :fecha, 
                        temperatura_max = :temperatura_max, 
                        temperatura_min = :temperatura_min, 
                        prevision_precipita = :prevision_precipita, 
                        observaciones = :observaciones 
                      WHERE fecha = :fecha";

      return $sql;
  }

}  

?>