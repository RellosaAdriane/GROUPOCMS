<?php include "navbar.php" ?>
<?php include "sidebar.php" ?>
<html>

<body class="column_style">
    <div class="main">
        <div class="card1">
            <h3>Add School Year</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form method="post">
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="school_year" id="focusedInput" type="text"
                                placeholder="School Year" required>
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
            <h3>School Year List</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form action="delete_sy.php" method="post">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                        <a data-toggle="modal" href="#content_delete" id="deleteBtn" class="btn btn-danger" name=""><ion-icon
                                name="trash-outline"></ion-icon></a>
                        <?php include('modal_delete.php'); ?>
                        <thead>
                            <tr>
                                <th></th>
                                <th>School Year</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_query = mysqli_query($conn, "select * from school_year") or die;
                            while ($row = mysqli_fetch_array($user_query)) {
                                $id = $row['school_year_id'];
                                ?>

                                <tr>
                                    <td width="30">
                                        <input class="optionsCheckbox" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $row['school_year']; ?></td>



                                    <td width="40">
                                        <a href="edit_user.php<?php echo '?id=' . $id; ?>" data-toggle="modal"
                                            class="btn btn-success"><ion-icon name="create-outline"></ion-icon></a>
                                    </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>
    </div>
    </div>

</body>

<!-- Disable delete button when theres no checks -->
<script>
    jQuery(document).ready(function ($) {
        function toggleDeleteButton() {
            if ($('.optionsCheckbox:checked').length > 0) {
                $('#deleteBtn').removeClass('disabled').attr('aria-disabled', 'false');
            } else {
                $('#deleteBtn').addClass('disabled').attr('aria-disabled', 'true');
            }
        }

        $('.optionsCheckbox').on('change', toggleDeleteButton);

        $('#deleteBtn').on('click', function (e) {
            if ($(this).hasClass('disabled')) {
                e.preventDefault();
            }
        });

        toggleDeleteButton();
    });
</script>

<!-- ADD SCHOOL YEAR -->
<?php
if (isset($_POST['save'])) {
    $school_year = $_POST['school_year'];



    $query = mysqli_query($conn, "select * from school_year where school_year = '$school_year'") or die;
    $count = mysqli_num_rows($query);

    if ($count > 0) { ?>
        <script>
            alert('Data Already Exist');
        </script>
        <?php
    } else {
        mysqli_query($conn, "insert into school_year (school_year) values('$school_year')") or die;

        mysqli_query($conn, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Add School Year $school_year')") or die;
        ?>
        <script>
            window.location = "school_year.php";
        </script>
        <?php
    }
}
?>

</html>