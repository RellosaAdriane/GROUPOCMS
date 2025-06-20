<?php include "navbar_student.php" ?>
<?php include "sidebar_student1.php" ?>
<html>

<body class="column_style">
    <ul class="mini_info">
        <?php
        $school_year_query = mysqli_query($conn, "select * from school_year order by school_year DESC") or die;
        $school_year_query_row = mysqli_fetch_array($school_year_query);
        $school_year = $school_year_query_row['school_year'];
        ?>
        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
        <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
    </ul>
    <div class="main">
        <div class="card1">
            <div>
                <div id="" class="muted pull-right">
                    <?php $query = mysqli_query($conn, "select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where student_id = '$session_id' and school_year = '$school_year'
														") or die;
                    $count = mysqli_num_rows($query);
                    ?>
                    <span class="badge badge-info"><?php echo $count; ?></span>
                </div>
            </div>
            <hr>
            <div class="stats-grid">
                <ul id="da-thumbs" class="da-thumbs">
                    <?php
                    if ($count != '0') {
                        while ($row = mysqli_fetch_array($query)) {
                            $id = $row['teacher_class_id'];
                            ?>
                            <li>
                                <a href="my_classmates.php<?php echo '?id=' . $id; ?>">
                                    <img src="<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid">
                                    <div>
                                        <span>
                                            <p><?php echo $row['class_name']; ?></p>

                                        </span>
                                    </div>
                                </a>
                                <p class="class"><?php echo $row['class_name']; ?></p>
                                <p class="subject"><?php echo $row['subject_code']; ?></p>
                                <p class="subject"><?php echo $row['firstname'] . " " . $row['lastname'] ?></p>


                            </li>


                        <?php }
                    } else { ?>
                        <div class="alert alert-info"><i class="icon-info-sign"></i> You are currently not enroll to your
                            class</div>
                    <?php } ?>
                </ul>
            </div>
        </div>

<!--        <div class="card2">
            <hr>
            <div class="stats-grid">


            </div>
        </div>-->
    </div>

</body>

</html>