        <?php echo form_open('users/reset2/'.$token1); ?>
   <div class="form-group">
    <label>Neues Passwort</label>
    <input type="password" class="form-control" name="password" placeholder="Passwort">
</div>
<div class="form-group">
    <label>Passwort bestätigen</label>
    <input type="password" class="form-control" name="password2" placeholder="Passwort bestätigen">
</div>
        <br>
<button type="submit" class="button">Passwort zurücksetzen</button>
        <?php echo form_close(); ?>

    </div>


</div>

