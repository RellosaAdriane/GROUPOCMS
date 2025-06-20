<?php include "header.php" ?>
<html>

<body id="login">
    <div>
        <form id="login_form" class="signin-box" method="post">
            <h3 class="form-signin-heading"><span class="icon"></span><ion-icon name="alert-circle"></ion-icon> Please
                login</h3>
            <div class="input-box">
                <span class="icon"></span><ion-icon name="person"></ion-icon>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-box">
                <span class="icon"></span><ion-icon name="lock-closed"></ion-icon>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div>
                <button class="btn btn-info" type="submit"><span class="icon"></span><ion-icon class="icon-signin icon-large" name="log-in"></ion-icon>
                    Sign
                    in</button>
            </div>
        </form>
        <script>
            console.log('jQuery version:', typeof jQuery !== 'undefined' ? jQuery.fn.jquery : 'NOT LOADED');
        </script>
        <script>
            jQuery(document).ready(function () {
                jQuery("#login_form").submit(function (e) {
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
                                setTimeout(function () { window.location = 'dashboard.php' }, delay);
                            }
                            else {
                                $.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
                            }
                        }

                    });
                    return false;
                });
            });
        </script>
    </div>
</body>

</html>