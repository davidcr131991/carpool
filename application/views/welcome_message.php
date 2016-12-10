<?php
/*
 * La página de destino que muestra todo el problema
 */
	require_once('functions.php');
	//
		include('header.php');


		
?>
<div class="container">

  
	<?php
        if(isset($_GET['share']))
          echo("<div class=\"alert alert-info\">\nSu Ride ha sido añadido con éxito! Puede editarlo desde su perfil\n</div>");
        else if(isset($_GET['success']))
          echo("<div class=\"alert alert-success\">\nSu solicitud ha sido enviada al Rider para su aprobación, Usted puede esperar una llamada pronto!.\n</div>");
 
        else if(isset($_GET['nerror']))
          echo("<div class=\"alert alert-error\">\nPor favor ingrese todos los detalles solicitados antes de continuar!\n</div>");
      ?>

<?php
include('menu.php');
?>


	
  <div class="row-fluid" id="main-content">
		<div class="span1"></div>
		<div class="span5"> 
			<h2 align="center"><small>Buscar un ride</small></h2>
			<hr>
      		<br/>
			<form action="<?php echo base_url('welcome/buscar')?>" method="post" accept-charset="utf-8">
				
       		    <input type="text" name="from" data-provide="typeahead" class="typeahead" placeholder="inicio del ride" required/><br/>
    	    	<input type="text" name="to" data-provide="typeahead" class="typeahead" placeholder="Destino"  required/><br/>
    	    	
Rango de tiempo para esperar su ride:
	      			<div id="uptimepicker" class="input-append date">
				      <input type="text" name="uptime"></input>
				      <span class="add-on">
				        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
				      </span>
				    </div> <br/>
            Hora de finalización:
              <div id="downtimepicker" class="input-append date">
              <input type="text" name="downtime"></input>
              <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
              </span>
            </div>
				   <br/>
    	    	<label class="checkbox inline">
    				<input type="checkbox" id="inlineCheckbox1" value="Taxi"> Taxi
   				 </label>
   				 <label class="checkbox inline">
   					 <input type="checkbox" id="inlineCheckbox2" value="Car"> Car
   				 </label>
   				 <label class="checkbox inline">
    				<input type="checkbox" id="inlineCheckbox3" value="Auto"> Otro
   				 </label>
   				 <br/>
   				 <br/>
    			<input class="btn" type="submit" name="submit" value="Buscar"/>
      		</form>
      
		</div>
		<div class="span5">
			<h2 align="center"><small>Ultimos Car Pools</small></h2>
			<?php
// 		       
          if(empty($array)) {
                      echo("<p align='center'>
No hay rides programados actualmente </p>\n");
                  
                
              }
            
    
                    else {
               
         
							echo '<table id="upcomingList" class="table table-hover">
								<thead><tr> <th> Id </th> <th>Tipo de Transporte</th> <th> inicio </th> <th> destino </th> <th> hora de inicio</th></tr></thead>
								<tbody>';
				
							foreach ($array as $row) {
                
								echo "<tr><td>".$row['id']."</td><td>".$row['vehicle']."</td><td>".$row['from']."</td><td>".$row['to']."</td><td>".$row['uptime']."</td></tr>";
							}
						}
					?>
					</tbody>
			</table>
		</div>
	</div>
</div>
<div id="push"></div>
    </div> <!-- /wrap -->
    <div id="footer">
      <div class="container">
        <p class="muted credit">David Araya Carpool</p>
      </div>
    </div>

    <!-- javascript files
    ================================================== -->
    <!-- Archivos javascript-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/datetimepicker.js"></script>
    <script type="text/javascript">
      $('#uptimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
      });
      $('#downtimepicker').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
      });


      $('td:nth-child(1),th:nth-child(1)').hide();
      $('#upcomingList').find('tr').click( function(){
  var row = $(this).find('td:first').text();
  window.location.href = "ride.php?id="+row;
});
    </script>
    <?php 
    $query = "SELECT city_name from cities";
	$result = mysql_query($query);
	echo "<script>var city = new Array();";
                while($row = mysql_fetch_array($result)){
                    //echo '<option value="' . $row["city_name"]. '"> ' . $row["city_name"].'</option>';
                    echo 'city.push("' . $row["city_name"]. '");';
    }
    echo '$(".typeahead").typeahead({source : city})';
    echo "</script>"

    ?>
</body></html>
