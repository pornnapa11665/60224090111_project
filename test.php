<?php 
     
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
	mysqli_set_charset($conn, "utf8");
	
    //$sql = "INSERT INTO user (gender, prefix, name, address, age, race, nationality, religion, status, province, mobile_number, email, history_of_educatione, experience, aptitude) VALUES (NULL, 'ชาย', 'นาย', 'รวี', '13/2 ม.6 ต.บ้านเก่า ', '25', 'ไทย', 'ไทย', 'พุทธ', 'โสด', 'กาญจนบุรี', '0972463781', 'rawee123@gmail.com', 'ป.ตรี มหาวิทยาราชภัฏกาญจนบุรี', 'ไม่เคย จบใหม่', 'คอมพิวเตอร์')";
	    $sql = "INSERT INTO applicant ( egender, ename, eage, eprovince, emnb, eexp ) VALUES ('$type', '$fullname', '$age', '$pv', '$mobilenumber', '$exp')";
	
	if ($conn->query($sql) == TRUE) {
		echo "Database created successfully";
	} else {
		echo "Error creating database: " . $conn->error;
	}
	
    $conn->close();
    echo"<a href=\"http://127.0.0.1/60224090111_project/formtest.html\">หน้าฟอร์ม</a>";
 
?>