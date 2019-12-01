<?php
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mazda";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
        mysqli_set_charset($conn,"utf8");
        error_reporting(~E_NOTICE );
        error_reporting(error_reporting() & ~E_NOTICE); 
        $suid = $_GET["eid"];
    if($suid){
            echo "has value<br/>";
            //$sql = "INSERT INTO user (suuid, sugender, suname, suprovince, sufavcolor, susize, sumobile_number, supwd, suintro) VALUES (NULL, '$type', '$fullname', '$province', '$fc', '$size', '$mobile_number', '$pwd','$intro')";
            $sql = "DELETE from applicant where eid = '$suid'";
            if ($conn->query($sql) === TRUE) {
                echo "Delete successfully";
            } else {
                echo "Error deleting: " . $sql . "<br>" . $conn->error;
            }
        }
        echo "<table style=\"width:80%\" th align=\"center\" cellspacing=\"0\" border=\"1\"bgcolor=\"#ffcc33\">";
    echo "<tr>";
    echo "<th> ID </th>";
    echo "<th> เพศ </th>";
    echo "<th> ชื่อ - นามสกุล </th>";
    echo "<th> อายุ </th>";
    echo "<th> จังหวัด </th>";
    echo "<th> เบอร์ติดต่อ </th>";
    echo "<th> ประสบการณ์ </th>";
    echo "<th> Edit </th>";
    echo "</tr>";
    
    $sql = "SELECT * FROM `applicant`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["suuid"]. " - Name: " . $row["suname"]. " - province: " . $row["suprovince"]. "<br>";
        if($row["eid"]%2==0){
        echo "<tr>";
        echo "<td bgcolor=\"#000000\"> <font color=\"#ffffff\"><center><a href=\"http://127.0.0.1/60224090111_project/show.php?eid=".$row["eid"]."\">". $row["eid"]."</a></center></td>";
        echo "<td bgcolor=\"#000000\"> <font color=\"#ffffff\">". $row["egender"]."</font> </td>";
        echo "<td bgcolor=\"#000000\"> <font color=\"#ffffff\"><center>". $row["ename"]."<center></td>";
        echo "<td bgcolor=\"#000000\"> <font color=\"#ffffff\"><center>". $row["eage"]."<center></td>";
        echo "<td bgcolor=\"#000000\"> <font color=\"#ffffff\"><center>". $row["epv"]."<center></td>";
        echo "<td bgcolor=\"#000000\"> <font color=\"#ffffff\"><center>". $row["emnb"]."<center></td>";
        echo "<td bgcolor=\"#000000\"> <font color=\"#ffffff\"><center>". $row["eexp"]."<center></td>";
        echo "<td bgcolor=\"#000000\"> <font color=\"#ffffff\"><center><a href=\"http://127.0.0.1/60224090111_project/edit.php?eid=".$row["eid"]."\"><img width=\"50\" height=\"50\" src=\"./img/dinsor.jpg\"></a><center></td>";
        echo "</tr>";
        }else{
            echo "<tr>";
            echo "<td bgcolor=\"#ffffff\"> <font color=\"#000000\"><center><a href=\"http://127.0.0.1/60224090111_project/show.php?eid=".$row["eid"]."\">". $row["eid"]."</a></center></td>";
            echo "<td bgcolor=\"#ffffff\"> <font color=\"#000000\">". $row["egender"]."</font> </td>";
            echo "<td bgcolor=\"#ffffff\"> <font color=\"#000000\"><center>". $row["ename"]."<center></td>";
            echo "<td bgcolor=\"#ffffff\"> <font color=\"#000000\"><center>". $row["eage"]."<center></td>";
            echo "<td bgcolor=\"#ffffff\"> <font color=\"#000000\"><center>". $row["epv"]."<center></td>";
            echo "<td bgcolor=\"#ffffff\"> <font color=\"#000000\"><center>". $row["emnb"]."<center></td>";
            echo "<td bgcolor=\"#ffffff\"> <font color=\"#000000\"><center>". $row["eexp"]."<center></td>";
            echo "<td bgcolor=\"#ffffff\"> <font color=\"#000000\"><center><a href=\"http://127.0.0.1/60224090111_project/edit.php?eid=".$row["eid"]."\"><img width=\"50\" height=\"50\" src=\"./img/dinsor.jpg\"></a><center></td>";
            echo "</tr>";   
        }
    }
    } else {
    echo "0 results";
    }
    echo "</table>";
    $conn->close();
    echo"<a href=\"http://127.0.0.1/60224090111_project/formtest.html\">หน้าฟอร์ม</a>";
   
    ?>