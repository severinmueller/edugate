<div id="main">
    <div class="inner">

        <h2>Meine Kurse</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                <tr>
                    <th>Kurs</th>
                    <th>Ort</th>
                    <th>Anbieter</th>
                    <th>Startdatum</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach($courses as $course) : ?>
                    <tr>
                        <td><a href="<?php echo site_url('/courses/'.$course['slug']); ?>"><?php echo $course['title']; ?></a></td>
                        <td><?php echo $course['location']; ?></td>
                        <td><?php echo $course['name']; ?></td>
                        <td><?php echo $course['start_date']; ?></td>
                        <td><a class="button" href="edit/<?php echo $course['slug'];?>">Bearbeiten</a></td>
                        <td><?php echo form_open('courses/delete/'.$course['id']); ?> <input type="submit" value="Löschen" class="button"></form></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</div>