<?php
require('./utility.php');
ConnectDB();

// ตรวจสอบว่ามีการส่งข้อมูลลบมาหรือไม่
if (isset($_POST['delete'])) {
    // วนลูปเพื่อลบข้อมูลที่ถูกเลือก
    foreach ($_POST['delete'] as $deleteItem) {
        $sql = 'DELETE FROM compile WHERE cpName = ?'; // ใช้ชื่อของข้อมูลเป็นเงื่อนไขในการลบ
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bind_param("s", $deleteItem);
        $stmt->execute();

        if ($stmt->errno) {
            echo "<script>alert('เกิดข้อผิดพลาดในการลบข้อมูล');</script> " . $stmt->error;
        } else {
            echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
        }

        $stmt->close();
    }
}

$sql = 'SELECT * FROM compile ';
$rs = mysqli_query($GLOBALS['conn'], $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>เศษอาหาร</title>
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

    <center>
        <h3>ถังของฉัน</h3>
    </center>
    <div class="container mt-3">
        <form method="post">
            <table class="table">

                <?php
                while ($data =  mysqli_fetch_assoc($rs)) {

                ?>

                    <tbody>
                        <tr class="table">
                            <td>
                                <img src="data:image/jpeg;base64,<?php echo $data['cpImg']; ?>" alt="ภาพ" style="width: 100px; height: 100px; border-radius: 50%;">
                            </td>
                            <td><?php echo $data['cpName']; ?></td>
                            <td><?php echo $data['kk'] . "กรัม.";?></td>

                            <td>
                                <input type="checkbox" name="delete[]" value="<?php echo $data['cpName']; ?>">
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            <button type="button" class="btn btn-danger" onclick="deleteSelected()">ลบที่เลือก</button>
            <a href="forward.php"><button type="button" class="btn btn-success" >ส่งต่อ</button></a>

        </form>
    </div>

    <script>
        function deleteSelected() {
            var checkboxes = document.getElementsByName("delete[]");
            var checkedItems = [];
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checkedItems.push(checkboxes[i].value);
                }
            }
            if (checkedItems.length > 0) {
                if (confirm("คุณแน่ใจหรือไม่ว่าต้องการลบรายการที่เลือก?")) {
                    document.querySelector("form").submit();
                }
            } else {
                alert("กรุณาเลือกรายการที่ต้องการลบ");
            }
        }
    </script>

</body>

</html>
