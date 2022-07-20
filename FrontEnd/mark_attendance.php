<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location:login.php");
}
?>

<html>
    <head></head>
    <body>
        <center><table border="1" width="500" height="150">
        <tr>
            <th> Name </th>
            <th> Roll Number </th>
            <th> Attendance </th>
        </tr>
        <?PHP
             include('db_connection.php');
             $sav = "SELECT t2.Name as Name, t2.rollno as rollno, IF(t1.rollno IS NULL, 0, 1) as present FROM mark_attendance t1 RIGHT JOIN student_detail t2 ON t2.rollno = t1.rollno";
                $result = mysqli_query($db_con, $sav);
                
                while ($row = mysqli_fetch_array($result)) {
                    echo "<td>".$row['Name']."</td>";
                    echo "<td>".$row['rollno']."</td>";
                    if(($row['present'])){ 
                        echo "<td><form> <input type='checkbox' checked></td></tr>";
                    }
                    else{ 
                        echo "<td><form> <input type='checkbox'></td></tr>";
                    }
                    var_dump ($row['rollno']);
               
                }
            
           
			 	echo "</tr>";  
                               
            
//             include('db_connection.php');


// $sav = "SELECT t1.*, CASE WHEN t2.rollno IS NULL THEN 0 ELSE 1 END AS attending FROM student_detail t1 LEFT JOIN mark_attendance t2 on t2.rollno = t1.rollno";
// $result = mysqli_query($db_con, $sav);
// if (mysqli_num_rows($result) == 0) throw new Exception("No results");

// while($r = mysqli_fetch_assoc($result)) {
//     echo "<tr>";
//     echo "<td>".$r['Name']."</td>";
//     echo "<td>".$r['rollno']."</td>";
//     //  echo $s['rollno'];

//     if($r['attending']){
//         echo "<td><form> <input type='checkbox' checked value=".$r['Name']."></td>";
//     }
//     else{
//         $lastRow = $r;
//         echo "<td><form> <input type='checkbox' value=".$r['Name']."></td>";
//     }
//     echo "</tr>";
// }
        ?>   
        </table></center>
    </body>
</html>