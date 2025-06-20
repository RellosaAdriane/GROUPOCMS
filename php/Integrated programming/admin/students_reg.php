<?php include "navbar.php" ?>
<?php include "sidebar.php" ?>
<html>

<body class="column_style">
    <div class="main">
        <div class="card1">
            <h3>Add Students</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form id="add_student" method="post" action="save_student.php">

                    <div class="control-group">

                        <div class="controls">
                            <select name="class_id" class="" required>

                                <option></option>
                                <?php
                                $cys_query = mysqli_query($conn, "select * from class order by class_name");
                                while ($cys_row = mysqli_fetch_array($cys_query)) {

                                    ?>
                                    <option value="<?php echo $cys_row['class_id']; ?>">
                                        <?php echo $cys_row['class_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="un" class="input focused" id="focusedInput" type="text"
                                placeholder="Auto generates ID number" disabled>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="fn" class="input focused" id="focusedInput" type="text" placeholder="Firstname"
                                required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input name="ln" class="input focused" id="focusedInput" type="text" placeholder="Lastname"
                                required>
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
            <h3>Student List</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <?php include('dbcon.php'); ?>
                <form action="delete_student.php" method="post">

                    <a data-toggle="modal" href="#student_delete" id="deleteBtn" class="btn btn-danger"
                        name=""><ion-icon name="trash-outline"></ion-icon></i></a>
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                        <div class="pull-right">
                            <ul class="nav nav-pills">
                                <li class="">
                                    <a href="students.php">All</a>
                                </li>
                                <li class="">
                                    <a href="students_unreg.php">Unregistered</a>
                                </li>
                                <li class="active">
                                    <a href="students_reg.php">Registered</a>
                                </li>
                            </ul>
                        </div>
                        <?php include 'modal_delete.php' ?>
                        <thead>
                            <tr>
                                <th></th>

                                <th>Name</th>
                                <th>ID Number</th>

                                <th>Course Yr & Section</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            $limit = 10; // entries per page
                            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                            $start = ($page - 1) * $limit;

                            // Get students with JOIN, limited by page
                            $query = mysqli_query($conn, "SELECT * from student LEFT JOIN class ON student.class_id = class.class_id where status = 'Rssegistered' ORDER BY student.student_id DESC LIMIT $start, $limit");

                            // Get total count for pagination
                            $result = mysqli_query($conn, "SELECT COUNT(student_id) AS total FROM student");
                            $row = mysqli_fetch_assoc($result);
                            $total = $row['total'];
                            $pages = ceil($total / $limit);
                            ?>

                            <?php while ($row = mysqli_fetch_array($query)) {
                                $id = $row['student_id']; ?>
                                <tr>
                                    <td width="30">
                                        <input class="student-checkbox" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                    <td><?php echo $row['student_id']; ?></td>
                                    <td width="100"><?php echo $row['class_name']; ?></td>
                                    <td width="30">
                                        <a href="edit_student.php<?php echo '?id=' . $id; ?>" class="btn btn-success">
                                            <ion-icon name="create-outline"></ion-icon>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

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

                        </tbody>
                    </table>

                </form>

            </div>

            <script>
                jQuery(document).ready(function ($) {
                    function toggleDeleteButton() {
                        if ($('.student-checkbox:checked').length > 0) {
                            $('#deleteBtn').removeClass('disabled').attr('aria-disabled', 'false');
                        } else {
                            $('#deleteBtn').addClass('disabled').attr('aria-disabled', 'true');
                        }
                    }

                    $('.student-checkbox').on('change', toggleDeleteButton);

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

</html>