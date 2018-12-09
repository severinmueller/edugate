<div id="main">
    <div class="inner">

<h2><?php echo $course['title']; ?></h2>

        <ul class="alt">
            <li>Anbieter: <?php echo $course['name']; ?></li>
            <li>Ort: <?php echo $course['location']; ?></li>
            <?php if (!empty($course['start_date'])): ?><li>Startdatum: <?php echo $course['start_date']; ?></li> <?php endif; ?>
        </ul>
        <br>
<div class=post-body">
    <?php  $clean_body = html_purify($course['body']); echo $clean_body; ?>

</div>

<hr>

    </div>
</div>