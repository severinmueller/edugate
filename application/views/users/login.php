
<div id="main">
    <div class="inner">
        <?php echo form_open('users/login'); ?>
            <h1 class="text-center"><?php echo $title; ?></h1>
                <input type="text" name="email" class="form-control" placeholder="E-Mail-Adresse eingeben" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Passwort" required autofocus>
        <br>
            <button type="submit">Login</button>
        <?php echo form_close(); ?>

    </div>


</div>

