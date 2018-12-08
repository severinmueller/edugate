


<div id="main">
    <div class="inner">
        <?php echo validation_errors(); ?>
    <?php echo form_open('users/register'); ?>

<div class="form-group">
    <label>E-Mail-Adresse</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
</div>
        <div class="form-group">
            <label>Name der Organisation</label>
            <input type="text" class="form-control" name="name" placeholder="z. B. FHNW">
        </div>
<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
</div>
<div class="form-group">
    <label>Confirm password</label>
    <input type="password" class="form-control" name="password2" placeholder="Confirm password">
</div>
<button type="submit" class="button">Submit</button>

<php echo form_close(); ?>
    </div>


</div>

