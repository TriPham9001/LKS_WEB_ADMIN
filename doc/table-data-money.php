<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Quản lý Voucher</b></a></li>
    </ul>
    <div id="clock"></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">

                        <a class="btn btn-add btn-sm" href="index.php?page_layout=ThemTienLuong" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i class="fas fa-file-upload"></i> Tải từ file</a>
                    </div>

                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>
                    </div>

                    <div class="col-sm-2">
                        <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất
                            Excel</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
                    </div>

                </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>ID Voucher</th>
                            <th>Sản Phẩm</th>
                            <th>Tên Voucher</th>
                            <th>Discount</th>
                            <th>Date</th>
                            <th>Công Cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $sql = "SELECT * FROM tblvoucher vch INNER JOIN tblsanpham sp ON vch.idSanPham=sp.id";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) { ?>

                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['tenSP'] ?></td>
                                <td><?php echo $row['tenVoucher'] ?></td>
                                <td><?php echo $row['discount'] ?></td>
                                <td><?php echo $row['dates'] ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return Del('<?php echo $row['tenVoucher']; ?>')" href="index.php?page_layout=deleteVouchers&id= <?php echo $row['id'] ?>" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm edit" href="index.php?page_layout=updateVouchers&id=<?php echo $row['id'] ?>">
                                        <i class="fas fa-edit">
                                            Sửa
                                        </i>
                                    </a>

                                </td>
                            </tr>

                        <?php } ?>

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
</script>