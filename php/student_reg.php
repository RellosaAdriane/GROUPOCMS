<?php include "header.php" ?>
<html>

<body class="users">

    <div class="header">
        <img src="admin/images/cvsuLogo.png" alt="CHMSC Logo" class="logo">
        <div class="title">
            Cavite State University - Imus Campus<br><strong>E - Learning</strong>
        </div>
    </div>

    <div class="form-container">
        <div class="form-box">
            <form id="signin_student" class="form-signin" method="post">
                <h3 class="form-signin-heading"><ion-icon name="lock-closed"></ion-icon> Sign up as Student</h3>
                <input type="text" class="input-block-level" id="username" name="username" placeholder="ID Number"
                    required>
                <input type="text" class="input-block-level" id="firstname" name="firstname" placeholder="Firstname"
                    required>
                <input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Lastname"
                    required>
                <label>Class: </label>
                <select name="class_id">
                    <option></option>
                    <?php
                    $query = mysqli_query($conn, "select * from class order by class_name ") or die;
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="password" class="input-block-level" id="password" name="password" placeholder="Password"
                    required>
                <input type="password" class="input-block-level" id="cpassword" name="cpassword"
                    placeholder="Re-type Password" required>
                <button id="signin" name="login" class="btn btn-info" type="submit"><ion-icon
                    class="icon-signin icon-large" name="log-in"></ion-icon> Sign in</button>
            </form>

            <script>
                jQuery(document).ready(function () {
                    jQuery("#signin_student").submit(function (e) {
                        e.preventDefault();

                        var password = jQuery('#password').val();
                        var cpassword = jQuery('#cpassword').val();
                        if (password == cpassword) {
                            var formData = jQuery(this).serialize();
                            $.ajax({
                                type: "POST",
                                url: "student_signup.php",
                                data: formData,
                                success: function (html) {
                                    if (html == 'true') {
                                        $.jGrowl("Welcome to CVSU Online Class Management System", { header: 'Sign up Success' });
                                        var delay = 2000;
                                        setTimeout(function () { window.location = 'student_dashboard.php' }, delay);
                                    } else if (html == 'false') {
                                        $.jGrowl("student does not found in the database Please Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ", { header: 'Sign Up Failed' });
                                    }
                                }
                            });

                        } else {
                            $.jGrowl("student does not found in the database", { header: 'Sign Up Failed' });
                        }
                    });
                });
            </script>
            <a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><ion-icon
                    class="icon-signin icon-large" name="log-in"></ion-icon> Click here to Login</a>
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