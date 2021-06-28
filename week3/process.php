<!-- <?php
        $name = $_POST["name"];
        $email = $_POST["email"];
        $sex = $_POST["sex"];
        $birthday = date("d/m/Y", strtotime($_POST["birthday"]));
        $class = $_POST["class"];
        $university = $_POST["university"];
        $cardID = $_POST["cardID"];
        $country = $_POST["country"];
        $hobby = $_POST["hobby"];
        $introduce = $_POST["introduce"];

        echo $sex;
        echo $country;
        ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../lib/css/style.css" rel="stylesheet" />
    <link href="../lib/fontawesome/css/all.min.css" rel="stylesheet" />
    <title>Trang chi tiết</title>
    <style>
        body {
            background: #fff;
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            overflow-x: hidden;
            color: #67757c;
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            padding-top: 24px;
            padding-bottom: 24px;
            color: white;
        }

        .list {
            text-align: center;
            font-size: 20px;
            margin-bottom: 24px;
            background-color: darkgray;
            border-radius: 12px;
            padding-bottom: 16px;
        }

        p {
            color: white;
        }

        h3 {
            color: #455a64;
            background-color: #eee;
            padding: 5px;
            border-radius: 12px 12px 0px 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="list">
            <h3>Giới thiệu chung</h3>
            Bạn tên là <?php echo $name ?><br>
            Bạn sinh ngày <?php echo $birthday ?><br>
            Giới tính của bạn là
            <?php
            switch ($sex) {
                case "male":
                    echo "nam";
                    break;
                case "female":
                    echo "nữ";
                    break;
            }
            ?>
            <br>
            Quốc tịch của bạn là
            <?php
            switch ($country) {
                case "vn":
                    echo "Việt Nam";
                    break;
                case "us":
                    echo "Mỹ";
                    break;
                case "jp":
                    echo "Nhật Bản";
                    break;
                case "cn":
                    echo "Trung Quốc";
                    break;
            }
            ?>
        </div>
        <div class="list">
            <h3>Học Vấn</h3>
            Bạn đang học tại <?php echo $university ?><br>
            Bạn đang học tại lớp <?php echo $class ?><br>
        </div>


        <div class="list">
            <h3>Thông tin liên hệ</h3>
            Email của bạn là <?php echo $email ?> <br>
            Số điện thoại của bạn là <?php echo $cardID ?>
        </div>
        <div class="list" <?php
                            if (empty($hobby)) {
                                echo "style=\"display: none\";";
                            }
                            ?>>

            <h3>Sở thích</h3>
            <?php
            if (!empty($hobby)) {
                foreach ($hobby as $key => $check) {
                    switch ($check) {
                        case "1":
                            echo "Chơi game";
                            break;
                        case "2":
                            echo "Bóng đá";
                            break;
                        case "3":
                            echo "Thể dục thể thao";
                            break;
                        case "4":
                            echo "Đọc sách";
                            break;
                    }
                    if ($key != count($hobby) - 1) {
                        echo ", ";
                    }
                }
            }
            ?>

        </div>

        <div class="list" <?php
                            if (empty($introduce)) {
                                echo "style=\"display: none\";";
                            }
                            ?>>
            <h3>Giới thiệu bản thân</h3>
            <p class="p-0 m-0"><?php echo $introduce ?></p>
        </div>
    </div>
    <script type="text/javascript" src="../lib/js/popper.min.js"></script>
    <script type="text/javascript" src="../lib/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
</body>

</html>