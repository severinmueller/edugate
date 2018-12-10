        <h2>Meine Kurse</h2>
        <div class="table-wrapper">
            <table>
                <thead>
                <tr>
                    <th onclick="sortTable(0)">Kurs</th>
                    <th onclick="sortTable(1)">Ort</th>
                    <th onclick="sortTable(2)">Anbieter</th>
                    <th onclick="sortTable(3)">Startdatum</th>
                    <th onclick="sortTable(4)">Bearbeiten</th>
                    <th onclick="sortTable(5)">Löschen</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach($courses as $course) : ?>
                    <tr>
                        <td><a href="<?php echo site_url('/courses/'.$course['slug']); ?>"><?php echo html_purify($course['title']); ?></a></td>
                        <td><?php echo html_purify($course['location']); ?></td>
                        <td><?php echo html_purify($course['name']); ?></td>
                        <td><?php echo html_purify($course['start_date']); ?></td>
                        <td><a class="button" href="edit/<?php echo $course['slug'];?>">Bearbeiten</a></td>
                        <td><a class="button" href="delete/<?php echo $course['courseid'];?>">Löschen</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</div>

        <script>
            // sort table function copied from w3schools.com
            function sortTable(n) {
                var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                table = document.getElementById("myTable");
                switching = true;
                // Set the sorting direction to ascending:
                dir = "asc";
                /* Make a loop that will continue until
                no switching has been done: */
                while (switching) {
                    // Start by saying: no switching is done:
                    switching = false;
                    rows = table.rows;
                    /* Loop through all table rows (except the
                    first, which contains table headers): */
                    for (i = 1; i < (rows.length - 1); i++) {
                        // Start by saying there should be no switching:
                        shouldSwitch = false;
                        /* Get the two elements you want to compare,
                        one from current row and one from the next: */
                        x = rows[i].getElementsByTagName("TD")[n];
                        y = rows[i + 1].getElementsByTagName("TD")[n];
                        /* Check if the two rows should switch place,
                        based on the direction, asc or desc: */
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                // If so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                // If so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                    if (shouldSwitch) {
                        /* If a switch has been marked, make the switch
                        and mark that a switch has been done: */
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        // Each time a switch is done, increase this count by 1:
                        switchcount ++;
                    } else {
                        /* If no switching has been done AND the direction is "asc",
                        set the direction to "desc" and run the while loop again. */
                        if (switchcount == 0 && dir == "asc") {
                            dir = "desc";
                            switching = true;
                        }
                    }
                }
            }
        </script>
