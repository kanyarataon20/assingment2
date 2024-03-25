<?php
    require('./utility.php');
    ConnectDB();
    $err = '';
    if(isset($_POST['btn1'])){
        $sql = 'SELECT * FROM users WHERE us_id="'.$_POST['us_id'].'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)!=0){$err = '<div class="alert alert-danger">ชื่อผู้ใช้นี้มีอยู่แล้ว</div>';}

        $sql = 'SELECT * FROM users WHERE us_name="'.$_POST['us_name'].'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)!=0 && $err == ''){$err = '<div class="alert alert-danger">ขื่อนี้มีอยู่แล้ว</div>';}

        $sql = 'SELECT * FROM users WHERE us_tel="'.$_POST['us_tel'].'"';
        $rs = mysqli_query($GLOBALS['conn'],$sql);
        if(mysqli_num_rows($rs)!=0 && $err == ''){$err = '<div class="alert alert-danger">เบอร์โทรนี้มีอยู่แล้ว</div>';}

        if($_POST['us_id']=="admin"){$err = '<div class="alert alert-danger">ไม่สามารถใช้ชื่อนี้ได้</div>';}

        if($err == ''){
            $sql = 'INSERT INTO users (us_id,us_name,us_pw,us_tel)
            VALUES ("'.$_POST['us_id'].'",
                    "'.$_POST['us_name'].'",
                    "'.md5($_POST['us_pw']).'",
                    "'.$_POST['us_tel'].'")';
            mysqli_query($GLOBALS['conn'],$sql);
            header("Location:./login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPTG Sport</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<style>
    
.container {
    width: 800px;
    background: transparent;
    border: 2px solid rgba(40, 25, 25, 0.2);
    backdrop-filter: blur(80px);
    
    color:#000;
    border-radius: 10px;
    padding: 20px 30px;
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


</style>
<body>
<?php require('./nav.php')?>

        
        <div class="container mt-4">
            <div class="row">
               
                <div class="col-12 ">
                    <center><h1>ป้อนข้อมูลเพื่อสมัครสมาชิก</h1></center>
                    <form method="post">
                    <table width="100%">
                        <tr>
                            <th><input type="text" name="us_id" placeholder="ไอดีผู้ใช้" class="form-control w-100 my-2" maxlength="10" required></th>
                            <th><input type="password" name="us_pw" placeholder="รหัสผ่าน" class="form-control w-100 my-2" maxlength="50" required></th>
                        </tr>
                    </table>
                    <input type="text" name = "us_name" placeholder="ชื่อ-นามสกุล" class="form-control w-100 my-2" maxlength="100" required>
                    <input type="tel" name="us_tel" placeholder="เบอร์โทรศัพท์" class="form-control w-100 my-2" maxlength="10" required>
                    <div class="col-12 text-center">
                        <button name="btn1" class="btn " type="submit">ลงทะเบียน</button>
                    </div>
                    </form>
                    <br>
                    <div>คุณมีบัญชีผู้ใช้งานอยู่แล้ว? <a class="text-success " href="login.php">เข้าสู่ระบบ</a>
                    
                    </div>

                    <?php echo $err; ?>
                </div>
                
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
