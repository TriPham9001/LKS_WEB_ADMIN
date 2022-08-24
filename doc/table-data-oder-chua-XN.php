<div class="app-title">
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item active"><a href="#"><b>Danh Sách Hoá Đơn Chưa Xác Nhận</b></a></li>
  </ul>
  <div id="clock"></div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="row element-button">
          <div class="col-sm-2">
            <a class="btn btn-delete btn-sm print-file " type="button" href="index.php?page_layout=quanlyHD"><i class="fas fa-fa-arrow-right-form-bracket"></i> Quay Lại </a>
          </div>
        </div>
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>Địa Chỉ</th>
              <th>Chi Tiết</th>
              <th>Trạng Thái</th>
              <th>Ngày Mua</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../config.php';
            $sql = "SELECT * FROM tblhoadon WHERE trangThaiHD=0";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) { ?>
              <tr>
                <td><?php echo $row['diaChi'] ?></td>
                <td>
                  <a class="btn btn-primary btn-sm edit" href="index.php?page_layout=viewCTHD&id=<?php echo $row['id'] ?>">
                    <i class="fas fa-plus">
                    </i>
                  </a>

                </td>

                <td>
                  <?php if ($row['trangThaiHD'] == 0) {
                    echo '<span class="badge pdf-file">Chưa Xác Nhận</span>';
                  }
                  ?>
                </td>
                <td><?php echo $row['ngayMua'] ?></td>
                <td>
                  <a class="btn btn-primary btn-sm trash" onclick="return Del('<?php echo $row['id'] ?>')" href="index.php?page_layout=deleteHoaDon&id=<?php echo $row['id'] ?>">
                    <i class=" fas fa-trash-alt">
                      Xoá
                    </i>
                  </a>
                  <?php
                  ?>
                  <a class="btn btn-sm print-file" onclick="return Suc('<?php echo $row['id'] ?>')" href="index.php?page_layout=xacNhanDH&id=<?php echo $row['id'] ?>">
                    <i class=" fas fa-trash-alt">
                      Thay Đổi Trạng Thái Đơn Hàng
                    </i>
                  </a>
                </td>
              </tr>

            <?php }



            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  function Del(name) {
    return confirm("Bạn có muốn Xoá Voucher: " + name + "???");
  }

  function Suc(name) {
    return confirm("Bạn có muốn Xác Nhận Đơn hàng: " + name + "???");
  }
</script>