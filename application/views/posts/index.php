<?php foreach($posts as $post) : ?>
<h3><?php echo $post['title']; ?></h3>
<small>Posted on: <?php echo $post['created_at']; ?></small>
<?php echo $post['body']; ?>
<?php endforeach; ?>