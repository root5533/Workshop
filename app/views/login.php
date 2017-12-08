<div class="w3-container w3-display-topmiddle">

    <div class="w3-container w3-teal w3-padding-large w3-margin-top" style="min-height: 500px;">
        <h3>CMC Workshop Management System</h3>
        <h3>Login Form</h3>

        <?php if (isset($_GET['login'])) { ?>

            <div class="w3-panel w3-red">
                <h4><strong>Attention!</strong> <?php echo $_GET['login']; ?> </h4>
            </div>

        <?php }

        else if (isset($error['login_error'])) { ?>

            <div class="w3-panel w3-red">
                <h4><strong>Attention!</strong> <?php echo $error['login_error']; ?></h4>
            </div>

        <?php } ?>

        <form action="<?php echo $GLOBALS['base_url']; ?>/LoginController/authenticate" method="post" target="_self">

            <div class="form-group">
                <label for="email">Username</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="user">
            </div>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>

            <button type="submit" class="w3-button w3-white" name="submit">Sign In</button>
        </form>
    </div>
</div>