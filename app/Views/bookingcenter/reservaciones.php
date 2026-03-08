<main class="main">
    <div class="site-breadcrumb">
        <div class="container">
        </div>
    </div>

    <div class="reservations-list-area py-5">
        <div class="container">
            <div class="row mb-4 align-items-center">
                <div class="col-md-8">
                    <h4 class="mb-1">Reservas de: <span class="text-primary"><?= $agencia ?? 'Agencia' ?></span></h4>
                    <p class="text-muted mb-0">Gestiona y consulta el estado de tus transacciones.</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="bg-light d-inline-block p-3 rounded border">
                        <span class="d-block small text-muted text-uppercase fw-bold">Total de Reservas</span>
                        <span class="h4 mb-0"><?= $total ?></span>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Buscar por Folio o Huésped...">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Cualquier Estado</option>
                                <option value="1">Confirmada</option>
                                <option value="2">Pendiente</option>
                                <option value="0">Cancelada</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Folio / Fecha</th>
                                <th>Huésped</th>
                                <th>Hotel y Plan</th>
                                <th>Estancia</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($reservaciones)): ?>
                                <?php foreach($reservaciones as $row): 
                                    // Lógica de colores para el estado
                                    $statusClass = 'bg-secondary';
                                    $statusName = 'Desconocido';
                                    switch($row['estado_reservacion']) {
                                        case 1: $statusClass = 'bg-success'; $statusName = 'Confirmada'; break;
                                        case 2: $statusClass = 'bg-warning text-dark'; $statusName = 'Pendiente'; break;
                                        case 0: $statusClass = 'bg-danger'; $statusName = 'Cancelada'; break;
                                    }
                                ?>
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold d-block text-primary"><?= $row['folio_reservacion'] ?></span>
                                        <small class="text-muted"><?= date('d/m/Y H:i', strtotime($row['fecha_creacion_reservacion'])) ?></small>
                                    </td>
                                    <td>
                                        <div class="fw-bold"><?= $row['nombre_cliente_reservacion'] ?> <?= $row['apellidos_cliente_reservacion'] ?></div>
                                        <small class="text-muted"><i class="far fa-envelope"></i> <?= $row['email_cliente_reservacion'] ?></small>
                                    </td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 200px;"><strong><?= $row['nombre_hotel'] ?></strong></div>
                                        <small class="text-muted"><?= $row['nombre_tipo_plan'] ?></small>
                                    </td>
                                    <td>
                                        <div><i class="far fa-calendar-alt text-primary"></i> <?= date('d M', strtotime($row['llegada_reservacion'])) ?> - <?= date('d M', strtotime($row['salida_reservacion'])) ?></div>
                                        <small class="text-muted"><?= $row['adultos_reservacion'] ?> Adu, <?= $row['menores_reservacion'] ?> Men</small>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-dark">$<?= number_format($row['total_reservacion'], 2) ?></span>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill <?= $statusClass ?>"><?= $statusName ?></span>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('Booking/Confirmacion/'.$row['folio_reservacion']) ?>" class="btn btn-sm btn-outline-primary">
                                            <i class="far fa-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" width="80" class="mb-3 opacity-50">
                                        <p class="text-muted">No se encontraron reservaciones para esta agencia.</p>
                                        <a href="<?= base_url('Booking') ?>" class="btn btn-primary btn-sm">Hacer mi primera reserva</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>