<?php
    
    global $db;

    $db = mysql_connect('192.168.0.175', 'root', 'abcd1234');

        if(!$db){
            // echo "Connection failed : ";
            die(mysql_error());
        }
        else{
            // echo "Connection estalished in php!!!<br/>";
        }

        $conn = mysql_select_db('mc_app_loader',$db);
 
?>