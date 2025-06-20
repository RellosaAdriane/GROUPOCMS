<?php include "navbar.php" ?>
<?php include "sidebar.php" ?>
<html>

<body class="column_style">
    <div class="main">
        <div class="card1">
            <h3>Add Department</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form method="post">
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" id="focusedInput" name="d" type="text" placeholder="Deparment">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" id="focusedInput" name="pi" type="text"
                                placeholder="Person Incharge">
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
            <h3>Department List</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form action="delete_department.php" method="post">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                        <a data-toggle="modal" href="#department_delete" id="deleteBtn" class="btn btn-danger"
                            name=""><ion-icon name="trash-outline"></ion-icon></a>
                        <?php include('modal_delete.php'); ?>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Department</th>
                                <th>Person In-charge</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_query = mysqli_query($conn, "select * from department") or die;
                            while ($row = mysqli_fetch_array($user_query)) {
                                $id = $row['department_id'];
                                ?>

                                <tr>
                                    <td width="30">
                                        <input class="optionsCheckbox"  name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $row['department_name']; ?></td>
                                    <td><?php echo $row['dean']; ?></td>

                                    <td width="30"><a href="edit_department.php<?php echo '?id=' . $id; ?>"
                                            class="btn btn-success"><ion-icon name="create-outline"></ion-icon></a></td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
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

<!-- ADD DEPARTMENT -->
<?php
if (isset($_POST['save'])) {
    $pi = $_POST['pi'];
    $d = $_POST['d'];


    $query = mysqli_query($conn, "select * from department where department_name = '$d' and dean = '$pi' ") or die;
    $count = mysqli_num_rows($query);

    if ($count > 0) { ?>
        <script>
            alert('Data Already Exist');
        </script>
        <?php
    } else {
        mysqli_query($conn, "insert into department (department_name,dean) values('$d','$pi')") or die;
        ?>
        <script>
            window.location = "department.php";
        </script>
        <?php
    }
}
?>

</html>