<?php
session_start();
if($_SESSION['user_type'] == 'admin'){}
else{
  header('location: ./index.php');
}
  include('../db_connection.php');
  if(isset($_POST['delete-teacher'])) 
  {  
          $teacher_id = $_POST['id'];
          include('../db_connection.php');
          $qry  = "DELETE FROM users WHERE id='$teacher_id'";
          $result = mysqli_query($db_con, $qry);
          header("location: teacher_record.php");
 }
 
 
 if(isset($_POST['update'])){

  $T_username = $_POST['update_username'];
  $T_name = $_POST['update_name'];
  $T_id = $_POST['id'];
  $T_password = $_POST['update_password'];
  $hash = password_hash($T_password, PASSWORD_DEFAULT);
  include('../db_connection.php');
  $qry = "UPDATE users SET Name ='$T_name', username = '$T_username' , password = '$hash' WHERE id='$T_id'";
  $result = mysqli_query($db_con, $qry);
  header("location: teacher_record.php");
 }

 if (isset($_POST['upload-teacher']))
 {

$user_n = $_POST['teacher_username'];
$Full_name = $_POST['teacher_name'];
$user_p = $_POST['teacher_password'];

include('../db_connection.php');
$sql = "SELECT * FROM `users` where username = '$user_n' " ;
$results = mysqli_query($db_con, $sql);
$numExistrow = mysqli_num_rows($results);
if($numExistrow > 0){
   ECHO "User Already Exist";
}
else{
   $hash = password_hash($user_p, PASSWORD_DEFAULT);
   $sql="INSERT INTO users (username, password , Name ) VALUES ('$user_n', '$hash', '$Full_name')";
   $results = mysqli_query($db_con, $sql);
}
 }

?>

<?php
  if(isset($_POST['update-teacher'])) 
  {
      $T_username = $_POST['username'];
      $T_name =  $_POST['name'];
      $id =  $_POST['id'];
 ?>
      <input type="checkbox" id="openpopupmenu" />
      <div id="popupmenu"> 
      <div class="popup-header">
      <div class="title">Update Teacher</div>
      <a  href="teacher_record.php"><button data-close-button class="close-button" >&times;</button></a>
      </div>
      <div class="popup-body">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">    
          <center>
            Full Name:	 <input type="text" class="input-bar" name="update_name" value="<?php echo $T_name; ?>" style="height:30px; border:solid 1px grey; margin-left: 2px;"/></br><br>
            Username:	 <input type="text" class="input-bar" name="update_username" value="<?php echo $T_username; ?>" style="height:30px; border:solid 1px grey; margin-left: 2px;"/></br><br>
            password:	 <input type="text" class="input-bar" name="update_password" style="height:30px; border:solid 1px grey; margin-left: 2px;"/></br><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="hidden" name="update_rollnoo" value=" <?php echo $rollno; ?>"/>
            <input type="submit" name="update" value="Update" class="form-button" style="height: 30px; width: 70px; border:none; border-radius: 4px; background-color: green; color: white; margin-bottom: 10px;">
            </center></form>
              </div>     
              </div>
              <div id="overlay"></div> 
            
 <?php } ?>
 
 
<html >
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="./popup.css">

</head>
<body>
  
