<div class="container">

    <h2>Login Form</h2>

    <?php if (isset($error['login_error'])) { ?>

    <div class="alert alert-danger">
        <strong>Attention!</strong> <?php echo $error['login_error']; ?>
    </div>

    <?php } ?>

    <form action="<?php echo $GLOBALS['base_url']; ?>/loginCon/authenticate" method="post" target="_self">

        <div class="form-group">
            <label for="email">Username</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="user">
        </div>

        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
        </div>

        <button type="submit" class="btn btn-default" name="submit">Sign In</button>
    </form>
</div>