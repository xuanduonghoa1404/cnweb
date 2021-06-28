<?php
include "./function.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DateTime Function</title>
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../lib/css/style.css" rel="stylesheet" />
    <link href="../lib/fontawesome/css/all.min.css" rel="stylesheet" />
    <link href="./css/ex2.css" rel="stylesheet" />
</head>

<body>
    <div class="container h-100">
        <div class="row">
            <?php
            $checkRequired =
                $_SERVER["REQUEST_METHOD"] == "POST"
                && isset($_POST["name1"])
                && isset($_POST["day1"])
                && isset($_POST["month1"])
                && isset($_POST["year1"])
                && isset($_POST["name2"])
                && isset($_POST["day2"])
                && isset($_POST["month2"])
                && isset($_POST["year2"]);
            if ($checkRequired) {
                $name1 = $_POST["name1"];
                $day1 = $_POST["day1"];
                $month1 = $_POST["month1"];
                $year1 = $_POST["year1"];
                $name2 = $_POST["name2"];
                $day2 = $_POST["day2"];
                $month2 = $_POST["month2"];
                $year2 = $_POST["year2"];
                $checkValidDate1 = checkdate($month1, $day1, $year1);
                $checkValidDate2 = checkdate($month2, $day2, $year2);
            ?>
                <div class="col-12">
                    <div class="col-12 row h-100 justify-content-center align-items-center">
                        <div class="col-10 col-md-8 col-lg-6">
                            <div class="jumbotron" style="padding: 1rem 2rem;">
                                <h1>Thông tin hiển thị</h1>
                                <?php
                                // check trung ngay sinh
                                if ($month1 == $month2 && $day1 == $day2 && $year1 == $year2) {
                                    echo "<div class='alert alert-success'> Hai người có cùng ngày sinh! </div>";
                                }
                                if (!$checkValidDate1) {
                                ?>
                                    <div class="alert alert-warning">
                                        Người dùng thứ nhất nhập ngày sinh không hợp lệ !"
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div>
                                        Ngày sinh của <?php echo $name1 ?> là ngày <?php echo $day1 ?>,
                                        tháng <?php echo $month1 ?>, năm <?php echo $year1 ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if (!$checkValidDate2) {
                                ?>
                                    <div class="alert alert-warning">
                                        Người dùng thứ hai nhập ngày sinh không hợp lệ !"
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div>
                                        Ngày sinh của <?php echo $name2 ?> là ngày <?php echo $day2 ?>,
                                        tháng <?php echo $month2 ?>, năm <?php echo $year2 ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if ($checkValidDate1 && $checkValidDate2) {
                                    // date of person1
                                    $dateOfPerson1 = "$day1-$month1-$year1";

                                    // date of person2
                                    $dateOfPerson2 = "$day2-$month2-$year2";

                                    // Function call to find date difference
                                    $dateDiff = dateDiffInDays($dateOfPerson1, $dateOfPerson2);

                                    // Display the result
                                ?>
                                    <div>
                                        Số ngày sai khác giữa hai ngày sinh là : <?php echo $dateDiff ?> ngày.
                                    </div>
                                    <div>
                                        Tuổi của <?php echo $name1 ?> là : <?php echo getAge($year1, $month1, $day1) ?>
                                    </div>
                                    <div>
                                        Tuổi của <?php echo $name2 ?> là : <?php echo getAge($year2, $month2, $day2) ?>
                                    </div>
                                    <div>
                                        Chênh lệch tuổi giữa hai người là
                                        : <?php echo abs(getAge($year1, $month1, $day1) - getAge($year2, $month2, $day2)) ?>
                                    </div>
                                <?php
                                }
                                ?>
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
                        <h1>Nhập thông tin hai người</h1>
                        <p class="card-subtitle">Nhập đầy đủ tên và sinh nhật của họ</p>
                        <!-- Input fields -->
                        <div class="row">
                            <div class="col-12 p-3">
                                <label for="name1" class="required">Tên người thứ nhất:</label>
                                <input value="<?php echo isset($_POST['name1']) ? $_POST['name1'] : ''; ?>" oninput="handleName(this)" type="text" class="form-control" id="name1" placeholder="VD: Hoa Xuân Dương" name="name1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="birthday1" class="required">Ngày sinh người thứ nhất:</label>
                                <div class="row" id="birthday1">
                                    <div class="col-4">
                                        <select class="form-control" name="day1" id="day1" required>
                                            <option value="">Ngày</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="month1" id="month1" required>
                                            <option value="">Tháng</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="year1" id="year1" required>
                                            <option value="">Năm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 p-3">
                                <label for="name2" class="required">Tên người thứ hai:</label>
                                <input value="<?php echo isset($_POST['name2']) ? $_POST['name2'] : ''; ?>" oninput="handleName(this)" type="text" class="form-control" id="name2" placeholder="VD: Hoa Xuân Dương" name="name2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="birthday2" class="required">Ngày sinh người thứ hai:</label>
                                <div class="row" id="birthday2">
                                    <div class="col-4">
                                        <select class="form-control" name="day2" id="day2" required>
                                            <option value="">Ngày</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="month2" id="month2" required>
                                            <option value="">Tháng</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="year2" id="year2" required>
                                            <option value="">Năm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End input fields -->
                        <div class="col-12 p-3 text-center">
                            <button id="btnSubmit" type="submit" class="btn btn-primary">Gửi</button>
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
    <script type="text/javascript" src="./js/ex2.js"></script>
    <script>
        $(document).ready(function() { 
            //Xử lý giá trị lưu lại sau khi submit, trộn lẫn php nên không tách ra được
            $("#day1 option[value='<?php echo isset($_POST['day1']) ? $_POST['day1'] : ''; ?>']").attr("selected", "selected");
            $("#month1 option[value='<?php echo isset($_POST['month1']) ? $_POST['month1'] : ''; ?>']").attr("selected", "selected");
            $("#year1 option[value='<?php echo isset($_POST['year1']) ? $_POST['year1'] : ''; ?>']").attr("selected", "selected");
            $("#day2 option[value='<?php echo isset($_POST['day2']) ? $_POST['day2'] : ''; ?>']").attr("selected", "selected");
            $("#month2 option[value='<?php echo isset($_POST['month2']) ? $_POST['month2'] : ''; ?>']").attr("selected", "selected");
            $("#year2 option[value='<?php echo isset($_POST['year2']) ? $_POST['year2'] : ''; ?>']").attr("selected", "selected");
        });
    </script>
</body>

</html>