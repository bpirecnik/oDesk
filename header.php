<?php
include_once 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Freelancer 3. TRB</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <!--
        Template 2051 Spot Light
        http://www.tooplate.com/view/2051-spot-light
        -->
        <link href="css/tooplate_style.css" rel="stylesheet" type="text/css"/>
        <link href="css/stil.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
            
            <!--<link rel="stylesheet" href="/resources/demos/style.css" /> -->

    </head>
    <body id="subpage">
        <div id="content">
            <div id="tooplate_wrapper">
                <div id="tooplate_header_sp">
                    <div id="tooplate_menu">
                        <ul>
                            <?php
                            if(isset($_GET ['tab'])){ 
                                $tabs = $_GET['tab'];
                            }
                                if (isset($_SESSION['user_id'])){
                            
                            if($tabs == 1){?>
                                <li><a href="projects.php?tab=1" class="current"><span></span>Projekti</a></li>
                            <?php }else{ ?>
                                <li><a href="projects.php?tab=1"><span></span>Projekti</a></li>
                            <?php
                            }
                                if(isset($_SESSION['admin']) == 1){
                                
                            if($tabs == 2){?> 
                                <li><a href="countries.php?tab=2" class="current"><span></span>Države</a></li>
                                <?php }else{?>
                                <li><a href="countries.php?tab=2"><span></span>Države</a></li>
                                <?php }
                            if($tabs == 3){?> 
                                <li><a href="skills.php?tab=3" class="current"><span></span>Veščine</a></li>
                                <?php }else{?>
                                <li><a href="skills.php?tab=3"><span></span>Veščine</a></li>
                                <?php }?>
                            <?php }?>
                             
                            <?php if($tabs == 4){?> 
                                <li><a href="project_add.php?tab=4" class="current"><span></span>Dodaj projekt</a></li>
                                <?php }else{?>
                                <li><a href="project_add.php?tab=4"><span></span>Dodaj projekt</a></li>
                            <?php }
                            if($tabs == 5){?> 
                                <li><a href="profile.php?tab=5" class="current"><span></span>Profil</a></li>
                                <?php }else{?>
                                <li><a href="profile.php?tab=5"><span></span>Profil</a></li>
                            <?php }
                            if($tabs == 6){?> 
                                <li><a href="messages.php?tab=6" class="current"><span></span><img src="images/mail_icon.png" alt="Smiley face" height="42" width="42"/></a></li>
                                <?php }else{?>
                                <li><a href="messages.php?tab=6"><span></span><img src="images/mail_icon.png" alt="Smiley face" height="32" width="32"/>12</a></li>
                            <?php }
                            if($tabs == 7){?> 
                                <li><a href="logout.php?tab=7" class="current"><span></span>Odjava</a></li>
                                <?php }else{?>
                                <li><a href="logout.php?tab=7"><span></span>Odjava</a></li>
                            <?php }?>

                            <?php } else { ?>
                                <li><a href="user_add.php"><span></span>Registracija</a></li>
                                <li><a href="login.php?tab=1"><span></span>Prijava</a></li>
                            <?php } ?>
                        </ul>    	
                    </div> <!-- end of tooplate_menu -->
                            <!--<div id="site_title"><h1><a href="#">Free Website Template</a></h1></div>-->
                </div> <!-- end of header -->
            <?php
                if (isset($_SESSION['error'])) {
                    echo '<div class="error">' . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']); //uničimo spremeljivko 
                }
                if (isset($_SESSION['success'])) {
                    echo '<div class="success">' . $_SESSION['success'] . '</div>';
                    unset($_SESSION['success']); //uničimo spremeljivko 
                }
            ?>