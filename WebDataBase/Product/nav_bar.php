<?php ?>
<head>
  <script src="nav_bar.js"></script>
  <link rel="stylesheet" type="text/css" href="nav_bar.css" media="screen"/>
</head>
<nav class="navbar material-navbar">
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="dropdown">
      <button onclick="myFunction1('myDropdown1')" class="dropbtn">Add</button>
      <div id="myDropdown1" class="dropdown-content">
        <a href="add_student.php">New student</a>
        <a href="add_unit.php">New unit</a>
        <a href="add_topic.php">New topic</a>
        <a href="add_subtopic.php">New subtopic</a>
      </div>
      <button onclick="myFunction1('myDropdown2')" class="dropbtn">View</button>
      <div id="myDropdown2" class="dropdown-content">
        <a href="view_topics.php">All topics</a>
        <a href="view_units.php">All units</a>
        <a href="view_all_remarks.php">All remarks</a>
        <a href="view_subtopics.php">All subtopics</a>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="try.php" class="navbar-brand">Computer Science IA</a>
      <ul class="nav navbar-nav navbar-left">
        <li><a onclick="openNav()"><span class="glyphicon glyphicon-th-list"></span></a></li></ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="try.php"><span class="glyphicon glyphicon-home"></span></a></li>
      </ul>
  </div>
  </div>
</nav>
