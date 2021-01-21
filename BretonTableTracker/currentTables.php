<head>
<link rel="shortcut icon" type="image/png" href="favicon.png"/>
<link rel="apple-touch-icon" sizes="180x180" href="apple-icon.png">
 
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<div align="center" class="logo-image" id="spacetaker"><a href="http://team.venosaprecast.com/BretonTableTracker/currentTables.php">
<img src="venosa_logo.jpg" style="max-width:100%; height:auto !important;">
</a>
</div>
<title>Active Tables</title>
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->

<style>
.select-css {
	display: block;
	font-size: 16px;
	font-family: sans-serif;
	font-weight: 700;
	color: #444;
	line-height: 1.3;
	padding: .6em 1.4em .5em .8em;
	width: 100%;
	max-width: 50%;
	box-sizing: border-box;
	margin: 0;
	border: 1px solid #aaa;
	box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
	border-radius: .5em;
	-moz-appearance: none;
	-webkit-appearance: none;
	appearance: none;
	background-color: #fff;
	background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
	  linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
	background-repeat: no-repeat, repeat;
	background-position: right .7em top 50%, 0 0;
	background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
	display: none;
}
.select-css:hover {
	border-color: #888;
}
.select-css:focus {
	border-color: #aaa;
	box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
	box-shadow: 0 0 0 3px -moz-mac-focusring;
	color: #222;
	outline: none;
}
.select-css option {
	font-weight:normal;
}

.buttonShadow:focus {
	border-color: #aaa;
	box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
	box-shadow: 0 0 0 3px -moz-mac-focusring;
	color: #222;
	outline: none;
}

.inputForm {
	margin: 5px;
}


</style>


</head>



<body>
<div class="container">
		<div align="center" class="p-3">
		<table class="table table-striped" style="width: 100%">
		<colgroup>
       	<col span="1" style="width: 20%;">
		<col span="1" style="width: 80%;">
    	</colgroup>
			<thead>
				<tr>
				<th scope="col">Table</th>
				<th scope="col">Project Name</th>
				<th scope="col"></th>
				</tr>
			</thead>

<?php
	require('connect.php');

	$tablequery = mysqli_query($connection, "	SELECT Projects.projectID, Projects.projectName, bretonTables.tableName, bretonTables.tableID
												FROM projects
												INNER JOIN bretonTables ON Projects.tableID=bretonTables.tableID
												ORDER BY tableID;"); //tableID Ascending
  
	  $emptyarray = array();
	  while ($result = mysqli_fetch_array($tablequery, MYSQLI_ASSOC)){
		  
	  $projectName = $result['projectName'];
	  $tableName = $result['tableName'];
	  $projectid = $result['projectID'];

  
				echo '<tr>';
				echo '<td>'.$tableName.'</td><td>'.$projectName.'</td>';
				echo '<td>';
				?>
				<button type="button" id="delbtn" class="btn btn-danger lg" onClick="window.location.href='<?php echo 'deleteProject.php?projectid=' . $projectid . ' ' ?> '"> X </button> 
				<?php
				echo '</tr>';
		  }
		  
?>
    </tbody>
  </table>
<button style="margin: 10px" type="button" class="btn btn-primary btn-lg" onClick="window.location.href='newBretonTable.php'">Add Table</button>
</div>
			
</body>