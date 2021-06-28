<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách file</title>
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../lib/css/style.css" rel="stylesheet"/>
    <link href="../lib/fontawesome/css/all.min.css" rel="stylesheet"/>
    <link href="./css/index.css" rel="stylesheet"/>
</head>

<body class="fix-header fix-sidebar">
<?php
include "./view/header.php";
include "./view/menu.php";
?>
<div class="container2 h-100">
    <div class="row p-28">
        <div class="col-12 row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-10">
                <h1>Danh sách file tải lên</h1>
                <p class="card-subtitle">Xem danh sách các file đã tải lên</p>
                <div class="row p-28">
                    <!-- <div class="col-12 p-1 text-center d-flex align-items-center justify-content-center">
                    <span>Sắp xếp theo</span>
                </div> -->
                    <div class="p-1">
                        <!--                        <button type="button" class="btn btn-secondary" id="sort_name">Tên <i class="fa fa-sort-up"></i>-->
                        <!--                        </button>-->
                        <div class="btn-group">
                            <button id="name" value="" type="button" class="btn btn-success dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tên
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" id="name1">Từ A-Z</a>
                                <a class="dropdown-item" href="#" id="name2">Từ Z-A</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-1">
                        <!--                        <button type="button" class="btn btn-secondary" id="sort_update">Ngày tải lên <i-->
                        <!--                                    class="fa fa-sort-up"></i></button>-->
                        <div class="btn-group">
                            <button id="date" type="button" value="" class="btn btn-info dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ngày tải lên
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" id="date1">Mới nhất</a>
                                <a class="dropdown-item" href="#" id="date2">Cũ nhất</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-1">
                        <div class="btn-group">
                            <button id="size" type="button" value="" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Kích thước
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#" id="size1">Tăng dần</a>
                                <a class="dropdown-item" href="#" id="size2">Giảm dần</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-1">
                        <button id="reset" type="button" class="btn btn-danger" id="delete"><i class="fa fa-times"></i>&nbsp;Bỏ
                            sắp
                            xếp
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <table class="table table-stripecd table-bordered">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên file</th>
                            <th>Ngày tải lên</th>
                            <th>Kích thước</th>
                        </tr>
                        </thead>
                        <tbody id="bodyTable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include "./view/footer.php";
?>
<script type="text/javascript" src="../lib/js/popper.min.js"></script>
<script type="text/javascript" src="../lib/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/menu.js"></script>
<script type="text/javascript" src="./js/ex3.js"></script>
</body>

</html>