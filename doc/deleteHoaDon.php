<?php
include '../config.php';
$id = $_GET['id'];
$sql = "DELETE FROM tblhoadon WHERE id = $id";
$query = mysqli_query($conn, $sql);
?>
<h1>Đã xoá Hoá Đơn </h1>

<a class="btn btn-primary btn-sm trash" href="index.php?page_layout=quanlyHD">Quay lại</a>