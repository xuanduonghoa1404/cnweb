<!-- header header -->
<div class="header sticky-top">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="">
                <span>Quản lý file</span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"><a class="nav-link nav-toggler hidden-md-up text-muted  "
                                        href="javascript:void(0)"><i class="fa fa-list"></i></a></li>
                <li class="nav-item m-l-10"><a class="nav-link sidebartoggler hidden-sm-down text-muted  "
                                               href="javascript:void(0)"><i class="fa fa-list"></i></a></li>
            </ul>

            <ul class="navbar-nav my-lg-0">
                <!-- Notification -->
                <li class="nav-item dropdown" id="li_notification">
                    <span style="cursor:pointer;" id="show_notification"
                          class="nav-link dropdown-toggle text-muted text-muted " data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                        <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                    </span>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                        <ul>
                            <li>
                                <div class="drop-title">Thông báo</div>
                            </li>
                            <li>
                                <div class="message-center" id="list-noti">
                                    <!-- Message -->
                                    <a href="./ex1.php">
                                        <div class="btn btn-info btn-circle m-r-10"><i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Bài 1 - Color</h5>
                                        </div>
                                    </a>
                                    <a href="./ex3/index.html">
                                        <div class="btn btn-info btn-circle m-r-10"><i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Bài 3 - Add Favorite Blog</h5>
                                        </div>
                                    </a>
                                    <a href="./ex4/index.html">
                                        <div class="btn btn-info btn-circle m-r-10"><i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Bài 4 - Form</h5>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Notification -->
            </ul>
        </div>
    </nav>
</div>
