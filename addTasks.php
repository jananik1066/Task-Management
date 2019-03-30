<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Add Tasks</title>
		<meta name="description" content="A sidebar menu as seen on the Google Nexus 7 website" />
		<meta name="keywords" content="google nexus 7 menu, css transitions, sidebar, side menu, slide out menu" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<script type="text/javascript">
		function noenter() {
  			return !(window.event && window.event.keyCode == 13); }
  		</script>

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

		button {
		  color: #900;
		  font-weight: bold;
		  font-size: 150%;
		  text-transform: uppercase;
		}
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
				<li><font size="5" face="verdana"><i><b>Hi! Admin</b></i></font></font></li>
			</ul> 
			<header>
				<h2>Add Tasks</h2>
				<form method="post" action="tasks.php">
					<div id="add">
						<table id="insertTask" style="padding: 10px;"></table>
					</div>
					<div id="rem">
						<label style="padding-right: 5px;">No. of Tasks to be Added:</label>
						<input type="numeric" name="noTasks" id="noTasks">
						<br><br>
					</div>
					<input type="button" onclick="createTable()" id="go" value="Go"/>
					<br>
					<div id="sub" style="visibility: hidden;">
						<button type="submit" value="Add Tasks">Submit</button>
					</div>
				</form>
			</header>
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	</body>

	<script type="text/javascript">
		function createTable() {
			var datas = document.getElementById("noTasks").value;
			var table = document.getElementById("insertTask");

			document.getElementById("rem").style.visibility="hidden";
			document.getElementById("go").remove();

			var row = table.insertRow(0);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);

			// Add some text to the new cells:
			cell1.innerHTML = "<h3>S.No</h3>";
			cell2.innerHTML = "<h3>Name</h3>";
			cell3.innerHTML = "<h3>Description</h3>";
			cell4.innerHTML = "<h3>Completion Date Time</h3>";
			
			for(var i=1;i <= datas; i++) {
				// Create an empty <tr> element and add it to the 1st position of the table:
				var row = table.insertRow(i);

				// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
				var cell1 = row.insertCell(0);
				var cell2 = row.insertCell(1);
				var cell3 = row.insertCell(2);
				var cell4 = row.insertCell(3);
			
				// Add some text to the new cells:
				cell1.innerHTML = ""+i+"";
				cell2.innerHTML = "<input type='text' name='val"+i+"1'/>";
				cell3.innerHTML = "<textarea name='val"+i+"2'/>";
				cell4.innerHTML = "<input type='datetime-local' name='taskDate"+i+"'>";
			}
			document.getElementById("sub").style.visibility = "visible";
		}
	</script>
</html>