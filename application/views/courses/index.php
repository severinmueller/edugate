<div id="main">
    <div class="inner">

        <?php echo $emaildebug ?>
<h2><?php echo $data['title'] ?></h2>
<div class="table-wrapper">
    <table>
        <thead>
        <tr>
            <th>Kurs</th>
            <th>Ort</th>
            <th>Anbieter</th>
            <th>Startdatum</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($courses as $course) : ?>
        <tr>
            <td><a href="<?php echo site_url('/courses/'.$course['slug']); ?>"><?php echo $course['title']; ?></a></td>
            <td><?php echo $course['location']; ?></td>
            <td><?php echo $course['name']; ?></td>
            <td><?php echo $course['date']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

    </div>
</div>
