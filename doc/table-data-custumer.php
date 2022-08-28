<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách khách hàng</b></a></li>
    </ul>
    <div id="clock"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">

                <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
                    <thead>
                        <tr>
                            <th width="150">ID khách hàng</th>
                            <th width="300">Họ và tên</th>
                            <th width="300">Địa chỉ</th>
                            <th width="300">Email</th>
                            <th width="300">SĐT</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $sql = "SELECT * FROM tblkhachhang";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['tenKH'] ?></td>
                                <td><?php echo $row['diaChi'] ?></td>
                                <td><?php echo $row['matKhau'] ?></td>
                                <td><?php echo $row['soDT'] ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>