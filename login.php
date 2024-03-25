<?php 
    require('./utility.php');
    ConnectDB();
    $err='';
    if(isset($_POST['btn1'])){
        $sql = 'SELECT * FROM users WHERE us_id="'.$_POST['us_id'].'" AND us_pw = "'.md5($_POST['us_pw']).'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        $data = mysqli_fetch_assoc($rs);
        if(mysqli_num_rows($rs)==1){
            $_SESSION['user'] = $data;
            header('Location:index.php');
        }else{$err='<div style="margin: 0.4cm" class="alert alert-danger text-center">เกิดข้อผิดพลาด</div>'; }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>a</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="style.css">
<style>


.container {
    
    width: 600px;
    background: transparent;
    border: 2px solid rgba(40, 25, 25, 0.2);
    backdrop-filter: blur(80px);
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    color:#000;
    border-radius: 10px;
    padding: 30px 40px;
}


.container .btn{
    width: 300px;
    height: 50px;
    background-color: #d9d9d9;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    cursor: pointer;
    font-size: 18px;
    color: #000;
    font-weight: 600;
    text-align: center;
}

.container h1 {
    text-align: center;
}

.container form {
    text-align: center;
    
}

.container input {
    margin-bottom: 20px;
    
}

.container a {
    display: block;
    text-align: center;
    margin-top: 10px;
}
.input-box input {
    width: 460px;
    height: 60px;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(30, 2, 2, .2);
    border-radius: 40px;
    font-size: 18px;
    color: #000;
    padding: 20px 45px 20px 20px;

}

.input-box input::placeholder {
    color: #000;
}

</style>

<body>
<?php require('./nav.php')?>
<div class="container mt-5">
    <div class="row">
        <div class="col"></div>
        <div class="col-12">
            <form method="post">
                <h1>เข้าสู่ระบบ</h1>
                <div class="input-box">
                    <input name="us_id" type="text" placeholder="ไอดีผู้ใช้" class="" required>
                    
                </div>
                <div class="input-box">
                    <input name="us_pw" type="password" placeholder="รหัสผ่าน" class="" required>
                   
                </div>
               
                <p><button name="btn1" class="btn mt-3" valign="middle" type="submit">Log in</button></p>
                ยังไม่มีบัญชีผู้ใช้งาน? <center><a class="text-success w-25" href="regist.php">ลงทะเบียน</a></center>
                <?php echo $err; ?>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
