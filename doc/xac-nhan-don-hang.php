<?php
include '../config.php';

$id = $_GET['id'];

$sql_up = "SELECT * FROM tblhoadon WHERE id=$id";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['add'])) {
    $status = $_POST['status'];

    $sql = "UPDATE tblhoadon SET  trangThaiHD = $status WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
}

?>
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh Sách Đơn Hàng Đơn Hàng</li>
        <li class="breadcrumb-item"><a href="#">Thay Đổi Trạng Thái Đơn Hàng</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Thay Đổi Trạng Thái Đơn Hàng</h3>
            <div class="tile-body">
                <form class="row" method="POST">
                    <div class="form-group col-md-3 ">
                        <select name="status" id="">
                            <option value="0">Chưa Xác Nhận</option>
                            <option value="1">Đã Xác Nhận</option>
                            <option value="2">Đã Giao Hàng</option>


                        </select>
                    </div>
                    <button class="btn btn-primary btn-sm edit" type="submit" name="add" onclick="return Suc('<?php echo $row['id']?>')">Xác Nhận Đơn Hàng</button>
                    <a class="btn btn-sm print-file mx-1" href="index.php?page_layout=quanlyHDCXN" type="submit" >Quay Lại</a>
                
                </form>

            </div>

        </div>
    </div>
</div>

<script>
    function Suc(name) {
        return confirm("Bạn có muốn Xác Nhận Đơn hàng: " + name + "???");
    }
</script>