<?php include "navbar.php" ?>
<?php include "sidebar.php" ?>
<html>

<body>
    <div class="add_sub"><a href="add_subjects.php" class="btn btn-info"><ion-icon class="icon-signin icon-large" name="add-outline"></ion-icon> Add
            Subject</a></div>

    <div class="main">
        <div class="card">
            <h3>Subject list</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form action="delete_subject.php" method="post">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                        <a data-toggle="modal" href="#subject_delete" id="delete" class="btn btn-danger"
                            name=""><ion-icon name="trash-outline"></ion-icon></a>
                        <?php include('modal_delete.php'); ?>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Subject Code</th>
                                <th>Subject Title</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $subject_query = mysqli_query($conn, "select * from subject") or die;
                            while ($row = mysqli_fetch_array($subject_query)) {
                                $id = $row['subject_id'];
                                ?>

                                <tr>
                                    <td width="30">
                                        <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $row['subject_code']; ?></td>
                                    <td><?php echo $row['subject_title']; ?></td>

                                    <td width="30"><a href="#<?php echo '?id=' . $id; ?>"
                                            class="btn btn-success"><ion-icon name="create-outline"></ion-icon></a></td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
</body>

</html>