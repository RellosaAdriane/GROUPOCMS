<?php include "header.php" ?>
<html>
<style>
    a {
        text-decoration: none;
    }
</style>
<div class="span3" id="sidebar">
    <div>
        <img id="avatar" class="img-polaroid" src="admin/<?php echo $row['location']; ?>">
    </div>
    <br>
    <ul class="nav nav-list">
        <li class="active"><a href="student_dashboard.php"><i class="icon-chevron-right"></i><i
                    class="icon-group"></i>&nbsp;My Class</a></li>
        <li class="">
            <a href="#">Notification</a>
        </li>

        <li class="">
            <a href="#">Message</a>
        </li>

    </ul>
</div>

</html>