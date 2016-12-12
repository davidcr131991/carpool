<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


	
		
		

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				
			<div class="row-fluid" id="main-content">
		<div class="span1"></div>
		<div class="span5"> 
			<h2 align="center"><small>Buscar un ride</small></h2>
			<hr>
      		<br/>
			<form action="getride.php" method="post" >
				<input type="hidden" name="action" value="search" />
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
						$today = date("Y-m-d H:i:s");
						$query="SELECT `id`, `from` , `to` , `uptime` , `vehicle` from carpools where uptime > '".$today."'";
						$result = mysql_query($query);
						if(mysql_num_rows($result)==0){
		          	    	echo("<p align='center'>
No hay rides programados actualmente </p>\n");
		          	  
								
							}
		          	  	else {
							echo '<table id="upcomingList" class="table table-hover">
								<thead><tr> <th> Id </th> <th>Tipo de Transporte</th> <th> inicio </th> <th> destino </th> <th> hora de inicio</th></tr></thead>
								<tbody>';
									
							while($row = mysql_fetch_array($result)) {
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













			</div>
			<p>You are now logged in.</p>
		</div>
	</div><!-- .row -->
</div><!-- .container -->