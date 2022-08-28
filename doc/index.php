<?php
include '../config.php';
if (isset($_POST["logout"])) {
  header("location: login.php");
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách nhân viên | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/Chart.min.js"></script>
</head>

<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">

      <!-- User Menu-->
      <li><a class="app-nav__item" href="../login.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../images/gai.jpg" width="50px" alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Admin</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item " href="index.php?page_layout=quanlyNV"><i class='app-menu__icon bx bx-id-card'></i> <span class="app-menu__label">Quản lý nhân
            viên</span></a></li>
      <li><a class="app-menu__item" href="index.php?page_layout=quanlyKH"><i class='app-menu__icon bx bx-user-voice'></i><span class="app-menu__label">Quản lý khách
            hàng</span></a></li>
      <li><a class="app-menu__item" href="index.php?page_layout=quanlySP"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản
            phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="index.php?page_layout=quanlyImage"><i class='app-menu__icon bx bx-image'></i><span class="app-menu__label">Quản lý Image</span></a>
      </li>
      <li><a class="app-menu__item" href="index.php?page_layout=quanlyHD"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a>
      </li>
      <li><a class="app-menu__item" href="index.php?page_layout=quanlyTheLoai"><i class='app-menu__icon bx bx-list-check'></i><span class="app-menu__label">Quản lý Thể Loại</span></a>
      </li>
      <li><a class="app-menu__item" href="index.php?page_layout=quanlyCompany"><i class="app-menu__icon bx bx-building"></i><span class="app-menu__label">Quản lý Company</span></a>
      </li>
      
      </span></a></li>
      <li><a class="app-menu__item" href="index.php?page_layout=quanlyLuong"><i class='app-menu__icon bx bxs-badge-dollar'></i><span class="app-menu__label">Quản lý Voucher</span></a>
      </li>
      <li><a class="app-menu__item" href="index.php?page_layout=BaoCaoDoanhThu"><i class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
      </li>
    </ul>
  </aside>
  <main class="app-content">
    <?php
    //master pages
    if (isset($_GET["page_layout"])) {
      switch ($_GET["page_layout"]) {

        case 'xacNhanDH':
          include_once './xac-nhan-don-hang.php';
          break;
        case 'quanlyHDDG':
          include_once './table-data-oder-da-giao.php';
          break;
        case 'quanlyHDCXN':
          include_once './table-data-oder-chua-XN.php';
          break;
        case 'quanlyHDDXN':
          include_once './table-data-oder-da-XN.php';
          break;
        case 'viewCTHD':
          include_once './viewCTHD.php';
          break;
        case 'deleteHoaDon':
          include_once './deleteHoaDon.php';
          break;
        case 'updateImage':
          include_once './updateImage.php';
          break;
        case 'deleteImage':
          include_once './deleteImage.php';
          break;
        case 'quanlyImage':
          include_once './table-data-image.php';
          break;
        case 'themMoiImage':
          include_once './form-add-image.php';
          break;
        case 'quanlyCompany':
          include_once './table-data-company.php';
          break;
        case 'quanlyTheLoai':
          include_once './table-data-the-loai.php';
          break;
        case 'themMoiCompany':
          include_once './form-add-company.php';
          break;
        case 'themMoiTheLoai':
          include_once './form-add-the-loai.php';
          break;
        case 'updateVouchers':
          include_once './updateVouchers.php';
          break;
        case 'deleteVouchers':
          include_once './deleteVouchers.php';
          break;
        case 'updateCompany':
          include_once './updateCompany.php';
          break;
        case 'deleteCompany':
          include_once './deleteCompany.php';
          break;
        case 'updateTL':
          include_once './updateTL.php';
          break;
        case 'deleteTL':
          include_once './deleteTL.php';
          break;
        case 'updateNV':
          include_once './updateNV.php';
          break;
        case 'deleteNV':
          include_once './deleteNV.php';
          break;
        case 'updateSP':
          include_once './updateSP.php';
          break;
        case 'deleteSP':
          include_once './deleteSP.php';
          break;
        case 'quanlyNV':
          include_once './table-data-table.php';
          break;
        case 'quanlyKH':
          include_once './table-data-custumer.php';
          break;
        case 'quanlySP':
          include_once './table-data-product.php';
          break;
        case 'quanlyHD':
          include_once './table-data-oder.php';
          break;
        case 'quanlyLuong':
          include_once './table-data-money.php';
          break;
        case 'BaoCaoDoanhThu':
          include_once './quan-ly-bao-cao.php';
          break;
        case 'ThemNV':
          include_once './form-add-nhan-vien.php';
          break;
        case 'ThemSP':
          include_once './form-add-san-pham.php';
          break;
        case 'ThemDonHang':
          include_once './form-add-don-hang.php';
          break;
        case 'ThemTienLuong':
          include_once './form-add-tien-luong.php';
          break;

        default:
          include_once './table-data-table.php';
      }
    } else {
      include_once './table-data-table.php';
    }
    ?>
  </main>
  <script src="js/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/popper.min.js"></script>
  <!-- <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script>
  <!--===============================================================================================-->
  <script src="js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
  <!--===============================================================================================-->
  <script src="js/plugins/pace.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="js/plugins/chart.js"></script>
  <!--===============================================================================================-->

  <script type="text/javascript">
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
  </script>
</body>

</html>