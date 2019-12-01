<?php

$keyword = $_POST["suid"];
echo $keyword;
echo "<br/>";

$type = $_POST["gender"];
echo $type;
echo "<br>";

$fullname = $_POST["name"]; 
echo $fullname;
echo "<br/>";

$age = $_POST["age"]; 
echo $age;
echo "<br/>";

$pv = $_POST["province"]; 
echo $pv; 
echo "<br/>";

$mobilenumber = $_POST["mobile_number"]; 
echo $mobilenumber; 
echo "<br/>";

$exp = $_POST["experience"]; 
echo $exp;
echo "<br/>";

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
    echo "Connected successfully";
    mysqli_set_charset($conn,"utf8");
    //$sql = "INSERT INTO user (suuid, sugender, suname, suprovince, sufavcolor, susize, sumobile_number, supwd, suintro) VALUES (NULL, 'male', 'สมศรี', 'กาญจนบุรี', '#00f00', '5', '12345', '9876543210','Hello')";
    //$sql = "UPDATE user SET sugender=$ (sugender, suname, suage, subloodgroup, sumedicalrights, sunumber, sumobilenumber, suintro) VALUES ('$type', '$fullname', '$age', '$bg', '$mr', '$number', '$mnb','$intro')";
    $sql = "UPDATE applicant
     SET egender = '$type', ename = '$fullname', eage = '$age', eprovince = '$pv', emnb = '$mobilenumber', eexp = '$exp'
     WHERE eid = $keyword
    ";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    echo"<a href=\"http://127.0.0.1/60224090111_project/formtest.html\">หน้าฟอร์ม</a>";
?>