<div class="app-container">
<div class="sidebar">
    <div class="sidebar-header">
      <div class="app-icon">
        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M507.606 371.054a187.217 187.217 0 00-23.051-19.606c-17.316 19.999-37.648 36.808-60.572 50.041-35.508 20.505-75.893 31.452-116.875 31.711 21.762 8.776 45.224 13.38 69.396 13.38 49.524 0 96.084-19.286 131.103-54.305a15 15 0 004.394-10.606 15.028 15.028 0 00-4.395-10.615zM27.445 351.448a187.392 187.392 0 00-23.051 19.606C1.581 373.868 0 377.691 0 381.669s1.581 7.793 4.394 10.606c35.019 35.019 81.579 54.305 131.103 54.305 24.172 0 47.634-4.604 69.396-13.38-40.985-.259-81.367-11.206-116.879-31.713-22.922-13.231-43.254-30.04-60.569-50.039zM103.015 375.508c24.937 14.4 53.928 24.056 84.837 26.854-53.409-29.561-82.274-70.602-95.861-94.135-14.942-25.878-25.041-53.917-30.063-83.421-14.921.64-29.775 2.868-44.227 6.709-6.6 1.576-11.507 7.517-11.507 14.599 0 1.312.172 2.618.512 3.885 15.32 57.142 52.726 100.35 96.309 125.509zM324.148 402.362c30.908-2.799 59.9-12.454 84.837-26.854 43.583-25.159 80.989-68.367 96.31-125.508.34-1.267.512-2.573.512-3.885 0-7.082-4.907-13.023-11.507-14.599-14.452-3.841-29.306-6.07-44.227-6.709-5.022 29.504-15.121 57.543-30.063 83.421-13.588 23.533-42.419 64.554-95.862 94.134zM187.301 366.948c-15.157-24.483-38.696-71.48-38.696-135.903 0-32.646 6.043-64.401 17.945-94.529-16.394-9.351-33.972-16.623-52.273-21.525-8.004-2.142-16.225 2.604-18.37 10.605-16.372 61.078-4.825 121.063 22.064 167.631 16.325 28.275 39.769 54.111 69.33 73.721zM324.684 366.957c29.568-19.611 53.017-45.451 69.344-73.73 26.889-46.569 38.436-106.553 22.064-167.631-2.145-8.001-10.366-12.748-18.37-10.605-18.304 4.902-35.883 12.176-52.279 21.529 11.9 30.126 17.943 61.88 17.943 94.525.001 64.478-23.58 111.488-38.702 135.912zM266.606 69.813c-2.813-2.813-6.637-4.394-10.615-4.394a15 15 0 00-10.606 4.394c-39.289 39.289-66.78 96.005-66.78 161.231 0 65.256 27.522 121.974 66.78 161.231 2.813 2.813 6.637 4.394 10.615 4.394s7.793-1.581 10.606-4.394c39.248-39.247 66.78-95.96 66.78-161.231.001-65.256-27.511-121.964-66.78-161.231z"/></svg>
      </div>
    </div>
    <ul class="sidebar-list">
      <li class="sidebar-list-item">
        <a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/> </svg>
          <span>Home</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="attendance_report.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span>Attendance Report</span>
        </a>
      </li>
      <?php  if($_SESSION['user_type'] == 'admin')
{ ?>
      <li class="sidebar-list-item ">
        <a href="students.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span>Students Record</span>
        </a>
      </li>
      <li class="sidebar-list-item active">
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span>Teacher Record</span>
        </a>
      </li> 
      <!-- <li class="sidebar-list-item">
        <a href="attendancerecord.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>
          <span>Attendance Record</span>
        </a>
      </li> -->
      <li class="sidebar-list-item">
        <a href="subject.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          <span>Subjects</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="class.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          <span>Class</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="course.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          <span>Assign Course</span>
        </a>
      </li>
      <?php } else {}?>  
    </ul>
    <div class="account-info">
      <div class="account-info-picture">
        <img src="https://images.unsplash.com/photo-1527736947477-2790e28f3443?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTE2fHx3b21hbnxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="Account">
      </div>
      <div class="account-info-name"><?php echo strtoupper($_SESSION['username']); ?></div>
      <input type="checkbox" id="openSidebarmenu" />
      <label for="openSidebarmenu" class="account-info-more "> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg></label>
      <div id="sidebarmenu"> <ul class="menu"><li></li><li><a href="../logout.php">LOGOUT</a></li></ul></div>  
    </div>
  </div>
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Teachers</h1>
      <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
      </button>
    <button class="app-content-headerButton" data-modal-target="#modal"> <label for="create_student" class>Add Teacher</label></button>
    </div>
    <div class="app-content-actions">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <input class="search-bar" name="search" placeholder="Search..." type="text">
      <input type="submit" hidden/>
      </form>
      <div class="app-content-actions-wrapper">
        <div class="filter-button-wrapper">
          <button class="action-button filter jsFilter"><span>Filter</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg></button>
          <div class="filter-menu">
            <label>Semester</label>
            <select>
              <option>1</option>
              <option>3</option>                     <option>2</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
            <label>Section</label>
            <select>
              <option>A</option>
              <option>B</option>
              <option>C</option>
              <option>D</option>
              <option>E</option>
            </select>
            <label>Subject</label>
            <select>
              <option>Islamic Studies</option>
              <option>Data Structure</option>
              <option>Desrete </option>
              <option>OOP</option>
              <option>Human Computer Intraction</option>
            </select>
            <div class="filter-menu-buttons">
              <button class="filter-button reset">
                Reset
              </button>
              <button class="filter-button apply">
                Apply
              </button>
            </div>
          </div>
        </div>
        <button class="action-button list active" title="List View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </button>
        <button class="action-button grid" title="Grid View">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        </button>
      </div>
    </div>
    <div class="products-area-wrapper tableView">
      <div class="products-header">
        <div class="product-cell image">
         Full Name
          <button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button>
        </div>
        <div class="product-cell category">Username<button class="sort-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512"><path fill="currentColor" d="M496.1 138.3L375.7 17.9c-7.9-7.9-20.6-7.9-28.5 0L226.9 138.3c-7.9 7.9-7.9 20.6 0 28.5 7.9 7.9 20.6 7.9 28.5 0l85.7-85.7v352.8c0 11.3 9.1 20.4 20.4 20.4 11.3 0 20.4-9.1 20.4-20.4V81.1l85.7 85.7c7.9 7.9 20.6 7.9 28.5 0 7.9-7.8 7.9-20.6 0-28.5zM287.1 347.2c-7.9-7.9-20.6-7.9-28.5 0l-85.7 85.7V80.1c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4v352.8l-85.7-85.7c-7.9-7.9-20.6-7.9-28.5 0-7.9 7.9-7.9 20.6 0 28.5l120.4 120.4c7.9 7.9 20.6 7.9 28.5 0l120.4-120.4c7.8-7.9 7.8-20.7-.1-28.5z"/></svg>
          </button></div>
        <div class="product-cell status-cell"></div>
      </div>
      <?PHP
             include('../db_connection.php');
             if (isset($_POST['search']))
             {            
              $search = $_POST['search'];
              $sav = "SELECT * FROM users WHERE Name like '%{$search}%' OR username like '%{$search}%' AND user_type = 'teacher'";
              
             }
             else
             {
              $sav = "SELECT * FROM users WHERE user_type = 'teacher'";
             }
                $result = mysqli_query($db_con, $sav);
                while ($row = mysqli_fetch_array($result)) {            
            ?>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">  
      <div class="products-row">
        
        <div class="product-cell category"><span class="cell-label">Full Name:</span><?php echo $row['Name']; ?></div>
        <div class="product-cell Stock"><span class="cell-label"  >Username:</span><?php echo $row['username']; ?></div>
              <input type="hidden" name="username" value="<?php echo $row['username']; ?>"/>
        <input type="hidden" name="name" value=" <?php echo $row['Name']; ?>"/>
        <input type="hidden" name="id" value=" <?php echo $row['id']; ?>"/>
        <?php if($row['user_type'] == 'admin'){ ?> 
         <div class="product-cell Stock"> <span class="cell-label"  >Action:</span><input type="submit" name="delete-teacher" value="Delete" class="Delete-btn" hidden>
        <span class="cell-label" >Action:</span><input type="submit" class="update-btn" name="update-teacher"  VALUE="Update"  hidden ></div>
<?php } else{?>
         <div class="product-cell Stock"> <span class="cell-label"  >Action:</span><input type="submit" name="delete-teacher" value="Delete" class="Delete-btn">
        <span class="cell-label" >Action:</span><input type="submit" class="update-btn" name="update-teacher"  VALUE="Update"></div>
<?php } ?>
      </div>
                </form>
      <?PHP } ?>


    <button id ="attendance-marking"name="attendance_mark" hidden>Submit Attendance</button></form>  

    <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Add Teacher</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
    <div class="form">
	<center><form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
		Full Name:	 <input type="text" class="input-bar" name="teacher_name" style="height:30px; border:solid 1px grey; margin-left: 2px;"/></br><br>
    UserName: <input type="text" class="input-bar" name="teacher_username" style="height:30px; border:solid 1px grey; margin-left: 2px;"/></br><br>
    Password: <input type="password" class="input-bar" name="teacher_password" style="height:30px; border:solid 1px grey; margin-left: 2px;"/></br><br>
	<input type="submit" name="upload-teacher" value="Upload" class="form-button" style="height: 30px; width: 70px; border:none; border-radius: 4px; background-color: green; color: white; margin-bottom: 10px;">
	</form></center>
</div>
 </div>
  </div>
  <div id="overlay"></div>  



</div>
              
   </div>



<!-- partial -->
  <script  src="./script.js"></script>

  <script  src="./popup.js"></script>  
</body>
</html>


