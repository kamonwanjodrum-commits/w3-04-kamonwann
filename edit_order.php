<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูล</title>

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
            padding:0;
        }

        /* เมนูด้านบน */
        .top-menu{
            background:#4b6cb7;
            display:flex;
            align-items:center;
            height:55px;
            padding:0 30px;
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

        /* เนื้อหา */
        .content{
            padding:35px;
            padding-bottom:75px;
        }

        .form-box{
            width:600px;
            max-width:100%;
            margin:0 auto;
            background:#fff;
            padding:30px;
            border:1px solid #e2e5ea;
            box-shadow:0 2px 8px rgba(0,0,0,0.05);
        }

        h2{
            margin-bottom:25px;
            color:#333;
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

        input:focus,
        select:focus{
            outline:none;
            border-color:#4b6cb7;
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

        /* ด้านล่าง */
        .footer{
            position:fixed;
            bottom:0;
            left:0;
            width:100%;
            background:#4b6cb7;
            color:#fff;
            text-align:center;
            padding:12px;
            font-size:14px;
        }
    </style>
</head>

<body>

<!-- เมนูด้านบน -->
<nav class="top-menu">
    <a href="index.php">หน้าแรก</a>
    <a href="room.php">Room</a>
    <a href="manage_order.php">Mana</a>
    <a href="order.php" class="active">Order</a>
</nav>

<div class="content">

<div class="form-box">

<h2>แก้ไขข้อมูลการจอง</h2>

<?php  
    $id = $_GET["id"];

include "action/connect.php";
$sql = "SELECT * FROM orders WHERE order_id = '$id' ";
        
$result = mysqli_query($con, $sql);

$order = mysqli_fetch_assoc($result);
?>

<form action="action/insert_order.php" method="post">

    <label for="">ชื่อผู้เข้าพัก</label>
    <input type="text" name="name" value="<?=$order["name"] ?>"> <br>

    <label for="">การจ่ายเงิน</label>
    <input type="text" name="payment" value="<?=$order["payment"] ?>"> <br>

    <label for="">ประเภทการใช้งาน</label>
    <input type="text" name="usage_type" value="<?=$order["usage_type"] ?>"> <br>

    <label for="">ภาพผู้เข้าพัก</label>
    <input type="text" name="image" value="<?=$order["image"] ?>"> <br>

    <?php
        include "action/connect.php";

        $sql = "SELECT * FROM rooms";

        $result = mysqli_query($con, $sql);
    ?>

    <label for="">เลือกห้องพัก</label>

    <select name="room_id" id="">
        <?php
        
            foreach($result as $room){
        ?>
            <option value="<?=$room["room_id"] ?>">
                <?=$room["room_id"] . " " . $room["price"] . " บาท " ?>
            </option>
        <?php
            }
        ?>
    </select>
        
    <br>

    <button>บันทึก</button>

</form>

</div>

</div>

<footer class="footer">
     kamonwan jodrum
</footer>

</body>
</html>