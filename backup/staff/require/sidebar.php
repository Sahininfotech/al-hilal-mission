<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item ">
            <a class="nav-link <?php if($page != "dashboard"){echo "collapsed";} ?>" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <!-- myaccount start -->
        <li class="nav-item">
            <a class=" nav-link <?php if($page != "myaccount"){echo "collapsed";} ?>" data-bs-target="#myaccount-nav"
                href="myaccount.php">
                <i class="bi bi-person "></i>
                <span>My Account</span>
            </a>
        </li>
        <!-- myaccount end -->
        <!-- start student management -->
        <li
            class="nav-item <?php if($page == "add-new-student" || $page == "Student Attendance" || $page == "Student Details"){echo "active";} ?>">
            <a class="nav-link <?php if($page == "add-new-student" || $page == "Student Attendance" || $page == "Student Details"){echo "noaction";}else {
                echo "collapsed"; 
            } ?>" data-bs-target="#studentmanagement-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Student Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="studentmanagement-nav"
                class="nav-content collapse <?php if($page == "add-new-student" || $page == "Student Attendance" || $page == "Student Details"){echo "show";} ?>"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="addnewstudent.php" <?php if($page == "add-new-student"  ){echo "class='active'";} ?>>
                        <i class="bi bi-circle"></i><span>Add New Student</span>
                    </a>
                </li>
                <li>
                    <a href="studentattendance.php"
                        <?php if($page == "Student Attendance"  ){echo "class='active'";} ?>>
                        <i class="bi bi-circle"></i><span>Student Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="studentdetails.php" <?php if($page == "Student Details"  ){echo "class='active'";} ?>>
                        <i class="bi bi-circle"></i><span>Student Details</span>
                    </a>
                </li>

            </ul>
        </li>
        <!-- End student management Nav -->

        <!-- start Forum -->
        <li
            class="nav-item<?php if($page == "Notice"|| $page == "Student Notice"|| $page == "Admin Message"  ){echo "active";} ?>">
            <a class="nav-link <?php if($page == "Notice"|| $page == "Student Notice"|| $page == "Admin Message"  ){echo "noaction";}else {
                echo "collapsed"; 
            } ?>" data-bs-target="#forum-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Forum</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forum-nav"
                class="nav-content collapse <?php if($page == "Notice"|| $page == "Student Notice"|| $page == "Admin Message"   ){echo "show";} ?> "
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="notice.php" <?php if($page == "Notice"  ){echo "class='active'";} ?>>
                        <i class="bi bi-circle"></i><span>Notice</span>
                    </a>
                </li>
                <li>
                    <a href="studentnotice.php" <?php if($page == "Student Notice"  ){echo "class='active'";} ?>>
                        <i class="bi bi-circle"></i><span>Student Notice</span>
                    </a>
                </li>
                <li>
                    <a href="admin.message.php" <?php if($page == "Admin Message"  ){echo "class='active'";} ?>>
                        <i class="bi bi-circle"></i><span>Admin Message</span>
                    </a>
                </li>
            </ul>
        </li><!-- End forum Nav -->
        <!-- start Contact Page Nav -->
        <li class="nav-item">
            <a class="nav-link <?php if($page != "Contact"){echo "collapsed";} ?>" href="pages-contact.php">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->





    </ul>

</aside><!-- End Sidebar-->