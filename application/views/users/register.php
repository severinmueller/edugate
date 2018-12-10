    <?php echo validation_errors(); ?>
    <?php echo form_open('users/register'); ?>
    <h1 class="text-center"><?php echo $title; ?></h1>

<div class="form-group">
    <label>E-Mail-Adresse</label>
    <input type="email" class="form-control" name="email" placeholder="E-Mail-Adresse">
</div>
        <div class="form-group">
            <label>Name der Organisation</label>
            <input type="text" class="form-control" name="name" placeholder="z. B. FHNW">
        </div>
<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Passwort">
</div>
<div class="form-group">
    <label>Confirm password</label>
    <input type="password" class="form-control" name="password2" placeholder="Passwort bestätigen">
</div>
    <br>
<button type="submit" class="button">Registrieren</button>

<?php echo form_close(); ?>
    </div>


</div>

