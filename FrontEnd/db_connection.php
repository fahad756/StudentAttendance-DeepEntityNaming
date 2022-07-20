<?PHP
    $host = 'localhost';
    $db_username = 'root';
    $db_userpass = '';
    $db_name = 'student_db';

    $db_con = mysqli_connect($host, $db_username, $db_userpass, $db_name);
    if(!$db_con)
    {
        ECHO ' DataBase Not Connected '.mysqli_error($db_con);
    }

?>