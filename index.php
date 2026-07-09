<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการการจอง</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#ffffff;
            padding:40px;
        }

        h2{
            text-align:center;
            color:#333;
            margin-bottom:25px;
            font-size:28px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:#fff;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
        }

        thead{
            background:#4b6cb7;
            color:#fff;
        }

        th{
            padding:15px;
            font-size:16px;
        }

        td{
            padding:12px;
            text-align:center;
            border:1px solid #ddd;
        }

        tr:nth-child(even){
            background:#f8f8f8;
        }

        tr:hover{
            background:#edf4ff;
            transition:.2s;
        }

        img{
            width:200px;
            height:130px;
            object-fit:cover;
            border-radius:8px;
        }

        .btn-link{
            display:inline-block;
            margin-top:25px;
            padding:12px 24px;
            background:#4b6cb7;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
        }

        .btn-link:hover{
            background:#3558a6;
        }
    </style>
</head>
<body>

<h2>รายการการจองห้องพัก</h2>

<?php
    include "action/connect.php";

    $sql ="SELECT * FROM orders";
    $result = mysqli_query($con,$sql);
   // var_dump($result);
?>

<table border="1">
    <thead>
        <th>รหัสรายการ</th>
        <th>ชื่อผู้เข้าพัก</th>
        <th>ชำระเงิน</th>
        <th>ประเภท</th>
        <th>ห้อง</th>
        <th>ภาพ</th>
    </thead>

    <?php
        foreach($result as $order){
    ?>
        <tr>
            <td><?= $order["order_id"] ?></td>
            <td><?= $order["name"] ?></td>
            <td><?= $order["payment"] ?></td>
            <td><?= $order["usage_type"] ?></td>
            <td><?= $order["room_id"] ?></td>
            <td>
                <img src="<?=$order["image"]?>" style="width:200px">
            </td>
        </tr>
    <?php
        }
    ?>

</table>

<a href="room.php" class="btn-link">ไปหน้า room</a>

</body>
</html>