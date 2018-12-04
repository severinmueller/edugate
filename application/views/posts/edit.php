<h2><?php $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update/'.$post['id']); ?>
<div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add title..." value="<?php echo $post['title']?>">
</div>
<div class="form-group">
    <label>Body</label>
    <textarea id="editor" class="form-control" name="body" placeholder="Add body..."><?php echo $post['body']?></textarea>
    <textarea name="body" id="editor"><?php echo html_purify($post['body'])?></textarea>
    <script>

        CKEDITOR.replace( 'editor', {
            customConfig: '/assets/js/CKEditConfigs.js'
        });

    </script>
</div>

</div>
<button type="submit" class="btn btn-default">Submit</button>

<div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
</form>



<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
