<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>
<div class=post-body">
    <?php  // $clean_body = html_purify($post['body']); echo $clean_body; ?>
    <?php echo $post['body']; ?>
</div>

<hr>
<?php echo form_open('posts/delete/'.$post['id']); ?>
<a class="btn btn-default" href="edit/<?php echo $post['slug'];?>">Edit</a>
<input type="submit" value="Delete" class="btn btn-danger">
</form>

<hr>
<?php echo form_open('comments/create/'.$post['id']); ?>
    <div class="form-group">
        <label>Name</label>
    <input type="text" name="name" class="form-control">
    </div>
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control">
</div>
<div class="form-group">
    <label>Body</label>
    <textarea name="name" class="form-control"></textarea>
</div>
<button type="submit"></button>
</form>


