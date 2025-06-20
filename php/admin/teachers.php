<?php include "navbar.php" ?>
<?php include "sidebar.php" ?>
<html>

<body class="column_style">
    <div class="main">
        <div class="card1">
            <h3>Add Teacher</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form id="add_teacher" method="post">
                    <div class="control-group">
                        <div class="controls">
                            <select name="department" class="" required>
                                <option></option>
                                <?php
                                $query = mysqli_query($conn, "select * from department order by department_name");
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <option value="<?php echo $row['department_id']; ?>">
                                        <?php echo $row['department_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="firstname" id="focusedInput" type="text"
                                placeholder="Firstname">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="lastname" id="focusedInput" type="text"
                                placeholder="Lastname">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button name="save" class="btn btn-info"><ion-icon
                                    name="add-circle-outline"></ion-icon></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card2">
            <h3>Teacher List</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <?php include('dbcon.php'); ?>
                <form action="delete_teacher.php" method="post">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                        <a data-toggle="modal" href="#teacher_delete" id="deleteBtn" class="btn btn-danger"
                            name=""><ion-icon name="trash-outline"></ion-icon></a>
                        <?php include('modal_delete.php'); ?>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Username</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $teacher_query = mysqli_query($conn, "select * from teacher") or die;
                            while ($row = mysqli_fetch_array($teacher_query)) {
                                $id = $row['teacher_id'];
                                $teacher_stat = $row['teacher_stat'];
                                ?>
                                <tr>
                                    <td width="30">
                                        <input class="teacher-Checkbox"  name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                    </td>
                                    <td width="40"><img class="img-circle" src="<?php echo $row['location']; ?>" height="50"
                                            width="50"></td>
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>

                                    <td width="50"><a href="#<?php echo '?id=' . $id; ?>"
                                            class="btn btn-success"><ion-icon name="create-outline"></ion-icon></a></td>
                                    <?php if ($teacher_stat == 'Activated') { ?>
                                        <td width="120"><a href="de_activate.php<?php echo '?id=' . $id; ?>"
                                                class="btn btn-danger"><ion-icon name="alert-circle-outline"></ion-icon> Deactivate</a></td>
                                    <?php } else { ?>
                                        <td width="120"><a href="#<?php echo '?id=' . $id; ?>"
                                                class="btn btn-success"><ion-icon name="checkmark-circle-outline"></ion-icon> Activated</a></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </form>

            </div>

            <script>
                jQuery(document).ready(function ($) {
                    function toggleDeleteButton() {
                        if ($('.teacher-Checkbox:checked').length > 0) {
                            $('#deleteBtn').removeClass('disabled').attr('aria-disabled', 'false');
                        } else {
                            $('#deleteBtn').addClass('disabled').attr('aria-disabled', 'true');
                        }
                    }

                    $('.teacher-Checkbox').on('change', toggleDeleteButton);

                    $('#deleteBtn').on('click', function (e) {
                        if ($(this).hasClass('disabled')) {
                            e.preventDefault();
                        }
                    });

                    toggleDeleteButton();
                });
            </script>
        </div>

    </div>
</body>
<?php
if (isset($_POST['save'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department_id = $_POST['department'];


    $query = mysqli_query($conn, "select * from teacher where firstname = '$firstname' and lastname = '$lastname' ") or die;
    $count = mysqli_num_rows($query);

    if ($count > 0) { ?>
        <script>
            alert('Data Already Exist');
        </script>
        <?php
    } else {

        mysqli_query($conn, "insert into teacher (firstname,lastname,location,department_id)
								values ('$firstname','$lastname','images/NO-IMAGE-AVAILABLE.jpg','$department_id')         
								") or die; ?>
        <script>
            window.location = "teachers.php"; 
        </script>
    <?php }
} ?>

</html>