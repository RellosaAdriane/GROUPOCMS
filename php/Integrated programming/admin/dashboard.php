<?php include "navbar.php" ?>
<?php include "sidebar.php" ?>
<html>

<body>
    <div class="main">
        <div class="card">
            <h3>Data Numbers</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <div>
                    <?php
                    $query_reg_teacher = mysqli_query($conn, "select * from teacher where teacher_status = 'Registered' ") or die;
                    $count_reg_teacher = mysqli_num_rows($query_reg_teacher);
                    ?>
                    <div class="stat-circle">
                        <?php echo $count_reg_teacher; ?>
                    </div>
                    <div class="stat-label">Registered Teacher</div>
                </div>
                <div>
                    <?php
                    $query_teacher = mysqli_query($conn, "select * from teacher") or die;
                    $count_teacher = mysqli_num_rows($query_teacher);
                    ?>
                    <div class="stat-circle">
                        <?php echo $count_teacher ?>
                    </div>
                    <div class="stat-label">Teachers</div>
                </div>
                <div>
                    <?php
                    $query_student = mysqli_query($conn, "select * from student where status='Registered'") or die;
                    $count_student = mysqli_num_rows($query_student);
                    ?>
                    <div class="stat-circle">
                        <?php echo $count_student ?>
                    </div>
                    <div class="stat-label">Registered Students</div>
                </div>
                <div>
                    <?php
                    $query_student = mysqli_query($conn, "select * from student") or die;
                    $count_student = mysqli_num_rows($query_student);
                    ?>
                    <div class="stat-circle">
                        <?php echo $count_student ?>
                    </div>
                    <div class="stat-label">Students</div>
                </div>
                <div>
                    <?php
                    $query_class = mysqli_query($conn, "select * from class") or die;
                    $count_class = mysqli_num_rows($query_class);
                    ?>
                    <div class="stat-circle">
                        <?php echo $count_class; ?>
                    </div>
                    <div class="stat-label">Class</div>
                </div>
                <div>
                    <?php
                    $query_subject = mysqli_query($conn, "select * from subject") or die;
                    $count_subject = mysqli_num_rows($query_subject);
                    ?>
                    <div class="stat-circle">
                        <?php echo $count_subject; ?>
                    </div>
                    <div class="stat-label">Subjects</div>
                </div>
            </div>
        </div>

        <div class="footer">
            Programmed by: Group 5 BSIT 2A
        </div>
    </div>
</body>
</html>