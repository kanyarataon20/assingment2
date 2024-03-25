<?php
require('./utility.php');
ConnectDB();
$te = '';

// ตรวจสอบว่ามีการส่งข้อมูลฟอร์มมาหรือไม่
if (isset($_POST['btn1'])) {
    // ดึงข้อมูลที่ส่งมาจากฟอร์ม
    $rcpName = $_POST['rcpName'];
    $mat = $_POST['mat'];
    $tel = $_POST['tel'];
    $addressR = $_POST['addressR'];


    // ตรวจสอบว่ามีไฟล์ภาพถูกส่งมาหรือไม่
    if (isset($_FILES['Pic'])) {
        $Pic = $_FILES['Pic']['tmp_name']; // เก็บชื่อของไฟล์ภาพที่อัพโหลดชั่วคราว
        $PicContent = file_get_contents($Pic); // อ่านเนื้อหาของไฟล์ภาพ
        $PicContent = base64_encode($PicContent); // แปลงข้อมูลภาพเป็นรหัส base64 เพื่อให้สามารถเก็บในฐานข้อมูลได้

        // บันทึกข้อมูลลงในฐานข้อมูล
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO recipient (Pic, rcpName, mat, tel, addressR) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $PicContent, $rcpName, $mat, $tel, $addressR);
        $stmt->execute();

        if ($stmt->errno) {
            $te = "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $stmt->error;
        } else {
            // เปลี่ยนเส้นทางหน้าไปยังหน้าหลักและแสดงข้อความ
            header("Location: index.php?message=บันทึกข้อมูลเรียบร้อย");
            exit(); // หยุดการทำงานของสคริปต์หลังจากการเปลี่ยนเส้นทาง
        }

        $stmt->close();
    } else {
        $te = "กรุณาเลือกภาพ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>เพิ่มฮีโร่</title>
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
            <div class="col-4"></div>
            <div class="col-4 text-center">
                <p>เพิ่มฮีโร่</p>
                <!-- เพิ่ม attribute enctype="multipart/form-data" เพื่อรองรับการอัพโหลดไฟล์ภาพ -->
                <form id="uploadForm" method="post" enctype="multipart/form-data">
                
                    <select class="form-select form-select-sm mt-3" name="mat" required>
                        <option>เศษผัก เปลือกผลไม้</option>
                        <option>เศษอาหาร น้ำ</option>
                        <option>กระดูก เปลือกไข่</option>
                    </select>
                    <br>
                    <h5>เพิ่มรูปร้านรับซื้อ</h5>
                    <input type="file" name="Pic" id="PicInput" class="form-control" placeholder="อัพโหลดภาพ" onchange="previewImage(event)" required>
                    <img id="previewImage" src="#" alt="ภาพที่เลือก" style="max-width: 100%; max-height: 200px; margin-top: 10px; display: none;">
                    
                    <input type="text" name="rcpName" class="form-control" placeholder="ชื่อร้าน" required>
                    <input type="text" name="tel" class="form-control" placeholder="เบอร์" required>
                    <input type="text" name="addressR" class="form-control" placeholder="ที่อยู่ ตำบล อำเภอ จังหวัด รหัสไปรษณี" required>
                    <br>
                    <button name="btn1" class="btn btn-success mt-3" type="submit">บันทึกข้อมูล</button>
                </form>
                <?php echo $te; ?> <!-- แสดงผลลัพธ์จากการบันทึก -->
            </div>
        </div>

    </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var preview = document.getElementById('previewImage');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>

</html>
