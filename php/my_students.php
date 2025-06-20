<?php include "navbar_teacher.php" ?>
<?php include "sidebar_teacher2.php" ?>
<?php $get_id = $_GET['id']; ?>
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
            <div class="stats-grid">
                <div id="block_bg" class="block">
                    <div>
                        <div><a href="teacher_dashboard.php" class="btn btn-info"> Back</a> </div>
                        <div id="" class="muted pull-right">
                            <?php
                            $my_student = mysqli_query($conn, "SELECT * FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
														INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ") or die;
                            $count_my_student = mysqli_num_rows($my_student); ?>
                            Number of Students: <span class="badge badge-info"><?php echo $count_my_student; ?></span>
                        </div>
                    </div>
                    <hr>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <ul id="da-thumbs" class="da-thumbs">
                                <?php
                                $my_student = mysqli_query($conn, "SELECT * FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
														INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ") or die;
                                while ($row = mysqli_fetch_array($my_student)) {
                                    $id = $row['teacher_class_student_id'];
                                    ?>
                                    <li id="del<?php echo $id; ?>">
                                        <a href="#">
                                            <img id="student_avatar_class" src="admin/<?php echo $row['location'] ?>"
                                                width="124" height="140" class="img-polaroid">
                                            <div>
                                                <span>
                                                    <p><?php ?></p>

                                                </span>
                                            </div>
                                        </a>
                                        <p class="class"><?php echo $row['lastname']; ?></p>
                                        <p class="subject"><?php echo $row['firstname']; ?></p>
                                        <a href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-trash"></i>
                                            Remove</a>
                                    </li>
                                    <?php include "remove_student_modal.php"; ?>
                                <?php } ?>
                            </ul>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('.remove').click(function () {
                                        var id = $(this).attr("id");
                                        $.ajax({
                                            type: "POST",
                                            url: "remove_student.php",
                                            data: ({ id: id }),
                                            cache: false,
                                            success: function (html) {
                                                $("#del" + id).fadeOut('slow', function () { $(this).remove(); });
                                                $('#' + id).modal('hide');
                                                $.jGrowl("Your Student is Successfully Remove", { header: 'Student Remove' });
                                            }
                                        });
                                        return false;
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ADD CLASS -->
        <div class="card2" style="width: 480px;">
            <div class="stats-grid">
                <div class="pull-right">
                    <a href="add_student.php<?php echo '?id=' . $get_id; ?>" class="btn btn-info"><ion-icon
                            class="icon-signin icon-large" name="add-outline"></ion-icon> Add Student</a>
                    <a onclick="window.open('#<?php echo '?id=' . $get_id; ?>')"
                        class="btn btn-success"><i class="icon-list"></i> Student List</a>
                </div>
            </div>
        </div>
    </div>
</body>


</html>