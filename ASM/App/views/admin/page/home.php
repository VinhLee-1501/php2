<script>
    var data = <?php echo json_encode($dataAll[0]); ?>;
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Lượng doanh thu</h3>
        <p class="text-subtitle text-muted">Tổng doanh thu theo tháng</p>
    </div>
    <section class="section">
        <div class="row mb-4">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class='card-heading p-1 pl-3'>Doanh thu sử dụng dịch vụ</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="pl-3">
                                    <?php
                                        $total = $dataAll[1][0];
                                    ?>
                                    <h3 class='mt-5'><?=number_format($total['Total'])?> VND</h3>
                                    <p class='text-xs'><span class="text-green">
                                            <i data-feather="bar-chart" width="20"></i> +19%</span>
                                        Hơn tháng trước</p>
<!--                                    <div class="legends">-->
<!--                                        <div class="legend d-flex flex-row align-items-center">-->
<!--                                            <div class='w-3 h-3 rounded-full bg-info mr-2'></div>-->
<!--                                            <span class='text-xs'>Tháng trước</span>-->
<!--                                        </div>-->
<!--                                        <div class="legend d-flex flex-row align-items-center">-->
<!--                                            <div class='w-3 h-3 rounded-full bg-blue mr-2'></div>-->
<!--                                            <span class='text-xs'>Tháng hiện tại</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div id="top_x_div"></div>

                                <script>
                                    google.charts.load('current', {'packages':['bar']});
                                    google.charts.setOnLoadCallback(drawStuff);

                                    function drawStuff() {

                                        var dataArray = [['Ngày', 'Doanh thu']];
                                        for (var i = 0; i < data.length; i++) {
                                            dataArray.push([data[i].date, Number(data[i].Total)]);
                                        }
                                        var data2 = google.visualization.arrayToDataTable(dataArray);

                                        var options = {
                                            width: 600,
                                            legend: { position: 'none' },
                                            bar: { groupWidth: "50%" }
                                        };

                                        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                                        chart.draw(data2, google.charts.Bar.convertOptions(options));
                                    };

                                </script>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>


