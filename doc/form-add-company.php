<?php
include '../config.php';
if (isset($_POST['them'])) {
    $tenCompany = $_POST['tenCompany'];
    $sql = "INSERT INTO tblcompany (tenCompany)
    VALUES ( '$tenCompany')";
    $query = mysqli_query($conn, $sql);
    header('location:index.php?page_layout=quanlyCompany');
}
?>

<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Company</li>
        <li class="breadcrumb-item"><a href="#">Thêm Company</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">

            <h3 class="tile-title">Tạo mới Company</h3>
            <div class="tile-body">
               
                <form class="row" method="POST">
                    <div class="form-group col-md-4">
                        <label class="control-label">Tên Company</label>
                        <input class="form-control" type="text" name="tenCompany" required>
                    </div>
                    <div class="form-group  col-md-12">
                        <button class="btn btn-save" type="submit" name="them">Lưu lại</button>
                        <a class="btn btn-cancel" href="index.php?page_layout=quanlyCompany">Hủy bỏ</a>
                    </div>
                    </from>
            </div>
        </div>
    </div>
</div>