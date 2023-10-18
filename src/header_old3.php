    <div id="menu-ngang">
        <ul>
            <li><a href=""></i></a></li>
            <li><a href="gioi_thieu.php"><i class="fa fa-user" aria-hidden="true"></i> Giới thiệu</a></li>
            <li><a href="khoa_hoc.php"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Khóa học</a></li>
            <li><a href="TrangComingSoon.php"></i> Hỏi đáp</a></li>
            <?php  
                if ($permission == 2) {
                    echo "<li><a href='quan_li_user.php'></i> Quản lý</a></li>";
                }
            ?>
            <li><a href="lien_he.php"></i> Liên hệ</a></li>

                <!-- <ul>
                    <li><a href="TrangGioiThieu.html">Giới thiệu</a></li>
                    <li><a href="TrangKhoaHoc.html">Khóa học</a></li>
                </ul> -->
            
        </ul>
        <ul id="menu-ngang-right">
            <li>
                <a href=""><?php echo $_SESSION['fullname'] ?></a>
                <ul>
                    <li><a href="TrangCaNhan.php">Trang cá nhân</a></li>
                    <li id="test">
                        <form method="post">
                            <input type="submit" value="Đăng xuất" name="VeDN" class="a" />
                            <?php
                            $_SESSION['fullname'];
                            if (isset($_POST['VeDN'])) {
                                unset($_SESSION['fullname']); 
                                unset($_SESSION['username']);
                                unset($_SESSION['permission']);

                                header("location: DN.php");
                            }
                            ?>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>