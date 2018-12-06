<h2><?php echo $course['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $course['created_at']; ?></small>
<div class=post-body">
    <?php  $clean_body = html_purify($course['body']); echo $clean_body; ?>

</div>

<?php if($this->session->userdata('user_id') == $course['user_id']): ?>
<hr>
<a class="btn btn-default" href="edit/<?php echo $course['slug'];?>">Edit</a>
<?php echo form_open('courses/delete/'.$course['id']); ?>
<input type="submit" value="Delete" class="btn btn-danger">
</form>
<?php endif; ?>
<hr>

<hr>
