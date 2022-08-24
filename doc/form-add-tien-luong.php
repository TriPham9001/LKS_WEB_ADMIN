<?php
$sql_Sp = "SELECT * FROM tblsanpham";
$query_Sp = mysqli_query($conn, $sql_Sp);

if (isset($_POST['add'])) {
  $idSP = $_POST['idSP'];
  $tenVoucher = $_POST['tenVoucher'];
  $dicounts = $_POST['dicounts'];
  $date = date('Y-m-d', strtotime($_POST['date']));


  $sql = "INSERT INTO tblvoucher (idSanPham,tenVoucher,discount,dates)
   VALUES ( '$idSP','$tenVoucher','$dicounts','$date')";
  $query = mysqli_query($conn, $sql);
  header('location:index.php?page_layout=quanlyLuong');
}


?>
<div class="app-title">
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item">Quản Lý Voucher</li>
    <li class="breadcrumb-item"><a href="#">Thêm mới</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Tạo mới Voucher</h3>
      <div class="tile-body">
        <div class="row element-button">
          <div class="col-sm-2">
            <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><b><i class="fas fa-folder-plus"></i> Tạo trạng thái mới</b></a>
          </div>

        </div>
        <form class="row" method="POST">
          <div class="form-group col-md-3">
            <label for="exampleSelect1" class="control-label">Voucher</label>
            <select class="form-control" name="idSP">
              <?php
              while ($row_idSanPham = mysqli_fetch_assoc($query_Sp)) { ?>
                <option value="<?php echo $row_idSanPham['id'] ?>">
                  <?php echo $row_idSanPham['id'] ?> / <?php echo $row_idSanPham['tenSP'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Tên Voucher</label>
            <input class="form-control" type="text" name="tenVoucher" require>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Discount</label>
            <input class="form-control" type="text" name="dicounts" require>
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Tiền thưởng</label>
            <input class="form-control" type="date" name="date" require>
          </div>


      </div>
      <button class="btn btn-save" type="submit" name="add">Lưu lại</button>
      <a class="btn btn-cancel" href="index.php?page_layout=quanlyLuong">Hủy bỏ</a>
    </div>