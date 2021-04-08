<?php require_once "config.php"; ?>
<?php require_once "header.php"; ?>

<div class="row">
    <div class="col-md-4 offset-md-4">
        <?php if(isset($_SESSION['memories_error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_SESSION['memories_error'];
                    unset($_SESSION['memories_error']);
                ?>
            </div>
        <?php } ?>
        <form method="post" action="login_do.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                       value="<?= $username; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<?php require_once "footer.php"; ?>
