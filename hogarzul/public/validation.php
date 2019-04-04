<?php

class Validation 
{
  private $fecha;
  private $temperatura_max;
  private $temperatura_min;
  private $prevision_precipita;
  private $observaciones;
  private $errores;
  
  function __construct()
  {
    $fecha = $this->fecha;
    $temperatura_max = $this->temperatura_max;
    $temperatura_min = $this->temperatura_min;
    $prevision_precipita = $this->prevision_precipita;
    $observaciones = $this->observaciones;
    $errores = $this->errores;
  }  
    /**
     * Método que valida si alguna casilla está vacía
     * @param {string} - Texto a validar
     * @return {boolean}
     */
    function validar_requerido($fecha, $temperatura_max, $temperatura_min, $prevision_precipita, $observaciones): bool
    {   
        if(trim($fecha) == '' || trim($temperatura_max) == '' || trim($temperatura_min) == '' || trim($prevision_precipita) == '' || trim($observaciones) == '' ){
          return false;
        }
        return true;
    }

    /**
     * Método que valida si es un número entero 
     * @param {string} - Número a validar
     * @return {bool}
     */
    function validar_temperatura_max(string $temperatura_max): bool
    {
      if ( strpos( $temperatura_max, "." ) !== false ) {
      return true;
      }
      return false;
    }


      /**
     * Método que valida si es un número entero 
     * @param {string} - Número a validar
     * @return {bool}
     */
    function validar_temperatura_min(string $temperatura_min): bool
    {
      if ( strpos( $temperatura_min, "." ) !== false ) {
      return true;
      }
      return false;
    }


    /**
     * Método que valida si es un número decimal 
     * @param {string} - Número a validar
     * @return {bool}
     */
    function validar_prevision_precipita(string $prevision_precipita): bool
    {

      return (filter_var($prevision_precipita, FILTER_VALIDATE_INT) === FALSE) ? False : True;
      
    }


    /**
     * Método validar fecha
     * @param {string} - Fecha a validar
     * @return {bool}
     */
    function validar_fecha($fecha){
      $valores = explode('-', $fecha);
      if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
        return true;
        }
      return false;
    }

    //-----------------------------------------------------
    // Validaciones
    //-----------------------------------------------------
 

  function validate($fecha, $temperatura_max, $temperatura_min, $prevision_precipita, $observaciones, $errores)
    {
      if (!$this->validar_requerido($fecha, $temperatura_max, $temperatura_min, $prevision_precipita, $observaciones)) {
          $errores[] = 'Debe rellenar todos los campos.';
      }
    
      if (!$this->validar_temperatura_max($temperatura_max)) {
          $errores[] = 'El campo temperatura máxima debe ser un número decimal';
      }
      if (!$this->validar_temperatura_min($temperatura_min)) {
          $errores[] = 'El campo temperatura mínima debe ser un número decimal';
      }
      if (!$this->validar_prevision_precipita($prevision_precipita)) {
          $errores[] = 'El campo de previsión precipitaciones debe ser un número entero.';
      }

      if (!$this->validar_fecha($fecha)) {
          $errores[] = 'El campo fecha debe tener el siguiente formato: 03-04-2019.';
      }

      return $errores;
    }  
  
}

              
