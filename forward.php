<?php
require('./utility.php');
ConnectDB();

$sql = 'SELECT * FROM recipient';
$rs = mysqli_query($GLOBALS['conn'], $sql);
    $_SESSION['recipient'] = mysqli_fetch_assoc($rs);
    if (mysqli_num_rows($rs) == 0) {
        $sql = ' INSERT INTO recipient (rcpName,mat,tel,Pic)
         VALUES ("' . $_POST["rcpName"] . '",
         "' . $_POST["mat"] . '",
         "' . $_POST["tel"] . '",
         "' . $_POST["Pic"] . '")';
        mysqli_query($GLOBALS['conn'], $sql);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>หน้าหลัก</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./ycss.css">
</head>
<style>
          body {
            font-family: Arial, sans-serif;
            
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #333;
        }
        table {
            margin-top: 20px; /* กำหนดระยะห่างด้านบนของตาราง */
            margin-bottom: 20px; /* กำหนดระยะห่างด้านล่างของตาราง */
        }
        td {
            padding: 10px; /* กำหนดระยะห่างของข้อมูลในแต่ละเซลล์ */
        }
    </style>
<body>
<?php require('./nav.php') ?>


<div class="container-fluid mt-3">

<div class="row">
<center>     
    <h3>ฮีโร่ใกล้เคียง</h3> 
<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1F6YeZ2sUxvev94QVW99TNm-I3OLjnJA" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    
    <h3>ข้อมูลฮีโร่</h3>    
<table class="border">
    <tr>
        <td><img src="./img/<?php echo $_SESSION['recipient']['Pic']; ?>" style="height: 60px; width: 80px; border-radius: 50px;" alt="1"></td>
        <td>&nbsp;&nbsp;<?php echo $_SESSION['recipient']['rcpName']; ?></td>
        <td><a href="tog.php?id=<?php echo $_SESSION['recipient']['id']; ?>" class="btn btn-success mx-2" href=""> เลือกร้าน</a></td>
    </tr>
    <?php 
    $i = 0;
    while($_SESSION['recipient'] = mysqli_fetch_assoc($rs)){
        $i++;

     ?>
                <tr class="border">
                    <td><img src="./img/<?php echo $_SESSION['recipient']['Pic']; ?>" style="height: 60px; width: 80px; border-radius: 50px;" alt="1"></td>
                    <td>&nbsp;&nbsp;<?php echo $_SESSION['recipient']['rcpName']; ?></td>
                    <td><a href="tog.php?id=<?php echo $_SESSION['recipient']['id']; ?>" class="btn btn-success mx-2" href=""> เลือกร้าน</a></td>
                </tr>
            <?php } ?>
</table></center>

            
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>