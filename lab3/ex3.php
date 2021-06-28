<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dateTime</title>
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../lib/css/style.css" rel="stylesheet" />
    <link href="../lib/fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="./css/ex3.css" rel="stylesheet" />
</head>

<body>
    <div class="container h-100">
        <div class="row">
            <?php
            $checkRequired =
                $_SERVER["REQUEST_METHOD"] == "POST"
                && isset($_POST["name"])
                && isset($_POST["day"])
                && isset($_POST["month"])
                && isset($_POST["year"])
                && isset($_POST["hour"])
                && isset($_POST["minute"])
                && isset($_POST["second"]);
            if ($checkRequired) {
                $name = $_POST["name"];
                $day = $_POST["day"];
                $month = $_POST["month"];
                $minute = $_POST["minute"];
                $year = $_POST["year"];
                $hour = $_POST["hour"];
                $second = $_POST["second"];
                $checkValidDate = checkdate($month, $day, $year);
            ?>
                <div class="col-12">
                    <div class="col-12 row h-100 justify-content-center align-items-center">
                        <div class="col-10 col-md-8 col-lg-6">
                            <div class="jumbotron" style="padding: 1rem 2rem;">
                                <h1>Thông tin hiển thị</h1>
                                <?php
                                if (!$checkValidDate) {
                                ?>
                                    <div class="alert alert-warning">
                                        Bạn nhập ngày không hợp lệ !
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div>
                                        Hi <?php echo $name ?>!
                                        you have chosen an appointment
                                        on <?php echo "{$hour}:{$minute}:{$second},  {$day}/{$month}/{$year}" ?>
                                    </div>
                                    <div>More information</div>
                                    <?php
                                    if ($hour >= 12) {
                                        $hour -= 12;
                                        echo " In 12 hours, the time and date is {$hour}:{$minute}:{$second} PM, {$day}/{$month}/{$year}";
                                    } else {
                                        echo " In 12 hours, the time and date is {$hour}:{$minute}:{$second} AM, {$day}/{$month}/{$year}";
                                    }
                                    $d = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                                    echo "<br>";
                                    echo "This month has {$d} days";
                                    ?>
                                <?php
                                }
                                ?>
                                <br>
                                <button id="resetBtn" type="button" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="col-12 row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <!-- Form -->
                    <form action="" method="post">
                        <h1 style="text-align : center">Nhập thông tin </h1>
                        <!-- Input fields -->
                        <div class="row">
                            <div class="col-12 p-3">
                                <label for="name1" class="required">Tên của bạn là :</label>
                                <input value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" oninput="handleName(this)" type="text" class="form-control" id="name" placeholder="VD: Hoa Xuân Dương" name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="Date" class="required">Date</label>
                                <div class="row" id="Date">
                                    <div class="col-4">
                                        <select class="form-control" name="day" id="day" required>
                                            <option value="">Ngày</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="month" id="month" required>
                                            <option value="">Tháng</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="year" id="year" required>
                                            <option value="">Năm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-12">
                                <label for="Time" class="required">Time</label>
                                <div class="row" id="Time">
                                    <div class="col-4">
                                        <select class="form-control" name="hour" id="hour" required>
                                            <option value="">Giờ</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="minute" id="minute" required>
                                            <option value="">Phút</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="second" id="second" required>
                                            <option value="">Giây</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <!-- End input fields -->
                        <div class="col-12 p-3 text-center">
                            <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
                            <button id="btnResetForm" type="reset" class="btn btn-secondary">Reset</button>
                        </div>

                    </form>
                    <!-- Form end -->
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="../lib/js/popper.min.js"></script>
    <script type="text/javascript" src="../lib/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/ex3.js"></script>
    <script>
        $(document).ready(function() {
            //Xử lý giá trị lưu lại sau khi submit, trộn lẫn code php nên không tách ra được
            $("#day option[value='<?php echo isset($_POST['day']) ? $_POST['day'] : ''; ?>']").attr("selected", "selected");
            $("#month option[value='<?php echo isset($_POST['month']) ? $_POST['month'] : ''; ?>']").attr("selected", "selected");
            $("#year option[value='<?php echo isset($_POST['year']) ? $_POST['year'] : ''; ?>']").attr("selected", "selected");
            $("#hour option[value='<?php echo isset($_POST['hour']) ? $_POST['hour'] : ''; ?>']").attr("selected", "selected");
            $("#minute option[value='<?php echo isset($_POST['minute']) ? $_POST['minute'] : ''; ?>']").attr("selected", "selected");
            $("#second option[value='<?php echo isset($_POST['second']) ? $_POST['second'] : ''; ?>']").attr("selected", "selected");
        });
    </script>
</body>

</html>