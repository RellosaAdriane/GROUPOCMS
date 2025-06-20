<?php include "header.php" ?>
<?php include "session.php" ?>

<html>

<div class="navbar-fixed-top">
    <div>E - Learning TEACHER Panel</div>

    <?php $query = mysqli_query($conn, "select * from teacher where teacher_id = '$session_id'") or die;
    $row = mysqli_fetch_array($query);
    ?>

    <div class="dropdown">
        <button class="dropbtn"> <i class="fa fa-user"></i>
            <?php echo $row['firstname'] . " " . $row['lastname']; ?></button>
        <div class="dropdown-content">
            <a href="#">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</div>

</html>