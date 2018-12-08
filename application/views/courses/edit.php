<h2><?php $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('courses/update/'.$course['id']); ?>
<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add title..." value="<?php echo $course['title']?>">
</div>
<div class="form-group">
    <label>Body</label>
    <textarea name="body" id="editor"><?php echo html_purify($course['body'])?></textarea>
    <script>

        CKEDITOR.replace( 'editor', {
            customConfig: '/assets/js/CKEditConfigs.js'
        });

    </script>
</div>

</div>
<button type="submit" class="button">Submit</button>

<div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
</form>

