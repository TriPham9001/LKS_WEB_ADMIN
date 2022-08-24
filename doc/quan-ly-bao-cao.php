<div class="row">
    <div class="col-md-12">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="#"><b>Báo cáo doanh thu </b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class='icon  bx bxs-user fa-3x'></i>
            <div class="info">
                <h4>Tổng Nhân viên</h4>
                <?php
                include '../config.php';
                $sql = "SELECT COUNT(id) FROM tblnhanvien";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) { ?>
                    <p><b><?php echo $format = number_format($row['COUNT(id)']) ?> Nhân Viên</b></p>
                <?php } ?>
                
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class='icon bx bxs-purchase-tag-alt fa-3x'></i>
            <div class="info">
                <h4>Tổng sản phẩm đã bán</h4>
                <?php
                include '../config.php';
                $sql = "SELECT SUM(soLuong) FROM  tblcthd INNER JOIN tblhoadon ON tblcthd.idHoaDon=tblhoadon.id  WHERE tblhoadon.trangThaiHD=2";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($query);

                ?>
                <p><b><?php echo $format = number_format($row['SUM(soLuong)']) ?> Sản Phẩm</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-shopping-bag-alt'></i>
            <div class="info">
                <h4>Tổng đơn hàng Đã Bán</h4>
                <?php
                include '../config.php';
                $sql = "SELECT COUNT(id) FROM tblhoadon WHERE trangthaiHD=2";
                // $sql = "SELECT COUNT(id),ngayMua FROM tblhoadon WHERE trangthaiHD=2 GROUP BY ngayMua";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($query);
                ?>
                <p><b><?php echo $format = number_format($row['COUNT(id)']) ?> Đơn Hàng</b></p>


            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
            <div class="info">
                <h4>Tổng thu nhập</h4>
                <?php
                include '../config.php';

                $price = '#,###';
                $sql_price = "SELECT SP.donGia,CT.soLuong FROM tblsanpham SP INNER JOIN tblcthd CT ON SP.id=CT.idSanPham INNER JOIN tblhoadon HD ON HD.id=CT.idHoaDon WHERE HD.trangthaiHD=2 ";
                $query_price = mysqli_query($conn, $sql_price);
                $sum = 0;

                while ($row_price = $query_price->fetch_assoc()) { ?>
                    <?php $format = number_format($sum += $row_price['soLuong'] * $row_price['donGia']) ?>
                <?php
                }

                ?>
                <p><b><?php echo $format ?> VNĐ</b></p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
            <div class="info">
                <h4>Tổng khách hàng</h4>

                <?php
                include '../config.php';
                $sql = "SELECT COUNT(id) FROM tblkhachhang";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($query);
                ?>
                <p><b><?php echo $format = number_format($row['COUNT(id)']) ?> Khách Hàng</b></p>

                <p class="info-tong">Tổng số khách hàng được quản lý.</p>
            </div>
        </div>
    </div>
    <!-- col-6 -->
    <div class="col-md-6">
        <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
            <div class="info">
                <h4>Tổng sản phẩm</h4>
                <?php
                include '../config.php';
                $sql = "SELECT COUNT(id) FROM tblsanpham";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($query);
                ?>
                <p><b><?php echo $format = number_format($row['COUNT(id)']) ?> sản phẩm</b></p>
                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title text-uppercase">THỐNG KÊ DOANH SỐ</h3>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title text-uppercase">THỐNG KÊ DOANH THU THÁNG</h3>
            <div id="chartDemo" style="height: 370px; width: 100%;"></div>
        </div>
    </div>
</div>



<div class="text-right" style="font-size: 12px">
    <p><b>Hệ thống quản lý V2.0 | Code by Trí</b></p>
</div>
</main>


<?php
include '../config.php';
$sql = "SELECT COUNT(id),ngayMua FROM  tblhoadon  WHERE trangthaiHD=2 GROUP BY YEAR(ngayMua), MONTH(ngayMua)ASC";
$query = mysqli_query($conn, $sql);
while ($row = $query->fetch_assoc()) { ?>
    <?php $product = $row['COUNT(id)']; ?>
    <?php $ngayMua = $row['ngayMua']; ?>
<?php
    $dataHD[] = array(
        'y' => $product,
        'label' => $ngayMua,
    );
} ?>

<?php
include '../config.php';
$sql = "SELECT COUNT(HD.id),HD.ngayMua,SUM(CT.soLuong),SUM(SP.donGia*CT.soLuong) FROM tblhoadon HD INNER JOIN tblcthd CT ON HD.id = CT.idHoaDon INNER JOIN tblsanpham SP ON SP.id=CT.idSanPham WHERE HD.trangthaiHD=2 GROUP BY YEAR(ngayMua), MONTH(ngayMua)ASC  ";
$query = mysqli_query($conn, $sql);
while ($row = $query->fetch_assoc()) { ?>
    <?php $sanPhamDaBan = $row['SUM(CT.soLuong)']; ?>
<?php
    $dataSP[] = array(
        'y' => $sanPhamDaBan,
    );
}

?>
<?php
include '../config.php';
$sql = "SELECT COUNT(HD.id),HD.ngayMua,SUM(CT.soLuong),SUM(SP.donGia*CT.soLuong) FROM tblhoadon HD INNER JOIN tblcthd CT ON HD.id = CT.idHoaDon INNER JOIN tblsanpham SP ON SP.id=CT.idSanPham WHERE HD.trangthaiHD=2 GROUP BY YEAR(ngayMua), MONTH(ngayMua)ASC  ";
$query = mysqli_query($conn, $sql);
while ($row = $query->fetch_assoc()) { ?>
    <?php $price_date =  $row['ngayMua']; ?>
    <?php $price_demo = $row['COUNT(HD.id)']; ?>
    <?php $price_pr =  $row['SUM(SP.donGia*CT.soLuong)']; ?>
<?php
    $dataLine[] = array(
        'y' => $price_pr,
        'label' => $price_date,
    );
}
?>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            axisY: {
                title: "Hoá Đơn",
                titleFontColor: "#4F81BC",
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC"
            },
            axisY2: {
                title: "Sản Phẩm",
                titleFontColor: "#C0504E",
                lineColor: "#C0504E",
                labelFontColor: "#C0504E",
                tickColor: "#C0504E"
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                    type: "column",
                    name: "Hoá Đơn",
                    legendText: "Hoá Đơn",
                    showInLegend: true,
                    yValueFormatString: "#,### Hoá Đơn",
                    xValueFormatString: "####",
                    dataPoints: <?php echo json_encode($dataHD, JSON_NUMERIC_CHECK); ?>
                },
                {
                    type: "column",
                    name: "Sản Phẩm",
                    legendText: "Sản Phẩm",
                    axisYType: "secondary",
                    showInLegend: true,
                    xValueFormatString: "####",
                    yValueFormatString: "#,### Sản Phẩm",
                    dataPoints: <?php echo json_encode($dataSP, JSON_NUMERIC_CHECK); ?>
                },
            ]

        });
        chart.render();

        var chart2 = new CanvasJS.Chart("chartDemo", {
            animationEnabled: true,
            axisY: {
                valueFormatString: "#,### VNĐ"
            },
            axisX: {
                valueFormatString: "#,### VNĐ"
            },
            data: [{
                type: "spline",
                xValueFormatString: "####",
                yValueFormatString: "#,### VNĐ",
                dataPoints: <?php echo json_encode($dataLine, JSON_NUMERIC_CHECK); ?>

            }]
        });

        chart2.render();

        function toggleDataSeries(e) {
            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }

    }
</script>