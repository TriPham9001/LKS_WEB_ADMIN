<body>

    <table>
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
            include './config.php';
            $sql = "SELECT * FROM tblsanpham";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['idTheLoai'] ?></td>

                    <td><?php echo $row['idCompany'] ?></td>
                    <td><?php echo $row['tenSP'] ?></td>
                    <td><?php echo $row['donGia'] ?></td>
                    <td><?php echo $row['moTa'] ?></td>
                  
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
    <?php
    include './config.php';
    $sql = "SELECT * FROM tblsanpham";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) { ?>

        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['idTheLoai'] ?></td>
            <td><?php echo $row['idCompany'] ?></td>
            <td><?php echo $row['tenSP'] ?></td>

            <td><?php echo $format = number_format($row['donGia']) ?></td>
            <td><?php echo $row['moTa'] ?></td>




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