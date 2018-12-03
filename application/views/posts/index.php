<?php foreach($posts as $post) : ?>
<h3><?php echo $post['title']; ?></h3>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?> in <?php echo $post['name'];?></small>
<?php echo word_limiter($post['body'], 50); ?>
<br>
    <p><a class="btn btn-outline-dark" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a></p>
<?php endforeach; ?>

<?php echo $HOME; ?>


