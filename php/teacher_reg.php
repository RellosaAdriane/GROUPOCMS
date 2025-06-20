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
            <form id="signin_teacher" class="form-signin" method="post">
                <h3 class="form-signin-heading"><ion-icon name="lock-closed"></ion-icon> Sign up as Teacher</h3>
                <input type="text" class="input-block-level" name="firstname" placeholder="Firstname" required>
                <input type="text" class="input-block-level" name="lastname" placeholder="Lastname" required>
                <label>Department</label>
                <select name="department_id">
                    <option></option>
                    <?php
                    $query = mysqli_query($conn, "select * from department order by department_name ") or die;
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="text" class="input-block-level" id="username" name="username" placeholder="Username"
                    required>
                <input type="password" class="input-block-level" id="password" name="password" placeholder="Password"
                    required>
                <input type="password" class="input-block-level" id="cpassword" name="cpassword"
                    placeholder="Re-type Password" required>
                <button id="signin" name="login" class="btn btn-info" type="submit"><i
                        class="icon-check icon-large"></i> Sign
                    in</button>
            </form>
            <script>
                jQuery(document).ready(function () {
                    jQuery("#signin_teacher").submit(function (e) {
                        e.preventDefault();
                        var password = jQuery('#password').val();
                        var cpassword = jQuery('#cpassword').val();
                        if (password == cpassword) {
                            var formData = jQuery(this).serialize();
                            $.ajax({
                                type: "POST",
                                url: "teacher_signup.php",
                                data: formData,
                                success: function (html) {
                                    if (html == 'true') {
                                        $.jGrowl("Welcome to CVSU Online Class Management System", { header: 'Sign up Success' });
                                        var delay = 1000;
                                        setTimeout(function () { window.location = 'teacher_dashboard.php' }, delay);
                                    } else {
                                        $.jGrowl("Your data is not found in the database", { header: 'Sign Up Failed' });
                                    }
                                }
                            });

                        } else {
                            $.jGrowl("Your data is not found in the database", { header: 'Sign Up Failed' });
                        }
                    });
                });
            </script>
            <a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i
                    class="icon-signin icon-large"></i> Click here to Login</a>
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