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

        <li class="active"><a href="#<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i
                    class="icon-group"></i>&nbsp;My Classmates</a></li>
        <li class=""><a href="#<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i
                    class="icon-bar-chart"></i>&nbsp;My Progress</a></li>
        <li class=""><a href="#<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i
                    class="icon-download"></i>&nbsp;Downloadable Materials</a></li>
        <li class=""><a href="#<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i
                    class="icon-book"></i>&nbsp;Assignments</a></li>
        <li class=""><a href="#<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i
                    class="icon-info-sign"></i>&nbsp;Announcements</a></li>
        <li class=""><a href="#<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i
                    class="icon-calendar"></i>&nbsp;Class Calendar</a></li>
        <li class=""><a href="#<?php echo '?id=' . $get_id; ?>"><i class="icon-chevron-right"></i><i
                    class="icon-reorder"></i>&nbsp;Quiz</a></li>

    </ul>
</div>

</html>