<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Lượng check-in</h3>
        <p class="text-subtitle text-muted">Tổng doanh thu theo tháng</p>
    </div>
    <section class="section">
        <div class="row mb-4">
            <?php
            echo $nati['mess'];
            ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class='card-heading p-1 pl-3'>Doanh thu sử dụng dịch vụ</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="pl-3">
                                    <h1 class='mt-5'>$21,102</h1>
                                    <p class='text-xs'><span class="text-green">
                                            <i data-feather="bar-chart" width="15"></i> +19%</span>
                                        Hơn tháng trước</p>
                                    <div class="legends">
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-info mr-2'></div>
                                            <span class='text-xs'>Tháng trước</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-blue mr-2'></div>
                                            <span class='text-xs'>Tháng hiện tại</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <canvas id="bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>