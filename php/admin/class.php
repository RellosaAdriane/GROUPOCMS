<?php include "navbar.php" ?>
<?php include "sidebar.php" ?>
<html>


<body class="column_style">
    <div class="main">
        <div class="card1">
            <h3>Add Class</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form method="post">
                    <div class="control-group">
                        <div class="controls">
                            <input name="class_name" class="input focused" id="focusedInput" type="text"
                                placeholder="Class Name" required>
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
            <h3>Class List</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form action="delete_class.php" method="post">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                        <a data-toggle="modal" href="#class_delete" id="deleteBtn" class="btn btn-danger"
                            name=""><ion-icon name="trash-outline"></ion-icon></a>
                        <?php include('modal_delete.php'); ?>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Course Year And Section</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $limit = 10; // number of entries per page
                            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                            $start = ($page - 1) * $limit;

                            $query = mysqli_query($conn, "SELECT * FROM class ORDER BY class_name ASC, class_id ASC LIMIT $start, $limit");

                            $result = mysqli_query($conn, "SELECT COUNT(class_id) AS total FROM class");
                            $row = mysqli_fetch_assoc($result);
                            $total = $row['total'];
                            $pages = ceil($total / $limit);
                            ?>
                            <div style="margin-top: 20px;">
                                <nav>
                                    <ul class="pagination">
                                        <?php if ($page > 1): ?>
                                            <li><a href="?page=<?php echo $page - 1; ?>">&laquo; Prev</a></li>
                                        <?php endif; ?>

                                        <?php for ($i = 1; $i <= $pages; $i++): ?>
                                            <li <?php if ($i == $page)
                                                echo 'class="active"'; ?>>
                                                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor; ?>

                                        <?php if ($page < $pages): ?>
                                            <li><a href="?page=<?php echo $page + 1; ?>">Next &raquo;</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>


                            <?php
                            while ($class_row = mysqli_fetch_array($query)) {
                                $id = $class_row['class_id'];
                                ?>

                                <tr>
                                    <td width="30">
                                        <input class="optionsCheckbox" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $class_row['class_name']; ?></td>
                                    <td width="40"><a href="edit_class.php<?php echo '?id=' . $id; ?>"
                                            class="btn btn-success"><ion-icon name="create-outline"></ion-icon> </a></td>


                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

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

<!-- ADD CLASS -->
<?php
if (isset($_POST['save'])) {
    $class_name = $_POST['class_name'];


    $query = mysqli_query($conn, "select * from class where class_name  =  '$class_name' ") or die;
    $count = mysqli_num_rows($query);

    if ($count > 0) { ?>
        <script>
            alert('Date Already Exist');
        </script>
        <?php
    } else {
        mysqli_query($conn, "insert into class (class_name) values('$class_name')") or die;
        ?>
        <script>
            window.location = "class.php";
        </script>
        <?php
    }
}
?>

</html>