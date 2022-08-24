<?php
include '../config.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbltheloai WHERE id = $id";
$query = mysqli_query($conn, $sql);
?>
<h1>Đã xoá Thể Loại </h1>

<a class="btn btn-primary btn-sm trash" href="index.php?quanlyTheLoai=">Quay lại</a>