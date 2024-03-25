<?php
require('./utility.php');
ConnectDB();

// ตรวจสอบว่ามีการส่ง ID ของร้านมาหรือไม่
if(isset($_GET['id'])) {
    $storeId = $_GET['id'];
    
    // ดึงข้อมูลของร้านจากฐานข้อมูลโดยใช้ ID
    $sql = 'SELECT * FROM recipient WHERE id = ' . $storeId;
    $rs = mysqli_query($GLOBALS['conn'], $sql);
    $row = mysqli_fetch_assoc($rs);

    // ตรวจสอบว่าพบข้อมูลร้านหรือไม่
    if ($row) {
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
            <h3><?php echo $row['rcpName']; ?></h3>   
            <img src="./img/<?php echo $row['Pic']; ?>" style="height: 200px; width: 250px; " alt="1">
            <br><br>
            <i class="bi bi-telephone-fill"></i> : <?php echo $row['tel']; ?><br><br>
            ที่อยู่ : <?php echo $row['addressR']; ?><br>
            ประเภทที่รับ : <?php echo $row['mat']; ?>
        </center>  
    </div>
</div>

</body>
</html>
<?php
    } else {
        // ถ้าไม่พบข้อมูลร้าน
        echo "ไม่พบข้อมูลร้าน";
    }
} else {
    // ถ้าไม่มีการส่ง ID ของร้านมา
    echo "กรุณาเลือกร้านที่ต้องการดู";
}
?>
