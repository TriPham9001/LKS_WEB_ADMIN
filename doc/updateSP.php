<?php
include '../config.php';


$sql_theLoai = "SELECT * FROM tbltheloai";
$query_theLoai = mysqli_query($conn, $sql_theLoai);

$sql_company = "SELECT * FROM tblcompany";
$query_company = mysqli_query($conn, $sql_company);

$id = $_GET['id'];
$sql_up = "SELECT * FROM tblsanpham WHERE id=$id";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $theLoai = $_POST['idTheLoai'];
    $company = $_POST['idCompany'];
    $tenSP = $_POST['tenSP'];
    $donGia = $_POST['donGia'];
    $moTa = $_POST['mota'];
    $trangThai = $_POST['trangThai'];

    $sql = "UPDATE tblsanpham SET idTheLoai=$theLoai, idCompany=$company, tenSP='$tenSP', donGia='$donGia', moTa='$moTa', trangThaiSP=$trangThai Where id=$id";

    $query = mysqli_query($conn, $sql);
    header('location:index.php?page_layout=quanlySP');
}

?>
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách sản phẩm</li>
        <li class="breadcrumb-item"><a href="#">Thêm sản phẩm</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Tạo mới sản phẩm</h3>
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i class="fas fa-folder-plus"></i> Thêm danh mục</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i class="fas fa-folder-plus"></i> Thêm tình trạng</a>
                    </div>
                </div>

                <form class="row" method="POST">
                    <div class="form-group col-md-3 ">
                        <label for="exampleSelect1" class="control-label">ID Sản Phẩm</label>
                        <input class="form-control" type="text" name="id" require value="<?php echo $row_up['id'] ?>" readonly>


                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Thể Loại</label>
                        <select class="form-control" name="idTheLoai">
                            <?php
                            while ($row_idTheLoai = mysqli_fetch_assoc($query_theLoai)) { ?>
                                <option value="<?php echo $row_idTheLoai['id'] ?>">
                                    <?php echo $row_idTheLoai['id'] ?> / <?php echo $row_idTheLoai['tenTheLoai'] ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group  col-md-3">
                        <label class="control-label">Công ty</label>
                        <select class="form-control" name="idCompany">
                            <?php
                            while ($row_idCompany = mysqli_fetch_assoc($query_company)) { ?>
                                <option value="<?php echo $row_idCompany['id'] ?>">
                                    <?php echo $row_idCompany['id'] ?> / <?php echo $row_idCompany['tenCompany'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleSelect1" class="control-label">Tên Sản Phẩm</label>
                        <input class="form-control" type="text" name="tenSP" require value="<?php echo $row_up['tenSP'] ?>">


                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleSelect1" class="control-label">Đơn Giá</label>
                        <input class="form-control" type="number" name="donGia" require value="<?php echo $row_up['donGia'] ?>">


                    </div>

                    <div class="form-group col-md-12">
                        <label class="control-label">Mô tả sản phẩm</label>
                        <textarea class="form-control" name="mota" require ><?php echo $row_up['moTa'] ?></textarea>
                    </div>

                    <div class="form-group col-md-3 ">
                        <label for="exampleSelect1" class="control-label">Trạng Thái</label>
                        <select name="trangThai" id="">
                            <option value="0"><span class="badge pdf-file">Đã Hết Sản Phẩm</span></option>
                            <option value="1"><span class="badge bg-success">Còn Sản Phẩm</span></option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 ">
                        <button class="btn btn-save" type="submit" name="add">Lưu lại</button>
                        <a class="btn btn-cancel" href="index.php?page_layout=quanlySP">Hủy bỏ</a>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>