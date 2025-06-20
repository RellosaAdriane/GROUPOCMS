<?php include "header.php" ?>
<html>

<body class="users">

    <div class="header">
        <img src="admin/images/cvsuLogo.png" class="logo">
        <div class="title">
            Cavite State University - Imus Campus<br><strong>E - Learning</strong>
        </div>

    </div>

    <div class="form-container">
        <div class="form-box">
            <h3 class="signin-heading"><span class="icon"></span><ion-icon name="lock-closed"></ion-icon>Sign in</h3>
            <form id="login_form1" class="form-signin" method="post">
                <input type="text" class="input-block-level" id="username" name="username" placeholder="Username"
                    required>
                <input type="password" class="input-block-level" id="password" name="password" placeholder="Password"
                    required>
                <button class="btn btn-info" type="submit"><span class="icon"></span><ion-icon
                        name="log-in"></ion-icon>Sign in</button>
            </form>
            </script>
            <script>
                jQuery(document).ready(function () {
                    jQuery("#login_form1").submit(function (e) {
                        e.preventDefault();
                        var formData = jQuery(this).serialize();
                        $.ajax({
                            type: "POST",
                            url: "login.php",
                            data: formData,
                            success: function (html) {
                                if (html == 'true') {
                                    $.jGrowl("Welcome to CVSU Online Class Management System", { header: 'Access Granted' });
                                    var delay = 2000;
                                    setTimeout(function () { window.location = 'teacher_dashboard.php' }, delay);
                                } else if (html == 'true_student') {
                                    $.jGrowl("Welcome to CVSU Online Class Management System", { header: 'Access Granted' });
                                    var delay = 1000;
                                    setTimeout(function () { window.location = 'student_dashboard.php' }, delay);
                                } else {
                                    $.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
                                }
                            }

                        });
                        return false;
                    });
                });
            </script>

        </div>

        <div class="form-box">
            <p>New to CvSu OCMS</p>
            <hr>
            <h3 class="signin-heading"><span class="icon"></span><ion-icon name="log-in"></ion-icon> Sign up</h3>
            <br>
            <form>
                <div class="signup-buttons">
                    <a href="student_reg.php" button class="btn btn-info" type="submit" name="student">I’m a Student
                        </abutton></a>
                    <a href="teacher_reg.php" button class="btn btn-info" type="submit" name="teacher">I’m a Teacher
                        </abutton></a>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <a href="about.php"> About</a>
        <a href="history.php"> History</a>
        <a href="developer.php"> Developers</a>
        <a href="index.php">Home</a>
        <div>CVSU E-Learning Copyright 2025</div>
    </footer>

</body>

</html>