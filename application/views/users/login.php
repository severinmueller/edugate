
<div id="main">
    <div class="inner">
        <?php echo form_open('users/login'); ?>
            <h1 class="text-center"><?php echo $title; ?></h1>
                <input type="text" name="username" class="form-control" placeholder="Enter username" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required autofocus>
        <br>
            <input type="checkbox" id="autologin" name="autologin" value="1" /><label for="autologin">Angemeldet bleiben</label>
        <br>
            <button type="submit">Login</button>
        <?php echo form_close(); ?>

    </div>


</div>

