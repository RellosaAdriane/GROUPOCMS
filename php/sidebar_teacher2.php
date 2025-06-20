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
        <br>
        <li class="active"><a href="#"><ion-icon name="book"></ion-icon> My Students</a></li>
        <br>
        <li class=""><a href="#"><ion-icon name="calendar"></ion-icon> My Subject</a></li>
        <br>
        <li class=""><a href="#"><ion-icon name="bookmarks"></ion-icon> Assignment</a></li>
        <br>
        <li class=""><a href="#"><ion-icon name="bookmarks"></ion-icon> Quiz</a></li>
    </ul>
</div>

</html>