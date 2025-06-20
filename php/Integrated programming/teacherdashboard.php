<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </head>
  <body>
    <div class="maincontent">
        <div class="headwrapper">
            <div class="headertitle">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
    <header>MY PROFILE</header>
    <ul>
     <li><a href="#"><ion-icon name="home"></ion-icon> Dashboard</a></li>
       <li><a href="#"><i class="fas fa-stream"></i>Class</a></li>
     <li><a href="#"><i class="fas fa-calendar-week"></i>Calendar</a></li>
     <li><a href="#"><i class="fas fa-sliders-h"></i>Settings</a></li>
       <li><a href="#"><ion-icon name="help-circle"></ion-icon> Help</a></li>
     <li><a href="#"><ion-icon name="log-in"></ion-icon> Logout</a></li>
    </ul>
   </div>
   <section></section>
  </body>
</html>