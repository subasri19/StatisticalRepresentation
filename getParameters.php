<!DOCTYPE html>
<html>

<head>
    <title>
        MC_LOADER
    </title>
    <link REL='stylesheet' type='text/css' href='./CSS/style.css'>
</head>

<?php
include("./DBConnection.php");

?>

<body>

    <?php

        include("./DBConnection.php");

        if(!isset($_SESSION))
            session_start();

        if(isset($_POST['proceed'])){        
            
            $_SESSION["testName"] = $_POST["testName"];
            $created_datetime = date('Y-m-d H:i:s l');
            $insertTestDetails = "insert into tests (name, created_datetime) values ('".$_SESSION["testName"]."','".$created_datetime."');";
            $executeInsertQuery = mysql_query($insertTestDetails,$db);

            // echo "executeInsertQuery : " . $executeInsertQuery;
            // echo $testName. "  ". $created_datetime. " ". $insertTestDetails;
            // system.out.println("cmd");

            // if($executeInsertQuery)
            //     echo "insert success";
            // else
            //     echo "insert failed". mysql_error($executeInsertQuery);
        }


        global $parameterName;
        $parameterName = array();

        $query = "select id, name from parameters;";
        $result = mysql_query($query,$db);

        if(mysql_num_rows($result)>0){
    ?>

    <form class="parametersForm"  method="POST" action="./result.php">
        <?php
            $cnt = 0;
            while($row = mysql_fetch_assoc($result)){
                echo $row["name"]. " : ";
        ?>
        <input type="text" name="parameterValue[]" class="paramtersList"><br/><br/>
        <?php
                // array_push($parameterName, 301);
                // array_push($parameterName, $_POST["parameterValue"][$cnt]);
                // $cnt = $cnt+1;
            }
            // $_SESSION["parameterValue"] = $parameterName;
        }
        ?>
        <input type="hidden" name="op" value="sent">
        <input type="submit" class="proceed" value="START THE TEST" name="storeParameters">
    </form>
    <?php
        if(!empty($_POST["op"])){
            echo "entered hidden";
            for($i=0; $i<4; $i++)
                echo "value check : ". $_POST["parameterValue"][$i]. "<br/>";
        }
    ?>
</body>

</html>