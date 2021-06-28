<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COLOR</title>
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../lib/css/style.css" rel="stylesheet"/>
    <link href="../lib/fontawesome/css/all.min.css" rel="stylesheet"/>
    <link href="./css/index.css" rel="stylesheet"/>
</head>
<body>
<?php require("./view/header.php");
require("./view/menu.php"); ?>
<div class="container2 h-100">
    <div class="row">
        <div class="col-12 row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6 p-28">
                <!-- Form -->
                <h1>COLOR</h1>
                <!-- Input fields -->
                <div class="row">
                    <div class="col-4 red" id="color-red"><label class="white">Red</label></div>
                    <div class="col-4 green" id="color-green"><label class="white">Green</label></div>
                    <div class="col-4 blue" id="color-blue"><label class="white">Blue</label></div>
                </div>
                <div class="row">
                    <label id="text"> Sau 2 chuyến trực thăng và bằng đường bộ đưa lương thực, thực phẩm tiếp tế cho các
                        xã bị cô
                        lập ở huyện Phước Sơn, tỉnh Quảng Nam, hôm nay, trực thăng tiếp tục được điều động để tiếp tế
                        cho nhân dân. Vượt qua điều kiện khó khăn về địa hình, thời tiết, tổ bay và lực lượng cứu hộ,
                        cứu nạn của Trung đoàn 930 đã bay mang theo 2 tấn hàng hóa đến các vùng bị cô lập của xã Phước
                        Thành, huyện Phước Sơn, tỉnh Quảng Nam.
                        Đây là 1 trong 2 xã bị cô lập gần 1 tuần nay. Chuyến hàng đã kịp thời tiếp tế gạo, lương khô,
                        chăn màn, quần áo… Đồng thời, trinh sát địa hình giúp đưa ra các phương án cứu hộ cứu nạn.
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require("./view/footer.php"); ?>

<script type="text/javascript" src="../lib/js/popper.min.js"></script>
<script type="text/javascript" src="../lib/js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../lib/js/toast.min.js"></script>
<script type="text/javascript" src="./js/menu.js"></script>
<script>
    $(document).ready(function () {
        let text = $('#text');
        text.css("color", "black");
        $('[id*="color-"]').mouseover(function () {
            let color = $(this).attr("class").toString().split(" ")[1];
            text.css("color", color);
        }).mouseout(function () {
            text.css("color", "black");
        })
    })
</script>
</body>

</html>