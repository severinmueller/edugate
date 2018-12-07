<?php foreach($courses as $course) : ?>
    <h3><?php echo $course['title']; ?></h3>
    <?php echo html_purify(word_limiter($course['body'], 50)); ?>
    <br>
    <p><a class="btn btn-outline-dark" href="<?php echo site_url('/courses/'.$course['slug']); ?>">Read More</a></p>
<?php endforeach; ?>

<?php echo "hallo"?>



