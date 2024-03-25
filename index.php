<?php
require('./utility.php');
ConnectDB();
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
<body>
<?php require('./nav.php') ?>


<div class="container-fluid mt-3">

<div class="row">
  <div class="col-4 text-center">
  <h5>แยกขยะ</h5>
    <a href="separate.php">
<img src="img/pic3.png" width="100px" height="100px">
</a>
  </div>
  <div class="col-4 text-center">
<h5>รวบรวม</h5>
<a href="compile.php">
<img src="img/pic2.png" width="100px" height="100px">
</a>
  </div>
  <div class="col-4 text-center">
<h5>ส่งต่อ</h5>
<a href="forward.php">
<img src="img/pic1.png" width="100px" height="100px">
</a>
<br><br>  
<h5>แนะนำผู้รับ</h5>
<a href="nanum.php">
<img src="img/pic4.png" width="100px" height="100px">
</a>
  </div>
</div>

</div>

</body>



</html>
