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
                <form method="post" action="">

                    <div><a href="teacher_dashboard.php" class="btn btn-info"> Back</a> </div>
                    <button style="float: Right;"  name="submit" type="submit" class="btn btn-info"><ion-icon class="icon-signin icon-large"
                            name="add-outline"></ion-icon>&nbsp;Add
                        Student</button>
                    <br>
                    <br>
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                        <thead>

                            <tr>

                                <th>Photo</th>
                                <th>Name</th>
                                <th>Course Year and Section</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $a = 0;
                            $query = mysqli_query($conn, "select * from student LEFT JOIN class on class.class_id = student.class_id
												
										") or die;
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['student_id'];
                                $a++;

                                ?>

                                <tr>
                                    <input type="hidden" name="test" value="<?php echo $a; ?>">
                                    <td width="70"><img class="img-rounded" src="admin/<?php echo $row['location']; ?>"
                                            height="50" width="40"></td>
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                    <td><?php echo $row['class_name']; ?></td>

                                    <td width="80">
                                        <select name="add_student<?php echo $a; ?>">
                                            <option></option>
                                            <option>Add</option>
                                        </select>

                                        <input type="hidden" name="student_id<?php echo $a; ?>" value="<?php echo $id; ?>">
                                        <input type="hidden" name="class_id<?php echo $a; ?>"
                                            value="<?php echo $get_id; ?>">
                                        <input type="hidden" name="teacher_id<?php echo $a; ?>"
                                            value="<?php echo $session_id; ?>">

                                    </td>

                                <?php } ?>

                            </tr>

                        </tbody>
                    </table>

                </form>


                <?php

                if (isset($_POST['submit'])) {

                    $test = $_POST['test'];
                    for ($b = 1; $b <= $test; $b++) {




                        $test1 = "student_id" . $b;
                        $test2 = "class_id" . $b;
                        $test3 = "teacher_id" . $b;
                        $test4 = "add_student" . $b;

                        $id = $_POST[$test1];
                        $class_id = $_POST[$test2];
                        $teacher_id = $_POST[$test3];
                        $Add = $_POST[$test4];

                        $query = mysqli_query($conn, "select * from teacher_class_student where student_id = '$id' and teacher_class_id = '$class_id' ") or die;
                        $count = mysqli_num_rows($query);

                        if ($count > 0) { ?>
                            <script>
                                alert('Success'); 
                            </script>
                            <script>
                                window.location = "add_student.php<?php echo '?id=' . $get_id; ?>"; 
                            </script>

                            <?php
                        } else
                            if ($Add == 'Add') {


                                mysqli_query($conn, "insert into teacher_class_student (student_id,teacher_class_id,teacher_id) values('$id','$class_id','$teacher_id') ") or die;
                            } else {
                            }
                        ?>
                        <script>
                            window.location = "my_students.php<?php echo '?id=' . $get_id; ?>"; 
                        </script><?php
                    }
                }
                ?>
                </tbody>
                </table>
            </div>
        </div>

        <!-- ADD CLASS -->
        <div class="card2" style="width: 480px;">
            <div class="stats-grid">

            </div>
        </div>
    </div>
</body>



</html>