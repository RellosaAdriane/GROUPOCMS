<?php include "navbar_teacher.php" ?>
<?php include "sidebar_teacher1.php" ?>

<html>

<!--<head>
  <meta charset="utf-8">
  <title>Teacher Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head> -->

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
      <hr>
      <br>
      <div class="stats-grid">
        <ul id="da-thumbs" class="da-thumbs">
          <?php $query = mysqli_query($conn, "select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year' ") or die;
          $count = mysqli_num_rows($query);

          if ($count > 0) {
            while ($row = mysqli_fetch_array($query)) {
              $id = $row['teacher_class_id'];

              ?>
              <li id="del<?php echo $id; ?>">
                <a href="my_students.php<?php echo '?id=' . $id; ?>">
                  <img src="<?php echo $row['thumbnails'] ?>" width="124" height="140" class="img-polaroid" alt="">
                  <div>
                    <span>
                      <p><?php echo $row['class_name']; ?></p>
                    </span>
                  </div>
                </a>
                <p class="class"><?php echo $row['class_name']; ?></p>
                <p class="subject"><?php echo $row['subject_code']; ?></p>
                <a href="#<?php echo $id; ?>" data-toggle="modal"><ion-icon name="trash-outline"></ion-icon> Remove</a>

              </li>
              <?php include "delete_class_modal.php"; ?>
            <?php }
          } else { ?>
            <div class="alert alert-info"><i class="icon-info-sign"></i> No Class Currently Added</div>
          <?php } ?>
        </ul>
      </div>
    </div>


    <!-- ADD CLASS -->
    <div class="card2">
      <h4><ion-icon name="add-outline"></ion-icon> Add Class</h4>
      <hr>
      <br>
      <div class="stats-grid">
        <form method="post" id="add_class">
          <div class="control-group">
            <label>Class Name:</label>
            <div class="controls">
              <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
              <select name="class_id" class="" required>
                <option></option>
                <?php
                $query = mysqli_query($conn, "select * from class order by class_name");
                while ($row = mysqli_fetch_array($query)) {

                  ?>
                  <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="control-group">
            <label>Subject:</label>
            <div class="controls">
              <select name="subject_id" class="" required>
                <option></option>
                <?php
                $query = mysqli_query($conn, "select * from subject order by subject_code");
                while ($row = mysqli_fetch_array($query)) {

                  ?>
                  <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_code']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="control-group">
            <label>School Year:</label>
            <div class="controls">
              <?php
              $query = mysqli_query($conn, "select * from school_year order by school_year DESC");
              $row = mysqli_fetch_array($query);
              ?>
              <input id="" class="span5" type="text" class="" name="school_year"
                value="<?php echo $row['school_year']; ?>">
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button name="save" class="btn btn-success"><ion-icon name="save-outline"></ion-icon> Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<!-- DELETE CLASS -->

<script type="text/javascript">
  $(document).ready(function () {
    $('.remove').click(function () {
      var id = $(this).attr("id");
      $.ajax({
        type: "POST",
        url: "delete_class.php",
        data: ({ id: id }),
        cache: false,
        success: function (html) {
          $("#del" + id).fadeOut('slow', function () { $(this).remove(); });
          $('#' + id).modal('hide');
          $.jGrowl("Your Class is Successfully Deleted", { header: 'Class delete' });
        }
      });
      return false;
    });
  });
</script>

<!-- ADD CLASS -->
<script>
  jQuery(document).ready(function ($) {
    $("#add_class").submit(function (e) {
      e.preventDefault();
      var _this = $(e.target);
      var formData = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "add_class_action.php",
        data: formData,
        success: function (html) {
          if (html == "true") {
            $.jGrowl("Class Already Exist", { header: 'Add Class Failed' });
          } else {
            $.jGrowl("Classs Successfully  Added", { header: 'Class Added' });
            var delay = 1500;
            setTimeout(function () { window.location = 'teacher_dashboard.php' }, delay);
          }
        }
      });
    });
  });
</script>

</html>