<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mana</title>

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

h2{
    margin-bottom:20px;
    font-size:25px;
    font-weight:normal;
}

.add-button{
    display:inline-block;
    margin-bottom:20px;
    padding:10px 20px;
    background:#4b6cb7;
    color:#fff;
    text-decoration:none;
    border-radius:4px;
}

.add-button:hover{
    background:#3f5fa5;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
}

thead{
    background:#4b6cb7;
    color:#fff;
}

th{
    padding:13px;
    font-weight:normal;
}

td{
    padding:11px;
    text-align:center;
    border:1px solid #e2e5ea;
}

tr:nth-child(even){
    background:#fafbfc;
}

img{
    width:200px;
    height:130px;
    object-fit:cover;
    border-radius:4px;
}

td a{
    color:#4b6cb7;
    text-decoration:none;
    margin:0 5px;
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
    <a href="manage_order.php" class="active">จัดการรายการ</a>
    <a href="add_order.php">เพิ่มรายการจอง</a>
</nav>

<div class="content">

<h2>จัดการรายการ</h2>

<?php
include "action/connect.php";
$sql = "SELECT * FROM orders";
$result = mysqli_query($con, $sql);
?>

<a href="add_order.php" class="add-button">เพิ่ม</a>

<table border="1">
<thead>
    <th>รหัสรายการ</th>
    <th>ชื่อผู้เข้าพัก</th>
    <th>ชำระเงิน</th>
    <th>ประเภท</th>
    <th>ห้อง</th>
    <th>ภาพ</th>
    <th>จัดการ</th>
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
        <img src="<?= $order["image"] ?>">
    </td>
    <td>
        <a href="edit_order.php?id=<?=$order["order_id"]?>">แก้ไข</a>
        <a href="action/delete_order.php?id=<?=$order["order_id"]?>">ลบ</a>
    </td>
</tr>
<?php
}
?>

</table>

</div>

<footer class="footer">
   kamonwan jodrum
</footer>

</body>
</html>