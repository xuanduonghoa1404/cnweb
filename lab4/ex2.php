<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải file</title>
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../lib/css/style.css" rel="stylesheet"/>
    <link href="../lib/fontawesome/css/all.min.css" rel="stylesheet"/>
    <link href="../lib/css/toast.min.css" rel="stylesheet"/>
    <link href="./css/index.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          crossorigin="anonymous">
    <link href="../lib/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../lib/fileinput/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>

</head>

<body>
<?php require("./view/header.php");
require("./view/menu.php"); ?>
<div class="container2 h-100">
    <div class="row">
        <div class="col-12 row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6 p-28">
                <!-- Form -->
                <form id="myForm" action="" method="post" enctype="multipart/form-data">
                    <h1>Tải file lên</h1>
                    <p class="card-subtitle">Chọn số file cần tải</p>
                    <!-- Input fields -->
                    <div class="row">
                        <div class="col-12 p-3">
                            <label for="name1" class="required">Số file cần tải:</label>
                            <select class="form-control" name="number" id="number">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input data-browse-on-zone-click="true" data-theme="fas" class="file" type="file"
                                   name="uploads[]" id="uploads" multiple>
                        </div>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
    </div>

    <?php require("./view/footer.php"); ?>

    <script type="text/javascript" src="../lib/js/popper.min.js"></script>
    <script type="text/javascript" src="../lib/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../lib/js/toast.min.js"></script>
    <script type="text/javascript" src="./js/menu.js"></script>

    <script src="../lib/fileinput/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="../lib/fileinput/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../lib/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="../lib/fileinput/js/locales/vi.js" type="text/javascript"></script>
    <script src="../lib/fileinput/js/locales/es.js" type="text/javascript"></script>
    <script src="../lib/fileinput/themes/fas/theme.js" type="text/javascript"></script>
    <script src="../lib/fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>
    <script type="text/javascript" src="./js/ex2.js"></script>
</body>

</html>