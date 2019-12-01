<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edit page</title>
    </head>
    <body>
    <?php
            $keyword = $_GET["eid"];
            //echo $keyword;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mazda";
            // echo $keyword;
                    // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
        mysqli_set_charset($conn,"utf8");
        
        $sql = "SELECT * FROM `applicant` WHERE eid ='$keyword' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $xtype = $row ["egender"];

	            $xfullname = $row ["ename"]; 

                $xage = $row ["eage"]; 
   
                $xpv = $row ["eprovince"]; 
	
	            $xmobilenumber = $row ["emnb"]; 
   
                $xexp = $row ["eexp"]; 
  
            }
        }
                    echo"<center><h2>แก้ไขข้อมูล ".$keyword."</h2></center>";
                    echo "<form method=\"post\" action=\"update.php\">";
                    echo "<input type=\"hidden\"  name=\"suid\" value=\"$keyword\">";
                    echo "เพศ : <br />";
                if($xtype=="male"){
                    echo "<input type=\"radio\" name=\"gender\" value=\"male\" checked> ชาย<br />";
                    echo "<input type=\"radio\" name=\"gender\" value=\"female\"> หญิง<br />";
                }else{
                    echo "<input type=\"radio\" name=\"gender\" value=\"male\"> ชาย<br />";
                    echo "<input type=\"radio\" name=\"gender\" value=\"female\"checked> หญิง<br />";
                }
            
                    echo "ชื่อ-นามสกุล :<br />";
                    echo "<input type=\"text\" name=\"name\" value=\"$xfullname\" placeholder=\"ชื่อ\"/><br />";
                    echo "อายุ :<br/>";
                    echo "<input type=\"number\" id=\"age\" name=\"age\"value=\"$xage\"/><br />";
                
                    echo "จังหวัด : <br />";
                    echo "<select name=\"province\">";
                if($xpv=="kan"){
                    echo "<option value=\"kan\"selected>กาญจนบุรี</option>";
                    echo "<option value=\"bkk\">กรุงเทพ</option>";
                    echo "<option value=\"nkt\" selected>นครปฐม</option>";
                    echo "</select> <br />";
                }else if($xpv="bkk"){
                    echo "<option value=\"kan\">กาญจนบุรี</option>";
                    echo "<option value=\"bkk\"selected>กรุงเทพ</option>";
                    echo "<option value=\"nkt\">นครปฐม</option>";
                    echo "</select><br />";
                }else{
                    echo "<option value=\"kan\">กาญจนบุรี</option>";
                    echo "<option value=\"bkk\">กรุงเทพ</option>";
                    echo "<option value=\"nkt\"selected>นครปฐม</option>";
                    echo "</select><br />";
                }

                    echo "เบอร์โทร :<br />";
                    echo "<input type=\"number\" name=\"mobile_number\"value=\"$xmobilenumber\"/><br />";
                    echo "ประสบการณ์ :<br />";
                    echo "<textarea rows=\"6\" cols=\"50\" name=\"experience\"value=\"$xexp\"/></textarea>";
                    echo "<br />";
                        
                    echo "<input type=\"submit\" value=\"อัพเดทข้อมูล\">";
                    echo "<input type=\"reset\" value=\"เคลียร์\" />";
                    echo "</form>";
            ?>
    </body>
    </html>