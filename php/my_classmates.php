<?php include "navbar_student.php" ?>
<?php include "sidebar_student2.php" ?>
<?php $get_id = $_GET['id']; ?>
<html>

<body class="column_style">
    <?php $query = mysqli_query($conn, "select * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					JOIN class ON class.class_id = teacher_class.class_id 
					JOIN subject ON subject.subject_id = teacher_class.subject_id
					where student_id = '$session_id'
					") or die;
    $row = mysqli_fetch_array($query);
    $id = $row['teacher_class_student_id'];
    ?>
    <ul class="mini_info">
        <li><a href="#"><?php echo $row['class_name']; ?></a> <span class="divider">/</span></li>
        <li><a href="#"><?php echo $row['subject_code']; ?></a> <span class="divider">/</span></li>
        <li><a href="#">School Year: <?php echo $row['school_year']; ?></a> <span class="divider">/</span></li>
        <li><a href="#"><b>My Classmates</b></a></li>
    </ul>
    <div class="main">
        <div class="card1">
            <div><a href="student_dashboard.php" class="btn btn-info"> Back</a> </div>
            <hr>
            <div class="stats-grid">
                <ul id="da-thumbs" class="da-thumbs">
                    <?php


                    $my_student = mysqli_query($conn, "SELECT *
														FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id
														INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ") or die;

                    while ($row = mysqli_fetch_array($my_student)) {
                        $id = $row['teacher_class_student_id'];
                        ?>

                        <li id="del<?php echo $id; ?>">
                            <a class="classmate_cursor" href="#">
                                <img id="student_avatar_class" src="admin/<?php echo $row['location'] ?>" width="124"
                                    height="140" class="img-polaroid">
                                <div><span></span></div>
                            </a>
                            <p class="class"><?php echo $row['lastname']; ?></p>
                            <p class="subject"><?php echo $row['firstname']; ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <!--       <div class="card2">
            <div class="stats-grid">


            </div>
        </div> -->
    </div>

</body>

</html>