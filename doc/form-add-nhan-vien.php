<?php
include '../config.php';
if (isset($_POST['them'])) {
    $tenNV = $_POST['tenNV'];
    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    $soDT = $_POST['soDT'];
    $chucVu = $_POST['chucVu'];
    $sql = "INSERT INTO tblnhanvien (tenNV,taiKhoan,matKhau,SDT,chucVu)
    VALUES ( '$tenNV', '$userName', '$passWord','$soDT','$chucVu')";
    $query = mysqli_query($conn, $sql);
    header('location:index.php?page_layout=quanlyNV');
}
?>

<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách nhân viên</li>
        <li class="breadcrumb-item"><a href="#">Thêm nhân viên</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">

            <h3 class="tile-title">Tạo mới nhân viên</h3>
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><b>
                                <i class="fas fa-folder-plus"></i>Tạo chức vụ mới</b></a>
                    </div>
                </div>
                <form class="row" method="POST">
                    <div class="form-group col-md-4">
                        <label class="control-label">Họ và tên</label>
                        <input class="form-control" type="text" name="tenNV" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Số điện thoại</label>
                        <input class="form-control" type="text" name="soDT" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Tài khoản</label>
                        <input class="form-control" type="text" name="userName" required>
                    </div>
                    <div class="form-group  col-md-4">
                        <label class="control-label">Mật khẩu</label>
                        <input class="form-control" type="text" name="passWord" required>
                    </div>
                    <div class="form-group  col-md-4">
                        <label class="control-label">Chức Vụ</label>
                        <input class="form-control" type="text" name="chucVu" required>
                    </div>
                    <div class="form-group  col-md-12">
                        <button class="btn btn-save" type="submit" name="them">Lưu lại</button>
                        <a class="btn btn-cancel" href="index.php?page_layout=quanlyNV">Hủy bỏ</a>
                    </div>
                    </from>
            </div>
        </div>
    </div>
</div>