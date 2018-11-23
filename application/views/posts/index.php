<?php foreach($posts as $post) : ?>
<h3><?php echo $post['title']; ?></h3>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>
<?php echo $post['body']; ?>
    <a href="<?php echo site_url('posts/'.$post['slug']); ?>" Read more</></p>
<?php endforeach; ?>