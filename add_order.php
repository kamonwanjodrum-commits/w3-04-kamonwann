<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f7f8fa;
    color:#333;
}

.top-menu{
    background:#4b6cb7;
    display:flex;
    align-items:center;
    height:55px;
}

.top-menu a{
    color:#fff;
    text-decoration:none;
    padding:18px 22px;
    font-size:15px;
}

.top-menu a:hover{
    background:#3f5fa5;
}

.top-menu a.active{
    background:#fff;
    color:#4b6cb7;
}

.content{
    padding:35px;
    padding-bottom:70px;
}

.form-box{
    width:600px;
    max-width:100%;
    margin:0 auto;
    background:#fff;
    padding:30px;
    border:1px solid #e2e5ea;
}

h2{
    margin-bottom:25px;
    font-size:25px;
    font-weight:normal;
}

label{
    display:block;
    margin-bottom:7px;
    font-size:14px;
    color:#555;
}

input,
select{
    width:100%;
    padding:10px;
    margin-bottom:18px;
    border:1px solid #d5d9df;
    border-radius:4px;
    background:#fff;
    font-size:14px;
}

button{
    width:100%;
    padding:11px;
    background:#4b6cb7;
    color:#fff;
    border:0;
    border-radius:4px;
    font-size:15px;
    cursor:pointer;
}

button:hover{
    background:#3f5fa5;
}

.footer{
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    background:#4b6cb7;
    color:#fff;
    text-align:center;
    padding:12px;
}
</style>
</head>

<body>

<nav class="top-menu">
    <a href="index.php">ข้อมูลผู้เข้าพัก</a>
    <a href="room.php">รายการห้องพัก</a>
    <a href="manage_order.php">จัดการรายการ</a>
    <a href="add_order.php" class="active">เพิ่มรายการจอง</a>
</nav>

<div class="content">

<div class="form-box">

<h2>เพิ่มรายการจอง</h2>

<form action="action/insert_order.php" method="post">

    <label for="">ชื่อผู้เข้าพัก</label>
    <input type="text" name="name">

    <label for="">การจ่ายเงิน</label>
    <input type="text" name="payment">

    <label for="">ประเภทการใช้งาน</label>
    <input type="text" name="usage_type">

    <label for="">ภาพผู้เข้าพัก</label>
    <input type="text" name="image">

    <?php
        include "action/connect.php";

        $sql = "SELECT * FROM rooms";

        $result = mysqli_query($con, $sql);
    ?>

    <label for="">เลือกห้องพัก</label>

    <select name="room_id">

        <?php
        foreach($result as $room){
        ?>

        <option value="<?=$room["room_id"]?>">
            <?=$room["room_id"] . " " . $room["price"] . " บาท "?>
        </option>

        <?php
        }
        ?>

    </select>

    <button>บันทึก</button>

</form>

</div>

</div>

<footer class="footer">
     kamonwan jodrum
</footer>

</body>
</html>