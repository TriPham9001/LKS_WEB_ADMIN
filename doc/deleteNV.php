<?php
include '../config.php';
$id = $_GET['id'];
$sql = "DELETE FROM tblnhanvien WHERE id = $id";
$query = mysqli_query($conn, $sql);
?>
<h1>Đã xoá Nhân viên </h1>

<a class="btn btn-primary btn-sm trash" href="index.php?page_layout=quanlyNV">Quay lại</a>