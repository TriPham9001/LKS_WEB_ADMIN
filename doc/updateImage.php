<?php
include '../config.php';
$sql_sP = "SELECT * FROM tblSanPham";
$query_sP = mysqli_query($conn, $sql_sP);

$id = $_GET['id'];
$sql_up = "SELECT * FROM tblimage WHERE id=$id";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $idSP = $_POST['sanPham'];
    $url = $_POST['url'];
    $sql = "UPDATE tblimage SET idSanPham=$idSP,imgUrl= '$url' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);
    header('location:index.php?page_layout=quanlyImage');
}
?>

<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách Image</li>
        <li class="breadcrumb-item"><a href="#">Thêm Image</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">

            <h3 class="tile-title">Tạo mới Image</h3>
            <div class="tile-body">

                <form class="row" method="POST">
                    <div class="form-group col-md-4">
                        <label class="control-label">id Image</label>
                        <input class="form-control" type="text" name="id" required value="<?php echo $row_up['id'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Id Sản Phẩm</label>
                        <select class="form-control" name="sanPham">
                            <?php
                            while ($row_sP = mysqli_fetch_assoc($query_sP)) { ?>
                                <option value="<?php echo $row_sP['id'] ?>">
                                    <?php echo $row_sP['id'] ?> / <?php echo $row_sP['tenSP'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Image URL</label>
                        <input class="form-control" type="text" name="url" required value="<?php echo $row_up['imgUrl'] ?>">
                        <img src="<?php echo $row_up['imgUrl'] ?>" alt="" style="width: 200px;height: 200px; border: 1px solid #000;">

                    </div>
                    <div class="form-group  col-md-12">
                        <button class="btn btn-save" type="submit" name="add">Lưu lại</button>
                        <a class="btn btn-cancel" href="index.php?page_layout=quanlyImage">Hủy bỏ</a>
                    </div>
                    </from>
            </div>
        </div>
    </div>
</div>