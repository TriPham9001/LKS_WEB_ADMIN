<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách Company</b></a></li>
    </ul>
    <div id="clock"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">

                <div class="row element-button">
                    <div class="col-sm-2">

                        <a class="btn btn-add btn-sm" href="index.php?page_layout=themMoiCompany" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo Mới Company</a>
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
                <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0" id="sampleTable">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID Company</th>
                            <th style="text-align: center;">Tên Company</th>
                            <th style="text-align: center;">Công Cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../config.php';
                        $sql = "SELECT * FROM tblcompany";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) { ?>

                            <tr style="text-align: center;">
                                <td style="text-align: center;"><?php echo $row['id'] ?></td>
                                <td style="text-align: center;"><?php echo $row['tenCompany'] ?></td>
                                <td style="text-align: center;">
                                    <a class="btn btn-primary btn-sm edit" href="index.php?page_layout=updateCompany&id=<?php echo $row['id'] ?>">
                                        <i class="fas fa-edit">
                                            Sửa
                                        </i>
                                    </a>

                                    <a class="btn btn-primary btn-sm trash" onclick="return Del('<?php echo $row['tenCompany'] ?>')" href="index.php?page_layout=deleteCompany&id=<?php echo $row['id'] ?>">
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
        return confirm("Bạn có muốn Xoá Company: " + name + "???");
    }
</script>