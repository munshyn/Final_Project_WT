<?php
session_start();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../static/main.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Home</title>
</head>

<body class="mt-4">
    <div class="flex-wrapper">
        <!-- navigation bar -->
        <nav class="nav-bar d-flex justify-content-between align-items-end">
            <!-- to change the title of website if user manage to login -->
            <?php
            if (isset($_SESSION['userId'])) {
                echo '<a class="navbar-brand" href="profile.php">' . $_SESSION["name"] . '</a>';
            } else {
                echo '<a class="navbar-brand" href="index.php">ParkerPanzu</a>';
            }
            ?>
            <!-- to change the nav depending on the user level -->
            <?php
            if (isset($_SESSION['userId'])) {
                if ($_SESSION["level"] == 1) {
            ?>
                    <ul class="nav-item d-flex align-items-end">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#" class="ms-4">Users</a></li>
                        <li><a href="#" class="ms-4">Application</a></li>
                        <li><a href="#" class="ms-4">College</a></li>
                    </ul>
                <?php
                } else if ($_SESSION["level"] == 2) {
                ?>
                    <ul class="nav-item d-flex align-items-end">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#" class="ms-4">Students</a></li>
                        <li><a href="#" class="ms-4">Manage Application</a></li>
                        <li><a href="#" class="ms-4">College</a></li>
                    </ul>
                <?php
                } else if ($_SESSION["level"] == 3) {
                ?>
                    <ul class="nav-item d-flex align-items-end">
                        <li><a href="#home">Home</a></li>
                        <li><a href="app_form.php" class="ms-4">Apply College</a></li>
                        <li><a href="view_app.php" class="ms-4">Application Status</a></li>
                        <li><a href="view_colleges.php" class="ms-4">Colleges</a></li>
                    </ul>
                <?php
                }
            } else {
                ?>
                <ul class="nav-item d-flex align-items-end">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#home" class="ms-4">About</a></li>
                    <li><a href="#how-work" class="ms-4">How it work</a></li>
                    <li><a href="#company" class="ms-4">Company</a></li>
                </ul>
            <?php
            }
            ?>
            <!-- to change the login button to logout if the user successfuly login -->
            <?php
            if (isset($_SESSION['userId'])) {
                echo '<div class="nav-login btn btn-primary"><a href="logout.php">Logout</a></div>';
            } else {
                echo '<div class="nav-login btn btn-primary"><a href="login.php">Login</a></div>';
            }
            ?>
        </nav>
        <!-- main content -->
        <div class="main">
            <!-- home or about -->
            <div class="section section-home" id="home">
                <div class="container-fluid">
                    <!-- to change the main content depending on the user level -->
                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<h1 class="text-center">STUDENT COLLEGE ACCOMMODATION SYSTEM</h1>';
                        if ($_SESSION["level"] == 1) {
                    ?>
                            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 mt-5">
                                <!-- add new student -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>Add new student</h2>
                                        <p>Register new student information such as name, email in the system and generate the password and id for it in the system. Student have ability to apply college.</p>
                                        <a href="addNewStudent.php" class="btn btn-primary">
                                            Add student
                                        </a>
                                    </div>
                                </div>
                                <!-- add new manager -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>Add new manager</h2>
                                        <p>Register new manager information such as name, email in the system and generate the password and id for it in the system. Manager can approve or reject the student application.</p>
                                        <a href="addNewManager.php" class="btn btn-primary">
                                            Add manager
                                        </a>
                                    </div>
                                </div>
                                <!-- view all student -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>View all student</h2>
                                        <p>Page containing list of students details including id, email and name in the system. Admin have an ability to delete or update any of the selected student </p>
                                        <a href="viewStudents.php" class="btn btn-primary">
                                            View student
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 mt-5">
                                <!-- view all manager -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>View all manager</h2>
                                        <p>Page containing list of manager details including id, email and name in the system. Admin have an ability to delete or update any of the selected student</p>
                                        <a href="viewManagers.php" class="btn btn-primary">
                                            View manager
                                        </a>
                                    </div>
                                </div>
                                <!-- view all user -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" data-name="Layer 1" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M20,17.57a4.3,4.3,0,1,0-3.67,2.06A4.37,4.37,0,0,0,18.57,19l1.72,1.73a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42ZM18,17a2.37,2.37,0,0,1-3.27,0,2.32,2.32,0,0,1,0-3.27,2.31,2.31,0,0,1,3.27,0A2.32,2.32,0,0,1,18,17ZM19,3H5A3,3,0,0,0,2,6v9a3,3,0,0,0,3,3H9a1,1,0,0,0,0-2H5a1,1,0,0,1-1-1V9H20v1a1,1,0,0,0,2,0V6A3,3,0,0,0,19,3Zm1,4H4V6A1,1,0,0,1,5,5H19a1,1,0,0,1,1,1ZM10,11H7a1,1,0,0,0,0,2h3a1,1,0,0,0,0-2Z" />
                                        </svg> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>View all user</h2>
                                        <p>Page containing list of user details including id, email, password, name and level.</p>
                                        <a href="viewUsers.php" class="btn btn-primary">
                                            View user
                                        </a>
                                    </div>
                                </div>
                                <!-- view student application -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" data-name="Layer 1" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M20,17.57a4.3,4.3,0,1,0-3.67,2.06A4.37,4.37,0,0,0,18.57,19l1.72,1.73a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42ZM18,17a2.37,2.37,0,0,1-3.27,0,2.32,2.32,0,0,1,0-3.27,2.31,2.31,0,0,1,3.27,0A2.32,2.32,0,0,1,18,17ZM19,3H5A3,3,0,0,0,2,6v9a3,3,0,0,0,3,3H9a1,1,0,0,0,0-2H5a1,1,0,0,1-1-1V9H20v1a1,1,0,0,0,2,0V6A3,3,0,0,0,19,3Zm1,4H4V6A1,1,0,0,1,5,5H19a1,1,0,0,1,1,1ZM10,11H7a1,1,0,0,0,0,2h3a1,1,0,0,0,0-2Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>View student application</h2>
                                        <p>Page containing all student application including student details such as name and email and their preffered college. Also, the status of the application will be displayed as well</p>
                                        <a href="#" class="btn btn-primary">
                                            View application
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 mt-5">
                                <!-- view college -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>View Colleges</h2>
                                        <p>Page containing all college details in the system of that particular company. The system will also show current college avaibility status and number of people occupied.</p>
                                        <a href="#" class="btn btn-primary">
                                            View college
                                        </a>
                                    </div>
                                </div>
                                <!-- update user -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1,1,0,0,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1A10,10,0,0,0,15.71,12.71ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>Update Users</h2>
                                        <p>Page containing form to updatee users' information.</p>
                                        <a href="updateUsers.php" class="btn btn-primary">
                                            Update user
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php
                        } else if ($_SESSION["level"] == 2) {
                        ?>
                            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 mt-5">
                                <!-- view all student -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>View all student</h2>
                                        <p>Page containing list of students details including id, email and name in the system. Admin have an ability to delete or update any of the selected student </p>
                                        <a href="viewStudents.php" class="btn btn-primary">
                                            View student
                                        </a>
                                    </div>
                                </div>
                                <!-- Manage student application -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" data-name="Layer 1" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M20,17.57a4.3,4.3,0,1,0-3.67,2.06A4.37,4.37,0,0,0,18.57,19l1.72,1.73a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42ZM18,17a2.37,2.37,0,0,1-3.27,0,2.32,2.32,0,0,1,0-3.27,2.31,2.31,0,0,1,3.27,0A2.32,2.32,0,0,1,18,17ZM19,3H5A3,3,0,0,0,2,6v9a3,3,0,0,0,3,3H9a1,1,0,0,0,0-2H5a1,1,0,0,1-1-1V9H20v1a1,1,0,0,0,2,0V6A3,3,0,0,0,19,3Zm1,4H4V6A1,1,0,0,1,5,5H19a1,1,0,0,1,1,1ZM10,11H7a1,1,0,0,0,0,2h3a1,1,0,0,0,0-2Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>Manage student application</h2>
                                        <p>Approve or reject student application that have made in this system. The page will contain information such as student details and their preffered college.</p>
                                        <a href="#" class="btn btn-primary">
                                            Manage application
                                        </a>
                                    </div>
                                </div>
                                <!-- view college -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>View Colleges</h2>
                                        <p>Page containing all college details in the system of that particular company. The system will also show current college avaibility status and number of people occupied.</p>
                                        <a href="#" class="btn btn-primary">
                                            View college
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else if ($_SESSION["level"] == 3) {
                        ?>
                            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 mt-5">
                                <!-- apply college -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="bi" width="2em" height="2em">
                                            <path fill="#000000" d="M11.5,20h-6a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1h5V7a3,3,0,0,0,3,3h3v5a1,1,0,0,0,2,0V9s0,0,0-.06a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.29.29,0,0,0-.1,0A1.1,1.1,0,0,0,11.56,2H5.5a3,3,0,0,0-3,3V19a3,3,0,0,0,3,3h6a1,1,0,0,0,0-2Zm1-14.59L15.09,8H13.5a1,1,0,0,1-1-1ZM7.5,14h6a1,1,0,0,0,0-2h-6a1,1,0,0,0,0,2Zm4,2h-4a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2Zm-4-6h1a1,1,0,0,0,0-2h-1a1,1,0,0,0,0,2Zm13.71,6.29a1,1,0,0,0-1.42,0l-3.29,3.3-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0l4-4A1,1,0,0,0,21.21,16.29Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>Apply college</h2>
                                        <p>Fill in the form details and choose your favorite college in the UTM. Don't forget to invite your friend to apply together with you. </p>
                                        <a href="app_form.php" class="btn btn-primary">
                                            Apply
                                        </a>
                                    </div>
                                </div>
                                <!-- view application status -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" data-name="Layer 1" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M20,17.57a4.3,4.3,0,1,0-3.67,2.06A4.37,4.37,0,0,0,18.57,19l1.72,1.73a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42ZM18,17a2.37,2.37,0,0,1-3.27,0,2.32,2.32,0,0,1,0-3.27,2.31,2.31,0,0,1,3.27,0A2.32,2.32,0,0,1,18,17ZM19,3H5A3,3,0,0,0,2,6v9a3,3,0,0,0,3,3H9a1,1,0,0,0,0-2H5a1,1,0,0,1-1-1V9H20v1a1,1,0,0,0,2,0V6A3,3,0,0,0,19,3Zm1,4H4V6A1,1,0,0,1,5,5H19a1,1,0,0,1,1,1ZM10,11H7a1,1,0,0,0,0,2h3a1,1,0,0,0,0-2Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>View application status</h2>
                                        <p>View your current application status on the spot by clicking the button.</p>
                                        <a href="view_app.php" class="btn btn-primary">
                                            View status
                                        </a>
                                    </div>
                                </div>
                                <!-- view college -->
                                <div class="col d-flex align-items-start">
                                    <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi" width="2em" height="2em" viewBox="0 0 24 24">
                                            <path fill="#000000" d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2>View Colleges</h2>
                                        <p>Page containing all college details in the system of that particular company. The system will also show current college avaibility status and number of people occupied.</p>
                                        <a href="view_colleges.php" class="btn btn-primary">
                                            View college
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="home-content">
                                    <h1>We Help To</h1>
                                    <h1>Lessen The Work.</h1>
                                    <p>
                                        We research, create and build workplaces with the fusion of design, technology and
                                        innovation. Let our administrator team help you apply the college.
                                    </p>
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                    <div class="home-info d-flex justify-content-between mt-5">
                                        <div class="square d-flex justify-content-start">
                                            <div class="line"></div>
                                            <div>
                                                <div class="square-content d-flex">
                                                    <h4>800</h4>
                                                    <i class="uil uil-plus"></i>
                                                </div>
                                                <p class="square-sub-content">Happy customers</p>
                                            </div>
                                        </div>
                                        <div class="square d-flex justify-content-start">
                                            <div class="line"></div>
                                            <div>
                                                <div class="square-content d-flex">
                                                    <h4>10</h4>
                                                    <i class="uil uil-plus"></i>
                                                </div>
                                                <p class="square-sub-content">Years of experience</p>
                                            </div>
                                        </div>
                                        <div class="square d-flex justify-content-start">
                                            <div class="line"></div>
                                            <div>
                                                <div class="square-content d-flex">
                                                    <h4>120</h4>
                                                    <i class="uil uil-plus"></i>
                                                </div>
                                                <p class="square-sub-content">Awards winning</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="home-bg"></div>
                            <div class="col-md-7">
                                <div class="home-image">
                                    <div class="home-bg"></div>
                                    <img src="../static/images/home-image.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            if (!(isset($_SESSION['userId']))) {
            ?>
                <!-- how it work -->
                <div class="section section-how-work d-flex flex-column justify-content-center" id="how-work">
                    <h1>Let's see how it work</h1>
                    <div class="how-work-image d-flex justify-content-center">
                        <img src="../static/images/Section 2.png" alt="">
                    </div>
                </div>
                <!-- company -->
                <div class="section section-company d-flex flex-column justify-content-center" id="company">
                    <h1>Some of the companies we have worked with</h1>
                    <p class="company-sub-title">
                        Some of our Great Customer
                    </p>
                    <div class="company-image d-flex justify-content-center">
                        <img src="../static/images/Company.png" alt="">
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <footer class="footer d-flex justify-content-between align-items-center">
            <a href="#">ParkerPanzu</a>
            <div class="footer-item d-flex justify-content-evenly">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">How it work</a>
                <a href="#">Company</a>
            </div>
            <div class="footer-social d-flex justify-content-evenly">
                <a href="https://www.facebook.com" target="_blank"><i class="uil uil-facebook-f"></i></a>
                <a href="https://twitter.com/home?lang=en" target="_blank"><i class="uil uil-twitter"></i></a>
                <a href="https://www.instagram.com/?hl=en" target="_blank"><i class="uil uil-instagram"></i></a>
            </div>
        </footer>
    </div>

</body>

</html>