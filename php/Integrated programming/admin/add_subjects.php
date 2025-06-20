<?php include "navbar.php" ?>
<?php include "sidebar.php" ?>
<html>

<body>
    <div class="main">
        <div class="card">
            <h3>Add Subjects</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <div class="block">
                    <div class="block-content collapse in">
                        <a href="subjects.php"><ion-icon name="arrow-back-outline"></ion-icon> Back</a>
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Subject Code</label>
                                <div class="controls">
                                    <input type="text" name="subject_code" id="inputEmail" placeholder="Subject Code">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Subject Title</label>
                                <div class="controls">
                                    <input type="text" class="span8" name="title" id="inputPassword"
                                        placeholder="Subject Title" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Number of Units</label>
                                <div class="controls">
                                    <input type="text" class="span1" name="unit" id="inputPassword" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Semester</label>
                                <div class="controls">
                                    <select name="semester">
                                        <option></option>
                                        <option>1st</option>
                                        <option>2nd</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Description</label>
                                <div class="controls">
                                    <textarea name="description" id="ckeditor_full"></textarea>
                                </div>
                            </div>



                            <div class="control-group">
                                <div class="controls">

                                    <button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i>
                                        Save</button>
                                </div>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['save'])) {
                            $subject_code = $_POST['subject_code'];
                            $title = $_POST['title'];
                            $unit = $_POST['unit'];
                            $description = $_POST['description'];
                            $semester = $_POST['semester'];


                            $query = mysqli_query($conn, "select * from subject where subject_code = '$subject_code' ") or die;
                            $count = mysqli_num_rows($query);

                            if ($count > 0) { ?>
                                <script>
                                    alert('Data Already Exist');
                                </script>
                                <?php
                            } else {
                                mysqli_query($conn, "insert into subject (subject_code,subject_title,description,unit,semester) values('$subject_code','$title','$description','$unit','$semester')") or die;


                                mysqli_query($conn, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Add Subject $subject_code')") or die;


                                ?>
                                <script>
                                    window.location = "subjects.php";
                                </script>
                                <?php
                            }
                        }

                        ?>


                    </div>
                </div>
            </div>
        </div>
</body>

</html>