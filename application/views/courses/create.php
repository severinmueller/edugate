 <h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('courses/create'); ?>
<div class="form-group">
    <label>Kursname</label>
    <input type="text" class="form-control" name="title" placeholder="Kursname">
</div>
        <div class="form-group">
            <label>Ort</label>
            <input type="text" class="form-control" name="location" placeholder="Kanton">
        </div>
        <div class="form-group">
            <label>Startdatum (optional)</label>
            <input type="date" class="form-control" name="start_date">
        </div>
<div class="form-group">
    <label>Beschreibung</label>
    <textarea name="body" id="editor"></textarea>
    <script>

        CKEDITOR.replace( 'editor', {
            customConfig: '/assets/js/CKEditConfigs.js'
        });

    </script>
</div>
<div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<button type="submit" class="button">Submit</button>
</form>

    </div>
</div>