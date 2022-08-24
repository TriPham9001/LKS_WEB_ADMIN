<?php
include '../config.php';
$id = $_GET['id'];
$sql_up = "SELECT * FROM tblcompany WHERE id=$id";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['sbm'])) {
    $id = $_POST['id']; 
    $tenCompany = $_POST['tenCompany'];;
    $sql = "UPDATE  tblcompany SET tenCompany = '$tenCompany' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    header('location:index.php?page_layout=quanlyCompany');
    
}
?>

<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Thể Loại</li>
        <li class="breadcrumb-item"><a href="#">Sửa Thể Loại</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">

            <h3 class="tile-title">Sửa Thể Loại</h3>
            <div class="tile-body">
               
                <form class="row" method="POST">
                    <div class="form-group col-md-4">
                        <label class="control-label">ID Nhân Viên</label>
                        <input class="form-control" type="text" name="id" required value="<?php echo $row_up['id'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Họ và tên</label>
                        <input class="form-control" type="text" name="tenCompany" required value="<?php echo $row_up['tenCompany'] ?>">
                    </div>
                  
                    <div class="form-group  col-md-12">
                        <button class="btn btn-save" type="submit" name="sbm">Lưu lại</button>
                        <a class="btn btn-cancel" href="index.php?page_layout=quanlyTheLoai">Hủy bỏ</a>
                    </div>
                    </from>
            </div>
        </div>
    </div>
</div>