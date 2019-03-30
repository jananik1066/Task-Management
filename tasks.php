<?php
	include 'db/db_config.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$no = $_POST['noTasks'];
		for($i=1;$i<=$no;$i++) {	
	    	$sql = "INSERT INTO tasks (name, description, status, target_date)
					VALUES ('".$_POST['val'.$i.'1']."', '".$_POST['val'.$i.'2']."', 0, '".$_POST['taskDate'.$i.'']."')";

			if ($conn->query($sql) === TRUE) {
			    //echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
    }
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Pending Tasks</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<script src="js/modernizr.custom.js"></script>
		<script src="js/jquery-3.3.1.js"></script>

		<script src="js/popupmodal-min.js">></script>
		<link rel="stylesheet" href="css/popupmodal.css" />
		<style>
		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th, td {
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {background-color: #000000;}
		</style>
	</head>
	<body>
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li>
									<a href="addTasks.php" class="gn-icon gn-icon-download">Add Task</a>
								</li>
								<li><a href="tasks.php" class="gn-icon gn-icon-cog">Pending</a></li>
								<li><a href="completed.php" class="gn-icon gn-icon-help">Completed</a></li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li><font face="verdana" size="5"><i><b>Hi! Admin</b></i></font></li>
			</ul>
			<header>
				<h2>Pending Tasks</h2>
				<div style="text-align: right;">
					<label align="right">Search: </label>
					<input type="text" name="search" id="search" size="25" placeholder="Enter Task Name"/>
					<br>
				</div>
				<br>
				<table>
					<tr>
						<th>S.No</th>
						<th>Name</th>
						<th>Description</th>
						<th>Due Date</th>
						<th><center>Completed?</center></th>
						<th><center>Delete</center></th>
					</tr>
					<?php
						$sql = "SELECT * FROM tasks ORDER BY target_date ASC";
						$result = $conn->query($sql);

						$i=1;
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	if($row['status']=='0') {
						    		$phpdate = strtotime($row['target_date']);
						    		$date = date( 'd-m-Y h:i a', $phpdate );
							    	echo '<tr id="row'.$i.'"><td>'.$i.'</td>';
							    	echo '<td id="'.$i++.'">'.$row['name'].'</td>';
							    	echo '<td>'.$row['description'].'</td>';
							    	echo '<td>'.$date.'</td>';
							        echo '<td><center><a onclick="return getConfirmation(1,'.$row["sno"].')"><i class="fa fa-check-circle"></i></a></center></td>';
							        echo '<td><center><a onclick="return getConfirmation(2,'.$row["sno"].')"><i class="fa fa-trash"></i></a></center></td></tr>';
						    	}
						    }
						} else {
						    echo "0 results";
						}
					?>	
				</table>
			</header> 
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );

			function getConfirmation(n,id) {
				if(n==1) {
					popup.confirm( { 
						content : "Are you sure you have completed?"
					},
					function(param) {
						if(param.proceed){
      						window.location="complete.php?id="+id+"";
      					}
      					else {
      						return false;
      					}
					});
				}
				else {
					popup.confirm( { 
						content : "Are you sure you want to delete?" 
					},
					function(param) {
						if(param.proceed){
      						window.location="delete.php?id="+id+"";
      					}
      					else {
      						return false;
      					}
					} );	
				}
				return false;
			}

			var input = document.getElementById('search');
  			input.addEventListener('keyup',function() {
  				i=1;
  				while(document.getElementById(""+i+"")) {
  					if(document.getElementById(""+i+"").textContent.toLowerCase().indexOf(input.value.toLowerCase()) !== -1) {
  						$("#row"+i+"").show();
  					}
  					else {
						$("#row"+i+"").hide();  						
  					}
  					i++;
  				}
  			});
		</script>
	</body>
</html>