<?php

require_once("welcomeservlet.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">  
    <script src="scriptMusic.js" defer></script>
    <link rel="stylesheet" href="stylyWelcome.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnectionect" href="https://fonts.googleapis.com">
    <link rel="preconnectionect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <title>Welcome</title>

    <style>
        .remove-decoration 
        {
            text-decoration: none;
        }
        .logoutBtn
        {
            text-decoration: none;
            width: 100px;
            height: 60px;
            background-color:  transparent;
            border: 1px solid #ADFFFA;
            border-radius: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;            
            margin-left: 45px;
            transition: .5s;
            color: antiquewhite;
            
        }
        .logoutBtn:hover
        {
            background-color: darkslategray;
        }

        @media screen and (max-width: 600px) {
            .left-bar {
                display: none;
            }
            .panel1 {
                width: 100%;
            }
            /* Adjust other styles for smaller screens */
        }
       
    </style>
    
</head>
  
<body>
    <div class="left-bar">
        <div class="player">
        <div class="wrapper">
            <div class="details">
                <div class="now-playing">PLAYING x OF y</div>
                <div class="track-art"></div>
                <div class="track-name">Track Name</div>
                <div class="track-artist">Track Artist</div>
            </div>

            <div class="slider_container">
                <div class="current-time">00:00</div>
                    <input type="range" min="1" max="100" value="0" class="seek_slider" onchange="seekTo()">
                    <div class="total-duration">00:00</div>
            </div>

            <div class="slider_container">
                <i class="fa fa-volume-down"></i>
                    <input type="range" min="1" max="100" value="99" class="volume_slider" onchange="setVolume()">
                    <i class="fa fa-volume-up"></i>
            </div>

            <div class="buttons">
                <div class="random-track" onclick="randomTrack()">
                    <i class="fas fa-random fa-2x" title="random"></i>
                </div>
                <div class="prev-track" onclick="prevTrack()">
                        <i class="fa fa-step-backward fa-2x"></i>
                    </div>
                    <div class="playpause-track" onclick="playpauseTrack()">
                        <i class="fa fa-play-circle fa-5x"></i>
                    </div>
                    <div class="next-track" onclick="nextTrack()">
                        <i class="fa fa-step-forward fa-2x"></i>
                    </div>
                    <div class="repeat-track" onclick="repeatTrack()">
                        <i class="fa fa-repeat fa-2x" title="repeat"></i>
                    </div>
            </div>
            

                <div id="wave">
                    <span class="stroke"></span>
                    <span class="stroke"></span>
                    <span class="stroke"></span>
                    <span class="stroke"></span>
                    <span class="stroke"></span>
                    <span class="stroke"></span>
                    <span class="stroke"></span>
                </div>  
        </div>
    </div>
</div>
    


    <div class="panel1">

    <?php echo "
    <a href='user_account.php?user_id=$user_id' class='remove-decoration'>
"
?>


        <div class="container1" class="remove-decoration">
            <span class="userIcon"></span><i class='bx bx-user-check'></i>            
            <p class="sessionN"><span class="textSessionName"> <span class="nameText"><?php echo $name; ?></span></span></p>
            
        </div>

        </a>
       
       
        <div class="container">                  
                <div class="circle"> 
                    <span class="roboto-regular "><?php echo $bpm; ?> <span class="bpmText">BPM</span></span>
                </div>  
                
                <div class="container2">
                    <i class='bx bx-pulse' ></i>
                    <p   class="textSessionMood"><span class="moodText"><?php echo $mood; ?></span></p> 
                </div>
        </div>

       
    </div>

    <div class="music-player">
            <div class="player">
            <div class="wrapper">
                <div class="details">
                    <div class="now-playing">
                        
                        <div class="pulse-data">
                            <p><a href="logout.php" class="logoutBtn"><i class='bx bx-log-out-circle'></i>Logout</a></p>     
                         </div>
                         
                         <div class="pulse-data">
                             <form method="POST" enctype="multipart/form-data">
                                 <p>
                                         <input type="file" accept=".txt" name="bpm_file" />
                                         <input type="submit" name="submit" value="upload"/>
                                 </p>     
                             </form>
                         </div>
                         
                         <div class="pulse-data">
                             <?php
                               echo "<p><a href='/pulse_app_2/pulse_app/dashboard/index.php?user_id=$user_id' class='logoutBtn'><i class='bx bx-log-out-circle'></i>Summary</a></p>"   
                             ?>
                         </div>
                         
                         <div class="pulse-data">
                             <?php
                               echo "<p><a href='FeedBackReport.php?user_id=$user_id' class='logoutBtn'><i class='bx bx-log-out-circle'></i>Feedback Reports</a></p>"   
                             ?>
                         </div>
                         
                         <div class="pulse-data">
                             <?php
                               echo "<p><a href='average_bpm_report.php?user_id=$user_id' class='logoutBtn'><i class='bx bx-log-out-circle'></i>Average BPM Report</a></p>"   
                             ?>
                         </div>

                    </div>
                    
                </div>

                <div class="slider_container">
                    
                </div>

                

                <div class="buttons">
                   
                </div>
                

                   
            </div>
        </div>
    </div>
        
    
    <div class="bubbles">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
    </div>
</body>
</html>
