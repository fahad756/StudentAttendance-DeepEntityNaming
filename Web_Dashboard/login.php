<?php
session_start();
if(isset($_SESSION['username'])){
    header('location: /Attendance_new/Dashboard/index.php');
}

if (isset($_POST['btn-login']))
{
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    include('db_connection.php');
    $qry = "select * from users where username = '$username'";
    $result = mysqli_query($db_con, $qry);
    $row = mysqli_fetch_assoc($result);
        if(empty($row)){
            echo "Username or password is wrong!!";
            return;
        }
        if( in_array($row['user_type']??'', ['teacher', 'admin'])) {
            $verify = password_verify($password, $row['password']);
            if($verify){
                $_SESSION['username'] = $username;
                echo $_SESSION['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['user_type'] = $row['user_type'];
                header("Location: /Attendance_new/Dashboard/index.php");
                exit();
            }else{
                echo "Incorrect";
            }     
        }
    }   
?>
<html >
<head>

<link rel="stylesheet" href="./loginstyle.css">

</head>
<body>
  
<div class="app-container">
<div class="app-content">
<div class="wrapper">
<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
    Username: <input type="text" name="username">
    Password: <input type="password" name="password">
    <button name="btn-login">Login</button>
    <a href = ></a>
</div>
</div>
    </div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
