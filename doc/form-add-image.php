<?php
include '../config.php';
$sql_sP = "SELECT * FROM tblSanPham";
$query_sP = mysqli_query($conn, $sql_sP);

if (isset($_POST['add'])) {
    $idSP = $_POST['sanPham'];
    $url = $_POST['url'];
    $sql = "INSERT INTO tblimage (idSanPham,imgUrl) VALUES ( $idSP,'$url')";
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
                        <input class="form-control" type="text" name="url" required>

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