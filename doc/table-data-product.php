<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách sản phẩm</b></a></li>
    </ul>
    <div id="clock"></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" href="index.php?page_layout=ThemSP" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới sản phẩm</a>
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
                            <th>Mã sản phẩm</th>
                            <th>Mã thể loại</th>
                            <th>Mã company</th>
                            <th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Mô tả</th>
                            <th>Trạng thái sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $sql = "SELECT * FROM tblsanpham";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) { ?>

                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['idTheLoai'] ?></td>
                                <td><?php echo $row['idCompany'] ?></td>
                                <td><?php echo $row['tenSP'] ?></td>

                                <td><?php echo $format = number_format($row['donGia'])?></td>
                                <td><?php echo $row['moTa'] ?></td>
                                <td>
                                    <?php if ($row['trangThaiSP'] == 0) {
                                        echo '<span class="badge pdf-file">Đã Hết Sản Phẩm</span>';
                                    }
                                    if ($row['trangThaiSP'] == 1) {
                                        echo '<span class="badge bg-success">Còn Sản Phẩm</span>';
                                    }
                                    
                                    ?>
                                </td>
                            
                            
                           
                                <td>
                                    <a class="btn btn-primary btn-sm edit" href="index.php?page_layout=updateSP&id=<?php echo $row['id'] ?>">
                                        <i class="fas fa-edit">
                                            Sửa
                                        </i>
                                    </a>
                                    <a class="btn btn-primary btn-sm trash" onclick="return Del('<?php echo $row['tenSP']; ?>')" href="index.php?page_layout=deleteSP&id=<?php echo $row['id'] ?>">
                                        <i class=" fas fa-trash-alt">
                                            Xoá
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
        return confirm("Bạn có muốn Xoá Sản Phẩm: " + name + "???");
    }
</script>