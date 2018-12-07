<div id="main">
    <div class="inner">

<h2>Table</h2>
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
            <td><?php echo $course['title']; ?></td>
            <td><a class="btn btn-outline-dark" href="<?php echo site_url('/courses/'.$course['slug']); ?>">Read More</a></td>
            <td><?php echo $course['name']; ?></td>
            <td>29.99</td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

    </div>
</div>
