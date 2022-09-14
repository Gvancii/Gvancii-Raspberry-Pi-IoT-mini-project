<?php
include 'db.php';
$conn = OpenCon();
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style>
    @import url("css/style.css");
    @import url("css/tab.css");
</style>


<body class="w3-black">


    <!-- Page Content -->
    <div class="w3-padding-large" id="main">
        <!-- Header/Home -->


        <!-- About Section -->
        <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">






            <div class="tabs">
                <div class="tab-3">
                    <label for="tab3-1">Temperature</label>
                    <input id="tab3-1" name="tabs-two" type="radio" checked="checked">
                    <div>
                        <div id="curve_chart" style="width: 900px; height: 500px"></div>
                    </div>
                </div>
                <div class="tab-4">
                    <label for="tab3-2">Pressure</label>
                    <input id="tab3-2" name="tabs-two" type="radio">
                    <div>

                        <div id="curve_chart2" style="width: 900px; height: 500px"></div>
                    </div>
                </div>
                <div class="tab-3">
                    <label for="tab3-3">Altitude</label>
                    <input id="tab3-3" name="tabs-two" type="radio">
                    <div>

                        <div id="curve_chart3" style="width: 900px; height: 500px"></div>
                    </div>
                </div>
            </div>

            <!-- Portfolio Section -->


        </div>



        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);
            google.charts.setOnLoadCallback(drawChart2);
            google.charts.setOnLoadCallback(drawChart3);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['time', 'Temperature'],
                    <?php
                    $query = "SELECT * FROM iot_";
                    $res = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_array($res)) {
                        $time = $data['time'];
                        $temp = $data['temperature'];
                    ?>['<?php echo $time; ?>', <?php echo $temp; ?>],
                    <?php
                    }
                    ?>
                ]);

                var options = {
                    title: 'Temperature Measurements',
                    hAxis: {
                        title: 'Time'
                    },
                    backgroundColor: '#f1f8e9',
                    vAxis: {
                        title: 'Temperature(°C)'
                    },
                    colors: ['#a52714', '#097138']
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }

            function drawChart2() {
                var data = google.visualization.arrayToDataTable([
                    ['time', 'Pressure'],
                    <?php
                    $query = "SELECT * FROM iot_";
                    $res = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_array($res)) {
                        $time = $data['time'];
                        $pre = $data['pressure'];
                    ?>['<?php echo $time; ?>', <?php echo $pre; ?>],
                    <?php
                    }
                    ?>
                ]);

                var options = {
                    title: 'PRESSURE',
                    hAxis: {
                        title: 'Time'
                    },
                    backgroundColor: '#f1f8e9',
                    vAxis: {
                        title: 'Pressure(hpa)'
                    },
                    colors: ['#a52714', '#097138']
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

                chart.draw(data, options);
            }

            function drawChart3() {
                var data = google.visualization.arrayToDataTable([
                    ['time', 'Altitude'],
                    <?php
                    $query = "SELECT * FROM iot_";
                    $res = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_array($res)) {
                        $time = $data['time'];
                        $alt = $data['altitude'];
                    ?>['<?php echo $time; ?>', <?php echo $alt; ?>],
                    <?php
                    }
                    ?>
                ]);

                var options = {
                    title: 'ALTITUDE(m)',
                    hAxis: {
                        title: 'Time'
                    },
                    backgroundColor: '#f1f8e9',
                    vAxis: {
                        title: 'Altitude'
                    },
                    colors: ['#BCD4E2', '#097138']
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart3'));

                chart.draw(data, options);
            }
        </script>


        <!-- END PAGE CONTENT -->
    </div>

</body>

</html>