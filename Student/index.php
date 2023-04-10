<?php 
    require_once './includes/header.php';
?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <!-- widgets  -->
                                  <?php include "widgets.php"; ?>






                                  <!-- drow the chart -->
                                  <script type="text/javascript">
                                    google.charts.load('current', {'packages':['bar']});
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                        ['Data', ''],
                                        ['Course', '<?php echo $course_count; ?>'],
                                        ['Student', <?php echo $student_count; ?>],
                                        ['Faculty', <?php echo $faculty_count; ?>],
                                        ['Exam', <?php echo $exam_count; ?>],
                                        ['Video', <?php echo $video_count; ?>],
                                        ['Note', <?php echo $note_count; ?>]
                                        ]);

                                        var options = {
                                        chart: {
                                            title: '',
                                            subtitle: '',
                                        }
                                        };

                                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                        chart.draw(data, google.charts.Bar.convertOptions(options));
                                    }
                                </script>
                                <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

                                  <!-- chart ending -->

        <!-- Footer -->
      <?php
        require_once './includes/footer.php'
      ?>