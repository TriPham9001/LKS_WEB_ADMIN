<?php
include '../config.php';

$idHd = $_GET['id'];


$sql_up = "SELECT * FROM tblcthd WHERE idHoaDon=$idHd";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

?>
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Chi Tiết Hoá Đơn</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Chi Tiết Hoá Đơn</h3>
            <div class="tile-body">
                <form class="row" method="POST">
                    <div class="form-group col-md-3 ">
                        <label for="exampleSelect1" class="control-label">ID</label>
                        <input class="form-control" type="text" name="id" require value="<?php echo $row_up['id'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleSelect1" class="control-label">ID Hoá Đơn</label>
                        <input class="form-control" type="text" name="idHoaDon" require value="<?php echo $row_up['idHoaDon'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleSelect1" class="control-label">ID Sản Phẩm</label>
                        <input class="form-control" type="text" name="idSanPham" require value="<?php echo $row_up['idSanPham'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 ">
                        <label for="exampleSelect1" class="control-label">Số Lượng</label>
                        <input class="form-control" type="number" name="soLuong" require value="<?php echo $row_up['soLuong'] ?>" readonly>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>