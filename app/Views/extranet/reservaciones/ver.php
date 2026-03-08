<div class="container-fluid">
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
</div>