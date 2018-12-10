<h2><?php $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('courses/update/'.$course['courseid']); ?>
<div class="form-group">
    <label>Ort</label>
    <input type="text" class="form-control" name="location" placeholder="Ort" value="<?php echo html_purify($course['location'])?>">
</div>
<br>
<div class="form-group">
    <label>Startdatum (optional)</label>
    <input type="date" class="form-control" name="start_date" value="<?php echo html_purify($course['start_date'])?>">
</div>
<br>
<div class="form-group">
    <label>Body</label>
    <textarea name="body" id="editor"><?php echo html_purify($course['body'])?></textarea>
    <script>

        CKEDITOR.replace( 'editor', {
            customConfig: '/assets/js/CKEditConfigs.js'
        });

    </script>

<button type="submit" class="button">Submit</button>
<br>
<div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
</form>


</div>
</div>
