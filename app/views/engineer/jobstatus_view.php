
<div class="w3-container w3-padding-large">

    <?php
    if (isset($data['message'])) {
        echo "<h4 style='color: green;'>" . $data['message'] . "</h4>";
    } ?>
</div>

<div class="w3-row-padding">
    <div class="w3-container w3-margin-bottom">
        <div class="w3-container w3-white w3-padding-large">
            <div class="row-content">
                <div class="w3-panel w3-teal">
                    <h3>Open Jobs</h3>
                </div>
                <div class="w3-margin-bottom scroll">
                    <table class="w3-table-all w3-centered">
                        <thead>
                        <tr>
                            <td>Job Id</td>
                            <td>Vehicle Id</td>
                            <td>Job Open Date</td>
                            <td>Description</td>
                        </tr>
                        </thead>

                        <tbody>

                        <?Php
                        if($data['table1'] != 0) {

                            foreach ($data['table1'] as $value) { ?>

                        <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td><?php echo $value['id_vehicle']; ?></td>
                            <td><?php echo $value['date']; ?></td>
                            <td><?php echo $value['description']; ?></td>
                        </tr>


                        <?php
                            }
                        }
                        else { ?>

                        <tr>
                            <td colspan="4">No open jobs available</td>
                        </tr>

                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="w3-panel w3-teal">
                    <h3>Assigned Jobs</h3>
                </div>
                <div class="w3-margin-bottom scroll">
                    <table class="w3-table-all w3-centered">
                        <thead>
                        <tr>
                            <td>Job Id</td>
                            <td>Vehicle Id</td>
                            <td>Job Open Date</td>
                            <td>Description</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($data['table2'] != 0) {

                            foreach ($data['table2'] as $value) {

                                echo "                                       
                                                        <tr>
                                                             <td>". $value['id'] . "</td>
                                                             <td> ". $value['id_vehicle'] . "</td>
                                                              <td> ". $value['date'] . "</td>
                                                              <td>" . $value['description'] . "</td>
                                                        </tr>";
                            }
                        }
                        else {
                            echo "<tr><td colspan='4'>No jobs available to assign</td>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="w3-panel w3-teal">
                    <h3>Ongoing Jobs</h3>
                </div>
                <div class="w3-margin-bottom scroll">
                    <table class="w3-table-all w3-centered">
                        <thead>
                        <tr>
                            <td>Job Id</td>
                            <td>Vehicle Id</td>
                            <td>Job Open Date</td>
                            <td>Description</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?Php
                        if($data['table3'] != 0) {

                            foreach ($data['table3'] as $value) {

                                echo "                                       
                                                        <tr>
                                                             <td>". $value['id'] . "</td>
                                                             <td> ". $value['id_vehicle'] . "</td>
                                                              <td> ". $value['date'] . "</td>
                                                              <td>" . $value['description'] . "</td>
                                                        </tr>";
                            }
                        }
                        else {
                            echo "<tr><td colspan='4'>No jobs pending</td></tr>";
                        }

                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="w3-panel w3-teal">
                    <h3>Completed Jobs</h3>
                </div>
                <div class="w3-margin-bottom scroll">
                    <table class="w3-table-all w3-centered">
                        <thead>
                        <tr>
                            <td>Job Id</td>
                            <td>Vehicle Id</td>
                            <td>Job Open Date</td>
                            <td>Description</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($data['table4'] != 0) {

                            foreach ($data['table4'] as $value) {

                                echo "                                       
                                                        <tr>
                                                             <td>". $value['id'] . "</td>
                                                             <td> ". $value['id_vehicle'] . "</td>
                                                              <td> ". $value['date'] . "</td>
                                                              <td>" . $value['description'] . "</td>
                                                        </tr>";
                            }
                        }
                        else {
                            echo "<tr><td colspan='4'>-</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
























            </div>
        </div>
    </div>
</div>














































