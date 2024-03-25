<?php 
    $GLOBALS['conn']=null;
    session_start();
    
    function ConnectDB(){
        date_default_timezone_set("Asia/Bangkok");
        $GLOBALS['conn'] = mysqli_connect('localhost','root','passpord','assignment2');
        if(mysqli_errno($GLOBALS['conn'])){
            echo '<h1>เชื่อมต่อฐานข้อมูลไม่ได้</h1>';
            exit();
        }
    }
function checkLogin(){
    if(!isset($_SESSION['user'])){
        header('Location:pjauthen.php');
    }
}

?>