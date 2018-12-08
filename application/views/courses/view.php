<h2><?php echo $course['title']; ?></h2>
<div class=post-body">
    <?php  $clean_body = html_purify($course['body']); echo $clean_body; ?>

</div>

<hr>
