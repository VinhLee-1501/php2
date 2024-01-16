<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="../../../../public/assets/admin/images/logo.svg" alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>

                <li class="sidebar-item  ">
                    <a href="../page/home.php" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Lượng check-in</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i>
                        <span>Đặt phòng</span>
                    </a>

                    <ul class="submenu ">

                        <li>
                            <a href="../../../../App/views/admin/page/bookRoom/tableBookRoom.php">Đặt phòng</a>
                        </li>

                        <li>
                            <a href="">Check-in</a>
                        </li>

                        <li>
                            <a href="">Check-out</a>
                        </li>

                    </ul>

                </li>
<!--                <li class="sidebar-item  ">-->
<!--                    <a href="../" class='sidebar-link'>-->
<!--                        <i data-feather="file-plus" width="20"></i>-->
<!--                        <span>Yêu cầu dịch vụ</span>-->
<!--                    </a>-->
<!--                </li>-->
                <li class="sidebar-item  ">
                    <a href="../page/users/tableUser.php" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Khách hàng</span>
                    </a>
                </li>

                <li class='sidebar-title'>Forms &amp; Tables</li>



                <li class='sidebar-title'>Layout</li>

                <li class="sidebar-item  ">
                    <a href="form-layout.html" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i>
                        <span>Form Layout</span>
                    </a>

                </li>


                <li class="sidebar-item  ">
                    <a href="?page=tableRooms" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i>
                        <span>Datatable</span>
                    </a>
                </li>


<!--                <li class='sidebar-title'>Extra UI</li>-->
<!---->
<!---->
<!--                <li class="sidebar-item  has-sub">-->
<!--                    <a href="#" class='sidebar-link'>-->
<!--                        <i data-feather="user" width="20"></i>-->
<!--                        <span>Widgets</span>-->
<!--                    </a>-->
<!---->
<!--                    <ul class="submenu ">-->
<!---->
<!--                        <li>-->
<!--                            <a href="ui-chatbox.html">Chatbox</a>-->
<!--                        </li>-->
<!---->
<!--                    </ul>-->
<!---->
<!--                </li>-->


<!--                <li class="sidebar-item  has-sub">-->
<!--                    <a href="#" class='sidebar-link'>-->
<!--                        <i data-feather="trending-up" width="20"></i>-->
<!--                        <span>Charts</span>-->
<!--                    </a>-->
<!---->
<!--                    <ul class="submenu ">-->
<!---->
<!--                        <li>-->
<!--                            <a href="ui-chart-chartjs.html">ChartJS</a>-->
<!--                        </li>-->
<!---->
<!--                        <li>-->
<!--                            <a href="ui-chart-apexchart.html">Apexchart</a>-->
<!--                        </li>-->
<!---->
<!--                    </ul>-->
<!--                </li>-->
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<script>
    $(document).ready(function () {
        var url = window.location.href;
        $('.sidebar-link').filter(function () {
            return this.href == url;
        }).parent().addClass('active');
    });
</script>