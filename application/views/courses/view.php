        <hr>
<h2><?php echo $course['title']; ?></h2>

        <ul class="alt">
            <li><b>Anbieter:</b> <?php echo $course['name']; ?></li>
            <li><b>Ort:</b> <?php echo $course['location']; ?></li>
            <?php if (!empty($course['start_date'])): ?><li><b>Startdatum:</b> <?php echo $course['start_date']; ?></li> <?php endif; ?>
            <li><b>Beschreibung:</b></li>
        </ul>
<div class=post-body">
    <?php  $clean_body = html_purify($course['body']); echo $clean_body; ?>
</div>

<hr>

        <a class="button" href="javascript:history.go(-1)">Zurück</a>
    </div>
</div>