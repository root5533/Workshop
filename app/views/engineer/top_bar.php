<div class='w3-hide-large w3-animate-opacity' onclick='w3_close()' style='cursor:pointer' title='close side menu' id='myOverlay'></div>

<div class='w3-main' style='margin-left:200px'>

    <header id='portfolio'>
        <span class='w3-button w3-hide-large w3-large w3-hover-text-grey' onclick='w3_open()'><i class='fa fa-bars'></i></span>
        <div class='w3-container w3-teal' style='padding-top: 10px;'>
            <div class='row' style="line-height: 50px; vertical-align: bottom;">
                <div class="col-sm-10 w3-padding-large">
                    <h2 style="margin: 0px;"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user'] . "(" . $_SESSION['type'] . ")" ?></h2>
                    <h3>Maintenance</h3>
                </div>
                <div class="col-sm-2 w3-padding-large">
                    <h4 style="margin-bottom: 0px;">
                        <a href="<?php echo $GLOBALS['base_url']; ?>/LoginController/signout" style="text-decoration: none;color: white;">
                            <span class="glyphicon glyphicon-log-out"></span> Sign Out
                        </a></h4>
                </div>
            </div>
        </div>
    </header>




