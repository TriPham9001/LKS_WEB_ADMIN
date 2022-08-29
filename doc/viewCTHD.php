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
                    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th width="150">Đơn Giá</th>
                                <th width="300">Số Lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idHd = $_GET['id'];
                            $sql = "SELECT * FROM tblcthd hd INNER JOIN tblsanpham sp ON hd.idSanPham=sp.id WHERE hd.idHoaDon=$idHd";
                            $result = mysqli_query($conn, $sql);

                            while ($row = $result->fetch_assoc()) { ?>

                                <tr>
                                    <td><?php echo $row['tenSP'] ?></td>
                                    <td><?php echo $row['donGia'] ?></td>
                                    <td><?php echo $row['soLuong'] ?></td>
                                    </td>
                                </tr>

                            <?php } ?>



                        </tbody>
                    </table>
                </form>

            </div>

        </div>
    </div>
</div>