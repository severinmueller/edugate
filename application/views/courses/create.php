<h2><?php $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('courses/create'); ?>
<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add title...">
</div>
<div class="form-group">
    <label>Body</label>
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