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
            <h3 class="signin-heading"><span class="icon"></span><ion-icon name="lock-closed"></ion-icon> Sign Up</h3>
            <form>
                <input type="text" First Name= "First Name" placeholder="First Name">
                <input type="text" Last Name= "Last Name" placeholder="Last Name">
                <input type="text" name="Student Id" placeholder="Student Id">
                <p>Course:</p>
                 <select Class="Class" id="Class">
                 <option value="BSIT2A">Bachelor of Science in Information Technology</option>
                 <option value="BSIT2B">Bachelor of Science in Education </option>
                 <option value="BSIT2C">Bachelor of Science in Business Management</option>
                 <option value="BSIT2D">Bachelor of Science in Computer Science</option>
                 <option value="BSIT2E">Bachelor of Science in Office Administration</option>
                 <option value="BSIT2F">Bachelor of Science in Psycohology</option>
                </select>
                <input type="password" name="Password" placeholder="Password">
                <input type="password" name="ReType-Password" placeholder=" ReType-Password">
                <button class="btn" type="submit"><span class="icon"></span><ion-icon name="log-in"></ion-icon>Sign Up</button>
            </form>
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