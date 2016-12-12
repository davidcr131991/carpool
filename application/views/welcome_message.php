<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>


	

<div class="container">

  
	
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
   

</body>
</html>