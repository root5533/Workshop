<?php

echo
"
    <div class='w3-overlay w3-hide-large w3-animate-opacity' onclick='w3_close()' style='cursor:pointer' title='close side menu' id='myOverlay'></div>
    <div class='w3-main' style='margin-left:300px'>
    <header id='portfolio'>
        <a href='#'><img src='/w3images/avatar_g2.jpg' style='width:65px;' class='w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity'></a>
        <span class='w3-button w3-hide-large w3-xxlarge w3-hover-text-grey' onclick='w3_open()'><i class='fa fa-bars'></i></span>
        <div class='w3-container' style='padding-top: 10px;'>
            <span style='font-size: xx-large;vertical-align: middle;line-height: 60px;font-weight: bold;'>Username</span>            
            <ul class='nav navbar-nav navbar-right'>
              <li class='dropdown'>
               <a href='#' class='dropdown-toggle' data-toggle='dropdown' style='margin: auto'>
               <span class='label label-pill label-danger count' style='border-radius:10px;'></span>
               <span class='glyphicon glyphicon-envelope' style='font-size:x-large;vertical-align: middle;padding: 0px;margin-right:30px;color: black;'></span></a>
               <ul class='dropdown-menu'></ul>
              </li>
             </ul>  
        </div>
    </header>
    
    
    
";