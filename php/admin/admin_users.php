<?php include "navbar.php" ?>
<?php include "sidebar.php" ?>
<html>

<body class="column_style">
    <div class="main">
        <div class="card1">
            <h3>Add User</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form method="post">
                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="firstname" id="focusedInput" type="text"
                                placeholder="Firstname" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="lastname" id="focusedInput" type="text"
                                placeholder="Lastname" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="username" id="focusedInput" type="text"
                                placeholder="Username" required>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <input class="input focused" name="password" id="focusedInput" type="text"
                                placeholder="Password" required>
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
            <h3>Users List</h3>
            <hr>
            <br>
            <div class="stats-grid">
                <form action="delete_users.php" method="post">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                        <a data-toggle="modal" href="#user_delete" id="deleteBtn" class="btn btn-danger"
                            name=""><ion-icon name="trash-outline"></ion-icon></a>
                        <?php include 'modal_delete.php' ?>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Username</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_query = mysqli_query($conn, "select * from users") or die;
                            while ($row = mysqli_fetch_array($user_query)) {
                                $id = $row['user_id'];
                                ?>

                                <tr>
                                    <td width="30">
                                        <input class="optionsCheckbox" name="selector[]" type="checkbox"
                                            value="<?php echo $id; ?>">
                                    </td>
                                    <td><?php echo $row['firstname']; ?>     <?php echo $row['lastname']; ?></td>

                                    <td><?php echo $row['username']; ?></td>

                                    <td width="40">
                                        <a href="edit_user.php<?php echo '?id=' . $id; ?>" data-toggle="modal"
                                            class="btn btn-success"><ion-icon name="create-outline"></ion-icon>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>

            </div>

        </div>

    </div>

    <?php
    if (isset($_POST['save'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        $query = mysqli_query($conn, "select * from users where username = '$username' and password = '$password' and firstname = '$firstname' and password = '$password' ") or die;
        $count = mysqli_num_rows($query);

        if ($count > 0) { ?>
            <script>
                alert('Data Already Exist');
            </script>
            <?php
        } else {
            mysqli_query($conn, "insert into users (username,password,firstname,lastname) values('$username','$password','$firstname','$lastname')") or die;

            mysqli_query($conn, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Add User $username')") or die;
            ?>
            <script>
                window.location = "admin_users.php";
            </script>
            <?php
        }
    }
    ?>


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
</body>

</html>