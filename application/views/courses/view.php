<div id="main">
    <div class="inner">

<h2><?php echo $course['title']; ?></h2>
<h3>Anbieter: <?php echo $course['name']; ?></h3>
<h3>Ort: <?php echo $course['name']; ?></h3>
<?php if (!empty($course['start_date'])): ?><h3>Startdatum: <?php echo $course['start_date']; ?></h3> <?php endif; ?>


<div class=post-body">
    <?php  $clean_body = html_purify($course['body']); echo $clean_body; ?>

</div>

<hr>

    </div>
</div>