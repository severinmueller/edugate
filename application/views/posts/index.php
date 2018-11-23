<?php foreach($posts as $post) : ?>
<h3><?php echo $post['title']; ?></h3>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>
<?php echo $post['body']; ?>
<br>

<?php endforeach; ?>