<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form đăng ký</title>
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../lib/css/style.css" rel="stylesheet" />
    <link href="../lib/fontawesome/css/all.min.css" rel="stylesheet" />
    <style>
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            padding-top: 24px;
            padding-bottom: 32px;
            margin-right: auto;
            margin-left: auto;
        }

        @media (max-width: 767px) {
            .header {
                position: relative;
                width: 100%;
            }
        }

        .required::after {
            content: "*";
            color: red;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <!-- <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light pl-5">
            <div class="navbar-header">
                <a class="navbar-brand" href="./form.php">
                    <i class="fas fa-home"></i>
                </a>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0">
                    <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a></li>
                    <li class="nav-item m-l-10"><a class="nav-link sidebartoggler hidden-sm-down" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item dropdown" id="li_notification">
                        <span style="cursor:pointer;" id="show_notification" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                            <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                        </span>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                            <ul>
                                <li>
                                    <div class="drop-title">Thông báo</div>
                                </li>
                                <li>
                                    <div class="message-center" id="list-noti">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div> -->
    <div class="container">
        <div class="center">
            <h1 style="text-align: center">Đăng ký thông tin cá nhân</h1>
        </div>
        <form action="process.php" method="post">
            <div id="data">
                <div class="row">
                    <label for="name" class="required">Tên</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="VD: Hoa Xuân Dương" autofocus required /><br />
                </div>
                <br>
                <div class="row">
                    <label for="email" class="required">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="VD: abc@gmail.com" required /><br />
                </div>
                <br>
                <div class="row">
                    <div class="col-2 p-0">
                        <label for="sex">Giới tính</label>
                    </div>
                    <div class="col-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="male" value="male" checked>
                            <label class="form-check-label" for="male">
                                Nam
                            </label>

                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="female" value="female" checked>
                            <label class="form-check-label" for="female">
                                Nữ
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="birthday" class="required">Ngày sinh</label>
                    <input class="form-control" type="date" name="birthday" id="birthday" placeholder="VD: 14/04/1999" required /><br />
                </div>
                <br>
                <div class="row">
                    <label for="class" class="required">Lớp</label>
                    <input class="form-control" type="text" name="class" id="class" placeholder="VD: KHMT.02" required /><br />
                </div>
                <br>
                <div class="row">
                    <label for="university" class="required">Trường đại học</label>
                    <input class="form-control" type="text" name="university" id="university" placeholder="VD: Đại học Bách Khoa Hà Nội" required /><br />
                </div>
                <br>
                <div class="row">
                    <label for="cardID" class="required">Số điện thoại</label>
                    <input class="form-control" type="text" name="cardID" id="cardID" required /><br />
                </div>
                <br>
                <div class="row">
                    <label for="country" class="required">Quốc tịch</label>
                    <select class="form-control" id="country" name="country">
                        <option value="vn">Việt Nam</option>
                        <option value="us">Mỹ</option>
                        <option value="jp">Nhật Bản</option>
                        <option value="cn">Trung Quốc</option>
                    </select>
                </div>
                <br>
                <div class="row">
                    <div class="col-2 p-0" class="required">
                        <label for="hobby[]">Sở thích</label>
                    </div>
                    <div class="col-10">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="game" name="hobby[]" value="1">
                            <label class="form-check-label" for="game">Chơi game</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="football" name="hobby[]" value="2">
                            <label class="form-check-label" for="football">Bóng đá</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exercise" name="hobby[]" value="3">
                            <label class="form-check-label" for="exercise">Thể dục thể thao</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="read" name="hobby[]" value="4">
                            <label class="form-check-label" for="read">Đọc sách</label>
                        </div>
                        <br />
                    </div>
                </div>
                <div class="row">
                    <label for="introduce">Giới thiệu về bản thân</label>
                    <br />
                    <textarea rows="4" cols="60" class="form-control" placeholder="Vài câu giới thiệu bản thân" name="introduce"></textarea>
                </div>
                <br>
            </div>

            <button class="btn btn-success" type="submit" id="submit">Đăng ký</button>

        </form>
    </div>
    <script type="text/javascript" src="../lib/js/popper.min.js"></script>
    <script type="text/javascript" src="../lib/js/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="../lib/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#cardID").on("keypress keyup blur", function(event) {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });
        })
    </script>
</body>

</html>