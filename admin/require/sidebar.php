<!-- ======= Sidebar ======= -->

<aside id="sidebar" class="sidebar">



    <ul class="sidebar-nav" id="sidebar-nav">



        <li class="nav-item ">

            <a class="nav-link <?php if($page != "dashboard"){echo "collapsed";} ?>" href="index.php">

                <i class="bi bi-grid"></i>

                <span>Dashboard</span>

            </a>

        </li><!-- End Dashboard Nav -->

        <!-- start accountant -->

        <li
            class="nav-item <?php if($page == "Classes" || $page == "Departments" || $page == "Subjects" || $page == "Exams" || $page == "fees-accounts"){echo "active";} ?>">

            <a class="nav-link <?php if($page == "Classes" || $page == "Departments" || $page == "Subjects" || $page == "Exams" || $page == "fees-accounts"){echo "noaction";} else {

                echo "collapsed"; 

            } ?>" data-bs-target="#institutemanagement-nav" data-bs-toggle="collapse" href="#">

                <i class="bi bi-menu-button-wide"></i><span>Institute Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>

            </a>

            <ul id="institutemanagement-nav"
                class="nav-content collapse <?php if($page == "Classes" || $page == "Departments" || $page == "Subjects" || $page == "Exams" || $page == "fees-accounts"){echo "show";} ?> "
                data-bs-parent="#sidebar-nav">

                <li>

                    <a href="classes.php" <?php if($page == "Classes"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Classes</span>

                    </a>

                </li>

                <li>

                    <a href="subjects.php" <?php if($page == "Subjects"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Subjects</span>

                    </a>

                </li>

                <li>

                    <a href="departments.php" <?php if($page == "Departments"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Departments</span>

                    </a>

                </li>

                <li>

                    <a href="exams.php" <?php if($page == "Exams"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Examinations</span>

                    </a>

                </li>

                <li>

                    <a href="fees-accounts.php" <?php if($page == "fees-accounts"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Fees Accounts</span>

                    </a>

                </li>

            </ul>

        </li><!-- End accountant Nav -->

        <!-- start staff management -->

        <li
            class="nav-item <?php if($page == "add-new-staff" || $page == "Staff Attendance" || $page == "Staff Details"){echo "active";} ?>">

            <a class="nav-link <?php if($page == "add-new-staff" || $page == "Staff Attendance" || $page == "Staff Details"){ echo "noaction";}else {

                echo "collapsed";} ?> " data-bs-target="#staffmanagement-nav" data-bs-toggle="collapse" href="#">

                <i class="bi bi-menu-button-wide"></i><span>Staff Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>

            </a>

            <ul id="staffmanagement-nav"
                class="nav-content collapse <?php if($page == "add-new-staff" || $page == "Staff Attendance" || $page == "Staff Details"){echo "show";} ?>"
                data-bs-parent="#sidebar-nav">

                <li>

                    <a href="addnewstaff.php" <?php if($page == "add-new-staff"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Add New Staff</span>

                    </a>

                </li>

                <li>

                    <a href="staffattendance.php" <?php if($page == "Staff Attendance"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Staff Attendance</span>

                    </a>

                </li>

                <li>

                    <a href="staffdetails.php" <?php if($page == "Staff Details"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Staff Details</span>

                    </a>

                </li>



            </ul>

        </li><!-- End staff management Nav -->



        <!-- start student management -->

        <li
            class="nav-item <?php if($page == "Add New Student" || $page == "Student Attendance" || $page == "Student Details"){echo "active";} ?>">

            <a class="nav-link <?php if($page == "Add New Student" || $page == "Student Attendance" || $page == "Student Details"){echo "noaction";}else {

                echo "collapsed"; 

            } ?>" data-bs-target="#studentmanagement-nav" data-bs-toggle="collapse" href="#">

                <i class="bi bi-menu-button-wide"></i><span>Student Management</span><i
                    class="bi bi-chevron-down ms-auto"></i>

            </a>

            <ul id="studentmanagement-nav"
                class="nav-content collapse <?php if($page == "Add New Student" || $page == "Student Attendance" || $page == "Student Details"){echo "show";} ?>"
                data-bs-parent="#sidebar-nav">

                <li>

                    <a href="addnewstudent.php" <?php if($page == "Add New Student"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Add New Student</span>

                    </a>

                </li>

                <li>

                    <a href="classattendance.php" <?php if($page == "Student Attendance"  ){echo "class='active'";} ?>>

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





        <!-- start accountant -->

        <li class="nav-item <?php if($page == "Expenses" || $page == "Revenue"){echo "active";} ?>">

            <a class="nav-link <?php if($page == "Expenses" || $page == "Revenue"){echo "noaction";} else {

                echo "collapsed"; 

            } ?>" data-bs-target="#accountant-nav" data-bs-toggle="collapse" href="#">

                <i class="bi bi-menu-button-wide"></i><span>Accountant</span><i class="bi bi-chevron-down ms-auto"></i>

            </a>

            <ul id="accountant-nav"
                class="nav-content collapse <?php if($page == "Expenses" || $page == "Revenue"){echo "show";} ?> "
                data-bs-parent="#sidebar-nav">

                <li>

                    <a href="expenses.php" <?php if($page == "Expenses"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Expenses</span>

                    </a>

                </li>

                <li>

                    <a href="revenue.php" <?php if($page == "Revenue"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Revenue</span>

                    </a>

                </li>





            </ul>

        </li><!-- End accountant Nav -->

        <!-- start Forum -->

        <li class="nav-item<?php if($page == "Notice"|| $page == "Staff Notice" ){echo "active";} ?>">

            <a class="nav-link <?php if($page == "Notice"|| $page == "Staff Notice" ){echo "noaction";}else {

                echo "collapsed"; 

            } ?>" data-bs-target="#forum-nav" data-bs-toggle="collapse" href="#">

                <i class="bi bi-menu-button-wide"></i><span>Forum</span><i class="bi bi-chevron-down ms-auto"></i>

            </a>

            <ul id="forum-nav"
                class="nav-content collapse <?php if($page == "Notice"|| $page == "Staff Notice" ){echo "show";} ?> "
                data-bs-parent="#sidebar-nav">

                <li>

                    <a href="notice.php" <?php if($page == "Notice"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Notice</span>

                    </a>

                </li>

                <li>

                    <a href="staffnotice.php" <?php if($page == "Staff Notice"  ){echo "class='active'";} ?>>

                        <i class="bi bi-circle"></i><span>Staff Notice</span>

                    </a>

                </li>

            </ul>

        </li><!-- End forum Nav -->

        <!-- start Contact Page Nav -->
        <li class="nav-item<?php if($page == "Admission Query"|| $page == "Contact form" ){echo "active";} ?>">
            <a class="nav-link <?php if($page == "Admission Query"|| $page == "Contact form" ){echo "noaction";}else {
                echo "collapsed"; 
            } ?>" data-bs-target="#forums-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-envelope"></i><span>Contacts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forums-nav"
                class="nav-content collapse <?php if($page == "Admission Query" || $page == "Contact form" ){echo "show";} ?> "
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="admissionMess.php" <?php if($page == "Admission Query"  ){echo "class='active'";} ?>>
                        <i class="bi bi-circle"></i><span>Admission Query</span>
                    </a>
                </li>
                <li>
                    <a href="message_show.php" <?php if($page == "Contact form"  ){echo "class='active'";} ?>>
                        <i class="bi bi-circle"></i><span>Contact form</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- End Contact Page Nav -->

        <!-- start Profile Page Nav -->

        <li class="nav-heading">Pages</li>



        <li class="nav-item">

            <a class="nav-link <?php if($page != "Institute Details"){echo "collapsed";} ?>"
                href="institute.details.php">

                <i class="bi bi-building"></i>

                <span>Institute Details</span>

            </a>

        </li>

        <!-- End Profile Page Nav -->



        <li class="nav-item">

            <a class="nav-link <?php if($page != "vendor"){echo "collapsed";} ?>" href="vendor.php">

                <i class="bi bi-building"></i>

                <span>Vendors</span>

            </a>

        </li>

        <!-- End Profile Page Nav -->



        <!-- start Register Page Nav -->

        <li class="nav-item">

            <a class="nav-link collapsed" href="add-admin.php">

                <i class="bi bi-card-list"></i>

                <span>Register</span>

            </a>

        </li><!-- End Register Page Nav -->

        <!-- start Login Page Nav -->

        <li class="nav-item">

            <a class="nav-link collapsed" href="login.php">

                <i class="bi bi-box-arrow-in-right"></i>

                <span>Login</span>

            </a>

        </li><!-- End Login Page Nav -->





    </ul>



</aside><!-- End Sidebar-->