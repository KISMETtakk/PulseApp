<?php

require_once("dashboard_servlet.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Client History</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
       
        <div class="header-right">          
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">inventory</span> Users Summary
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <?php

            echo "<a href='/pulse_app_2/pulse_app/welcome.php?user_id=$user_id'>
              <span class='material-icons-outlined'>dashboard</span> Media
            </a>"

            ?>
          </li>
          <li class="sidebar-list-item">
            <a href="/pulse_app_2/pulse_app/index.php">
              <span class="material-icons-outlined">inventory_2</span> Logout
            </a>
          </li>
         
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Average BPM</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <?php
               echo "<span class='text-primary font-weight-bold'>$bpm</span>"
            ?>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">EMOTION DETECTED</p>
              <span class="material-icons-outlined text-orange">add_shopping_cart</span>
            </div>
            <?php
               echo "<span class='text-primary font-weight-bold'>$mood</span>"
            ?>
          </div>

         

        </div>

        <div class="charts">

          <div class="charts-card">
            <p class="chart-title">Average Emotion Per Detection</p>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <p class="chart-title">Average BPM Recorded</p>
            <div id="area-chart"></div>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>