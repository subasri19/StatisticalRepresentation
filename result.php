<!DOCTYPE html>
<html>

<head>
    <title>
        MC_LOADER
    </title>
    <link REL='stylesheet' type='text/css' href='./CSS/style.css'>
</head>

<body>
<?php
	include("./DBConnection.php");
	if(!isset($_SESSION))
	    session_start();

	if(isset($_POST['storeParameters'])){
		
		$cnt=0;

	 // $parameterName = array();
	 // for($i=0; $i<4; $i++){
	 //        echo "value check : ". $_POST["parameterValue"][$i]. "<br/>";
	 //        array_push($parameterName, $_POST["parameterValue"][$cnt]);
	 //    }
	 //    $_SESSION["parameterValue"] = $parameterName;

	    echo "enter<br/>";
	    print_r($_SESSION["parameterValue"] );

	    $query = "select id, name from parameters;";
	    $result = mysql_query($query,$db);

	    if($result)
	        echo "select success";
	    else
	        echo "select failed". mysql_error($result);

	    if(mysql_num_rows($result)>0){
	    	date_default_timezone_set('Asia/Kolkata');
	        $date = date('Y-m-d H:i:s l');
	        $i=0;
	        while($row = mysql_fetch_assoc($result)){
	            $insertQuery = "insert into test_parameter (testid, parameter_id, parameter_value, updated_time) values ('".$_SESSION["testName"]."',". $row["id"] . "," .$_POST["parameterValue"][$cnt]. ",'". $date. "');";
	            // echo "<br> insert query : ".$insertQuery. "<br/>";
	            $executeInsertQuery = mysql_query($insertQuery,$db);
	            // if($executeInsertQuery)
	            //     echo "insert success";
	            // else
	            //     echo "insert failed". mysql_error($executeInsertQuery);
	        }
	    }
	}
?>
	<div class="chart-container">
			<canvas id="mycanvas"></canvas>
		</div>
		
		<!-- javascript -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/Chart.min.js"></script>
		<script type="text/javascript" src="js/linegraph.js"></script>
</body>