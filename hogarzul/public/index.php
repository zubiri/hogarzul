<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

require "../config.php";
require "../common.php";
require "validation.php";
require "read.php";
require "update.php";
require "create.php";
   
if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

    //-----------------------------------------------------
    // Variables
    //-----------------------------------------------------
    $errores = [];
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
    $temperatura_max = isset($_POST['temperatura_max']) ? $_POST['temperatura_min'] : null;
    $temperatura_min = isset($_POST['temperatura_min']) ? $_POST['temperatura_min'] : null;
    $prevision_precipita = isset($_POST['prevision_precipita']) ? $_POST['prevision_precipita'] : null;
    $observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : null;

    //-----------------------------------------------------
    // Validaciones
    //-----------------------------------------------------
    // Fecha
    $validation = new Validation($observaciones,$temperatura_max,$prevision_precipita,$errores);
    $errores = $validation->validate($fecha, $temperatura_max, $temperatura_min, $prevision_precipita, $observaciones,$errores);
    $post_fecha = date("Y-m-d", strtotime($_POST['fecha']));


	if(count($errores)==0) { 
	        try 
            {
    	       $connection = new PDO($dsn, $username, $password, $options);
    	          
    	        $new_mediciones_diarias = array(
    	            "fecha" => $post_fecha,
    	            "temperatura_max"  => $_POST['temperatura_max'],
    	            "temperatura_min"  => $_POST['temperatura_min'],
    	            "prevision_precipita" => $_POST['prevision_precipita'],
    	            "observaciones"  => $_POST['observaciones']
    	        );

    	        //Comprobamos si hay una fecha en la DB que coincida con la del post
    	        $read = new Read();
                $result = $read->read($connection,$post_fecha);
 
		      	//En caso de que no coincida la fecha insertamos en la tabla, en caso contrario actualizamos
		        if( !isset($result) || empty($result[0]['fecha']) || $result[0]['fecha'] !== $post_fecha){

		          $create = new Create();
                  $sql = $create->create($new_mediciones_diarias);

		        }else{
		           $update = new Update();
                   $sql = $update->update();
		        }
	          
	          $statement = $connection->prepare($sql);
	          $statement->execute($new_mediciones_diarias);
	        } catch(PDOException $error) {
	            echo $sql . "<br>" . $error->getMessage();
	        }
	}
}      
?>
<?php require "templates/header.php"; ?>
  <?php   if (isset($errores) && count($errores)>0){  ?>
        <ul class="errores">
            <?php  
                foreach ($errores as $error) {
  
                    echo '<li>' . $error . '</li>';
                } 
            ?>
        </ul>    
  <?php }else{ ?>      

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote>Añadido correctamente.</blockquote>
  <?php endif; ?>
  <?php } ?>


  <h2>Añadir mediciones diarias</h2>

  <form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <label for="fecha">Fecha</label>
    <input type="text" placeholder="Ej: 03-04-2019" name="fecha" id="fecha">
    <label for="temperatura_max">Temperatura máxima</label>
    <input type="text" placeholder="Ej: 29.6" name="temperatura_max" id="temperatura_max">
    <label for="temperatura_min">Temperatura mínima</label>
    <input type="text" placeholder="Ej: 9.6" name="temperatura_min" id="temperatura_min">
    <label for="prevision_precipita">Previsión precipitaciones</label>
    <input type="text" placeholder="Ej: 2" name="prevision_precipita" id="prevision_precipita">
    <label for="observaciones">Observaciones</label>
    <input type="text" placeholder="Ej: Día tranquilo" name="observaciones" id="observaciones">
    <input type="submit" name="submit" value="Submit">
  </form>


<?php require "templates/footer.php"; ?>
