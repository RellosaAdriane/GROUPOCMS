<!DOCTYPE html>
<?php include "header.php" ?>
<html lang="en">

<body>

    <div class="header">
        <img src="admin/images/cvsuLogo.png" alt="CHMSC Logo" class="logo">
        <div class="title">
            Cavite State University - Imus Campus<br><strong>E - Learning</strong>
        </div>
        <!--<h3>Mission</h3>
        <p>Cavite State University shall provide excellent, equitable and relevant educational opportunities in the
            arts, <br>
            sciences and technology through quality instruction and responsive research and development activities. <br>
            It shall produce professional, skilled and morally upright individuals for global competitiveness.</p> -->


    </div>

    <div class="form-container">
        <div class="form-box">
            <h3 class="signin-heading"><span class="icon"></span><ion-icon name="lock-closed"></ion-icon>Sign in</h3>
            <form>
                <input type="text" name="username" placeholder="Username">
                <input type="password" id="password" placeholder="Enter password">
                <br>
                <input type="checkbox" onclick="togglePassword()"> Show Password
                <script>
                function togglePassword() {
                const passwordInput = document.getElementById("password");
                if (passwordInput.type === "password") {
                  passwordInput.type = "text";
                 } else {
                 passwordInput.type = "password";
                 }
                 }
                 </script>

                <button class="btn" type="submit"><span class="icon"></span><ion-icon name="log-in"></ion-icon>Sign in</button>
            </form>

        </div>

        <div class="form-box">
            <p>New to CvSu OCMS</p>
            <hr>
            <h3 class="signin-heading"><span class="icon"></span><ion-icon name="log-in"></ion-icon> Sign up</h3>
            <br>
            <form>
                <div class="signup-buttons">
                    <a href="studentreg.php" button class="btn" type="submit" name="student">I’m a Student</abutton></a>
                    <a href="teacherreg.php" button class="btn" type="submit" name="teacher">I’m a Teacher</abutton></a>
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