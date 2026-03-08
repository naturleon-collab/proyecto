<div class="container-fluid">
    <?php 
    function MesActual() {
        $meses = [
            "01" => "Enero", "02" => "Febrero", "03" => "Marzo", "04" => "Abril",
            "05" => "Mayo", "06" => "Junio", "07" => "Julio", "08" => "Agosto",
            "09" => "Septiembre", "10" => "Octubre", "11" => "Noviembre", "12" => "Diciembre"
        ];
        return $meses[date("m")] ?? "Enero";
    }

    // Validación segura del rol de usuario
    $rol = $usuario['tipo_usuario'];
    ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <?= ($rol == 'admin') ? 'Panel de Control' : 'Reservaciones'; ?> - <?= MesActual()." ".date("Y"); ?>
        </h1>
    </div>

    <?php if($rol == 'admin'): ?>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-bottom-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ingresos Totales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?= number_format($stats['ingresos'], 2); ?></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-bottom-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tarifa Promedio (Noche)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?= number_format($stats['tarifa_promedio'], 2); ?></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-bed fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Reservaciones</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['total_reservas']; ?></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-calendar-check fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-bottom-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">% Cancelaciones</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['porcentaje_cancelacion']; ?>%</div>
                            </div>
                            <div class="col-auto"><i class="fas fa-calendar-times fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">  
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">FILTRAR RESERVACIONES</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-2">
                            <label class="form-label">Fecha Llegada</label>
                            <input type="date" class="form-control" id="fechafiltro">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Fecha Reserva</label>
                            <input type="date" class="form-control" id="reservafiltro">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Rango de Fechas</label>
                            <input type="text" class="daterangefilter form-control" id="rangofiltro">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Nombre Cliente</label> 
                            <input class="form-control" type="text" id="nombrefiltro"> 
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Estado</label> 
                            <select id="tipofiltro" class="form-control">
                                <option value="-1">Todas</option>
                                <option value="2">Confirmada</option>
                                <option value="3">Cancelada</option>
                            </select> 
                        </div>
                        <div class="col-12 mt-3 text-center">
                            <a href="#">
                                <button class="btn btn-primary" type="button"><strong>BUSCAR</strong></button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if($rol == 'hotel'): ?>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE RESERVACIONES</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Folio / Agencia</th>
                                    <th>Hotel / Habitación</th>
                                    <th>Huéspedes / Plan</th>
                                    <th>Estancia</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($reservas)){ foreach($reservas as $r){ ?>
                                <tr>
                                    <td>
                                        <span class="font-weight-bold">#<?= $r['folio_reservacion']; ?></span><br>
                                        <small class="text-primary"><?= $r['nombre_agencia']; ?></small>
                                    </td>
                                    <td>
                                        <span class="d-block font-weight-bold text-dark"><?= $r['nombre_hotel']; ?></span>
                                        <small class="text-muted"><?= $r['nombre_habitacion']; ?></small>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-dark">
                                            <i class="fas fa-users mr-1"></i> 
                                            <?= $r['adultos_reservacion']; ?> Adl. 
                                            <?php if($r['menores_reservacion'] > 0): ?>
                                                / <?= $r['menores_reservacion']; ?> Men.
                                            <?php endif; ?>
                                        </span><br>
                                        <small class="font-italic"><?= $r['nombre_tipo_plan']; ?></small>
                                    </td>
                                    <td>
                                        <div style="font-size: 0.8rem;">
                                            <span class="text-success">Llegada: <?= date("d/m/Y", strtotime($r['llegada_reservacion'])); ?></span><br>
                                            <span class="text-danger">Salida: <?= date("d/m/Y", strtotime($r['salida_reservacion'])); ?></span>
                                        </div>
                                    </td>
                                    <td class="font-weight-bold">$<?= number_format($r['total_reservacion'], 2); ?></td>
                                    <td class="text-center">
                                        <span class="badge <?= ($r['estado_reservacion'] == 1) ? 'badge-success' : 'badge-warning'; ?>">
                                            <?= ($r['estado_reservacion'] == 1) ? 'Confirmada' : 'Pendiente'; ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary" onclick="DetalleCompleto(<?= $r['id_reservacion']; ?>)">
                                            <i class="fas fa-list"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($rol == 'admin'): ?>
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-easycheck">
                        <h6 class="m-0 font-weight-bold text-white">RESUMEN DE INGRESOS (<?= date("Y"); ?>)</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-easycheck">
                        <h6 class="m-0 font-weight-bold text-white">TOP FUENTES DE INGRESOS (<?= date("Y"); ?>)</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <?php
                            $colores = ['text-primary', 'text-success', 'text-info', 'text-warning', 'text-danger'];
                            foreach($chartPieLabels as $index => $label): ?>
                                <span class="mr-2">
                                    <i class="fas fa-circle <?= $colores[$index] ?? 'text-secondary'; ?>"></i> <?= $label; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url("assets/extranet/vendor/chart.js/Chart.min.js"); ?>"></script>
        <script>
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            const barLabels = <?= json_encode($chartBarLabels); ?>;
            const barData = <?= json_encode($chartBarData); ?>;
            const pieLabels = <?= json_encode($chartPieLabels); ?>;
            const pieData = <?= json_encode($chartPieData); ?>;
            
            new Chart(document.getElementById("myBarChart"), {
                type: 'bar',
                data: {
                    labels: barLabels,
                    datasets: [{ label: "Ingresos", backgroundColor: "#4e73df", data: barData }],
                },
                options: {
                    maintainAspectRatio: false,
                    scales: { 
                        yAxes: [{ 
                            ticks: { 
                                callback: v => '$' + v.toLocaleString('en-US') 
                            } 
                        }] 
                    },
                    legend: { display: false }
                }
            });

            new Chart(document.getElementById("myPieChart"), {
                type: 'doughnut',
                data: {
                    labels: pieLabels,
                    datasets: [{ 
                        data: pieData,
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b'] 
                    }]
                },
                options: { 
                    maintainAspectRatio: false, 
                    cutoutPercentage: 80, 
                    legend: { display: false },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var total = dataset.data.reduce((prev, curr) => prev + curr, 0);
                                var currentValue = dataset.data[tooltipItem.index];
                                var percentage = ((currentValue/total) * 100).toFixed(2);
                                return data.labels[tooltipItem.index] + ': $' + currentValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            });
        </script>
    <?php endif; ?>
</div>