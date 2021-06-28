<?php
include "./function.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi đơn vị</title>
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../lib/css/style.css" rel="stylesheet" />
    <link href="../lib/fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="./css/ex1.css" rel="stylesheet" />
</head>

<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <!-- Form -->
                <form action="" method="post">
                    <h1>Đổi đơn vị</h1>
                    <p class="card-subtitle">Từ độ (deg) sang radian (rad) hoặc ngược lại</p>
                    <!-- Input fields -->
                    <div class="row">
                        <div class="col-9 p-3">
                            <label for="value" class="required">Nhập giá trị</label>
                            <input value="<?php echo isset($_POST['value']) ? $_POST['value'] : ''; ?>" type="number" step="0.0000001" class="form-control" id="name1" placeholder="Vui lòng nhập giá trị để thực hiện chuyển đổi" name="value" required>
                        </div>
                        <div class="col-3 p-3 text-center align-self-end">
                            <button type="submit" class="btn btn-primary">Đổi</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="from">Từ</label>
                            <select class="form-control" name="from" id="from">
                                <option value="rad" <?php echo (isset($_POST['from']) && $_POST['from'] === 'rad') ? 'selected' : ''; ?>>Radian</option>
                                <option value="deg" <?php echo (isset($_POST['from']) && $_POST['from'] === 'deg') ? 'selected' : ''; ?>>Độ</option>
                            </select>
                        </div>
                        <div class="col-4 text-center align-self-end ">
                            <button id="btnConvert" type="button" class="btn btn-outline-info"><i class="fa fa-exchange-alt"></i></button>
                        </div>
                        <div class="col-4">
                            <label for="to">Đến</label>
                            <select class="form-control" name="to" id="to">
                                <option value="deg" <?php echo (isset($_POST['to']) && $_POST['to'] === 'deg') ? 'selected' : ''; ?>>Độ</option>
                                <option value="rad" <?php echo (isset($_POST['to']) && $_POST['to'] === 'rad') ? 'selected' : ''; ?>>Radian</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 p-3">
                        <div class="row">
                            <label class="d-flex align-items-center">Độ chính xác&emsp;</label>
                            <select style="margin-bottom: 10px;" class="form-control select-decimal" name="decimal" id="decimal">
                                <option <?php echo (isset($_POST['decimal']) && $_POST['decimal'] == '1') ? 'selected' : ''; ?> value="1">1</option>
                                <option <?php echo (isset($_POST['decimal']) && $_POST['decimal'] == '2') ? 'selected' : ''; ?> value="2">2</option>
                                <option <?php echo (isset($_POST['decimal']) && $_POST['decimal'] == '3') ? 'selected' : ''; ?> value="3">3</option>
                                <option <?php echo (isset($_POST['decimal']) && $_POST['decimal'] == '4') ? 'selected' : ''; ?> value="4">4</option>
                                <option <?php echo (isset($_POST['decimal']) && $_POST['decimal'] == '5') ? 'selected' : ''; ?> value="5">5</option>
                                <option <?php echo (isset($_POST['decimal']) && $_POST['decimal'] == '6') ? 'selected' : ''; ?> value="6">6</option>
                            </select>
                            <label class="d-flex align-items-center">&emsp;chữ số sau dấu chấm thập phân</label>
                        </div>
                    </div>
                    <!-- End input fields -->
                </form>
                <!-- Form end -->

                <?php
                $checkRequired =
                    $_SERVER["REQUEST_METHOD"] == "POST"
                    && isset($_POST["value"])
                    && isset($_POST["from"])
                    && isset($_POST["to"])
                    && isset($_POST["decimal"]);
                if ($checkRequired) {
                    $value = $_POST["value"];
                    $from = $_POST["from"];
                    $to = $_POST["to"];
                    $decimal = $_POST["decimal"];
                ?>
                    <div class="col-12 row text-center">
                        <h3>
                            <div class="text-center font-weight-bold ">
                                <span id="valueFrom"><?php echo $value ?></span>
                                <span id="unitFrom"><?php echo $from ?></span>
                                <span>=</span>
                                <span id="valueTo"><?php echo showResult($value, $from, $to, $decimal) ?></span>
                                <span id="unitTo"><?php echo $to ?></span>
                            </div>
                        </h3>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="../lib/js/popper.min.js"></script>
    <script type="text/javascript" src="../lib/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/ex1.js"></script>
</body>

</html>