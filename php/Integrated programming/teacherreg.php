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
                <input type="text" Firstname= "Firstname" placeholder="Firstname">
                <input type="text" Lastname= "Lastname" placeholder="Lastname">
                <p>Department:</p>
                 <select Class="Department" id="Department">
                 <option value="DCS">Department Of Computer Studies</option>
                 <option value="DBPS">Department Of Biological And Physical Sciences</option>
                 <option value="DHM">Department Of Hospitality Management</option>
                 <option value="DLMC">Department Of Language And Mass Communication</option>
                 <option value="DM">Department Of Management</option>
                 <option value="DPE">Department Of Physical Education</option>
                <option value="DSH">Department Of Social Science And Humanities</option>
                <option value="DTE">Department Of Teacher Education</option>
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