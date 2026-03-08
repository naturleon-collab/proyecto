<main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb">
            <div class="container">
                <!-- <h2 class="breadcrumb-title">Rooms</h2> -->
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- <pre class="small text-start"><?php print_r($dataDestino); ?></pre> -->

        <script>
            const paramsExistentes = <?= json_encode($params) ?>;
        </script>

        <!-- room area -->
        <div class="room-area bg-light py-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="search-area search-area-light pb-120">
                            <div class="container">
                                <ul class="nav nav-tabs justify-content-center" id="searchTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="alojamiento-tab" data-bs-toggle="tab" data-bs-target="#alojamiento-form" type="button" role="tab" aria-controls="alojamiento-form" aria-selected="true">
                                            Alojamiento
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="naturcharter-tab" data-bs-toggle="tab" data-bs-target="#naturcharter-form" type="button" role="tab" aria-controls="naturcharter-form" aria-selected="false">
                                            NaturCharter
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="naturflight-tab" data-bs-toggle="tab" data-bs-target="#naturflight-form" type="button" role="tab" aria-controls="naturflight-form" aria-selected="false">
                                            NaturFlight
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tour-tab" data-bs-toggle="tab" data-bs-target="#tour-form" type="button" role="tab" aria-controls="tour-form" aria-selected="false">
                                            Tours
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="asientos-tab" data-bs-toggle="tab" data-bs-target="#asientos-form" type="button" role="tab" aria-controls="asientos-form" aria-selected="false">
                                            Asientos
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="searchTabsContent"> 
                                    <div class="tab-pane fade show active" id="alojamiento-form" role="tabpanel" aria-labelledby="alojamiento-tab">
                                        <div class="search-form-wrapper">
                                            <form id="formMotorBusqueda">
                                                <div class="row align-items-end">
                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label><i class="fas fa-map-marker-alt"></i> Destino</label>
                                                            <input type="text" id="destino_nombre" class="form-control" placeholder="¿A dónde vas?" autocomplete="off" value="<?= $dataDestino[0]['nombre_destino'] ?? '' ?>">
                                                            <input type="hidden" id="destino_id" name="destino_id" value="<?= $params['destino'] ?? '' ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label><i class="fas fa-calendar-alt"></i> Fechas</label>
                                                            <?php 
                                                                $rango = "";
                                                                if(!empty($params['checkin']) && !empty($params['checkout'])){
                                                                    $rango = $params['checkin'] . " - " . $params['checkout'];
                                                                }
                                                            ?>
                                                            <input type="text" id="fechas_rango" class="form-control date-range-picker" placeholder="Entrada - Salida" value="<?= $rango ?>">
                                                            <input type="hidden" id="checkin" name="checkin" value="<?= $params['checkin'] ?? '' ?>">
                                                            <input type="hidden" id="checkout" name="checkout" value="<?= $params['checkout'] ?? '' ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-lg-1">
                                                        <div class="form-group">
                                                            <label>Habs.</label>
                                                            <select id="habitaciones" name="habitaciones" class="form-control">
                                                                <?php for($i=1; $i<=5; $i++): ?>
                                                                    <option value="<?= $i ?>" <?= (isset($params['habitaciones']) && $params['habitaciones'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
                                                                <?php endfor; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-lg-1">
                                                        <div class="form-group">
                                                            <label>Adultos</label>
                                                            <select id="adultos" name="adultos" class="form-control">
                                                                <?php for($i=1; $i<=10; $i++): ?>
                                                                    <option value="<?= $i ?>" <?= (isset($params['adultos']) && $params['adultos'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
                                                                <?php endfor; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-lg-1">
                                                        <div class="form-group">
                                                            <label>Menores</label>
                                                            <select id="menores" name="menores" class="form-control">
                                                                <?php for($i=0; $i<=4; $i++): ?>
                                                                    <option value="<?= $i ?>" <?= (isset($params['menores']) && $params['menores'] == $i) ? 'selected' : '' ?>><?= $i ?></option>
                                                                <?php endfor; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-lg-3">
                                                        <button type="button" id="btnBuscarMotor" class="search-btn w-100">
                                                            <i class="far fa-search"></i> BUSCAR AHORA
                                                        </button>
                                                    </div>
                                                </div>

                                                <div id="DivEdadesMenores" class="row mt-3" style="<?= (isset($params['menores']) && $params['menores'] > 0) ? '' : 'display:none;' ?>">
                                                    <?php if(!empty($params['edades'])): ?>
                                                        <?php 
                                                        $edades = explode(',', $params['edades']); 
                                                        foreach($edades as $index => $edad): 
                                                        ?>
                                                            <div class="col-md-2 mb-2">
                                                                <label class="small">Edad Menor <?= $index + 1 ?></label>
                                                                <select name="edad_menor[]" class="form-control form-control-sm select-edad">
                                                                    <?php for($e=0; $e<=17; $e++): ?>
                                                                        <option value="<?= $e ?>" <?= ($edad == $e) ? 'selected' : '' ?>><?= $e ?> años</option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="naturcharter-form" role="tabpanel" aria-labelledby="naturcharter-tab">
                                        
                                    </div>

                                    <div class="tab-pane fade" id="naturflight-form" role="tabpanel" aria-labelledby="naturflight-tab">
                                        
                                    </div>
                                    
                                    <div class="tab-pane fade" id="tour-form" role="tabpanel" aria-labelledby="tour-tab">
                                        
                                    </div>

                                    <div class="tab-pane fade" id="asientos-form" role="tabpanel" aria-labelledby="asientos-tab">
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4"><i class="fas fa-filter me-2 text-primary"></i>Filtrar Búsqueda</h5>

                                <div class="filter-group mb-4">
                                    <h6 class="fw-bold small text-uppercase text-muted mb-3">Planes</h6>
                                    <?php foreach($planes as $plan): ?>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input filtro-plan" type="checkbox" 
                                            name="filtros_planes[]" 
                                            id="plan<?= $plan['id_tipo_plan'] ?>" 
                                            value="<?= $plan['id_tipo_plan'] ?>"
                                            <?= (isset($params['planes']) && in_array($plan['id_tipo_plan'], explode(',', $params['planes']))) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="plan<?= $plan['id_tipo_plan'] ?>"> <?= $plan['nombre_tipo_plan'] ?></label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <hr class="text-muted opacity-25">

                                <div class="filter-group mb-4">
                                    <h6 class="fw-bold small text-uppercase text-muted mb-3">Rango de Precio (Total)</h6>
                                    <?php 
                                        $precios = [
                                            ['val' => '0-8000', 'label' => 'Menos de $8,000'],
                                            ['val' => '8000-15000', 'label' => '$8,000 - $15,000'],
                                            ['val' => '15000-25000', 'label' => '$15,000 - $25,000'],
                                            ['val' => '25000-999999', 'label' => 'Más de $25,000'],
                                        ];
                                        foreach($precios as $p):
                                    ?>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input filtro-precio" type="checkbox" 
                                            name="filtros_precios[]" 
                                            value="<?= $p['val'] ?>"
                                            id="price_<?= $p['val'] ?>"
                                            <?= (isset($params['precios']) && in_array($p['val'], explode(',', $params['precios']))) ? 'checked' : '' ?>>
                                        <label class="form-check-label w-100" for="price_<?= $p['val'] ?>"><?= $p['label'] ?></label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                <button type="button" id="btnAplicarFiltros" class="btn btn-primary w-100 fw-bold">
                                    <i class="fas fa-sync-alt me-2"></i> APLICAR FILTROS
                                </button>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-lg-8">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="fw-bold mb-0">
                                <?= count($hoteles) ?> <span class="fw-light text-muted">opciones encontradas</span>
                            </h4>
                            <select class="form-control w-auto">
                                <option>Ordenar por: Menor Precio</option>
                                <option>Ordenar por: Mayor Precio</option>
                            </select>
                        </div>

                        <?php if (!empty($hoteles)): ?>
                            <?php foreach ($hoteles as $id_hotel => $datos): ?>
                                <?php $hotelInfo = $datos['info']; ?>
                                <div class="card shadow-sm border-0 mb-5 overflow-hidden hotel-card">
                                    <div class="row g-0">
                                        <div class="col-md-4 position-relative">
                                            <div id="carouselHotel<?= $id_hotel ?>" class="carousel slide h-100" data-bs-ride="carousel">
                                                <div class="carousel-inner h-100">
                                                    <?php if (!empty($datos['imagenes'])): ?>
                                                        <?php foreach ($datos['imagenes'] as $idx => $img): ?>
                                                            <div class="carousel-item <?= ($idx == 0) ? 'active' : '' ?> h-100">
                                                                <img src="<?= base_url($img['archivo_hotel_imagen']); ?>" 
                                                                    class="d-block w-100 h-100 object-fit-cover" 
                                                                    style="min-height: 250px;"
                                                                    alt="Imagen de <?= $hotelInfo['nombre_hotel'] ?>">
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <div class="carousel-item active h-100">
                                                            <img src="<?= base_url('assets/img/hoteldemo.png') ?>" class="d-block w-100 h-100 object-fit-cover" style="min-height: 250px;">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if (count($datos['imagenes'] ?? []) > 1): ?>
                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHotel<?= $id_hotel ?>" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselHotel<?= $id_hotel ?>" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                            <span class="position-absolute top-0 start-0 m-3 badge bg-dark opacity-75 fw-light" style="z-index: 10;">
                                                <i class="fas fa-image me-1"></i> <?= count($datos['imagenes'] ?? []) ?> Fotos
                                            </span>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="card-body p-4">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <div>
                                                        <h5 class="fw-bold text-dark mb-1">
                                                            <?= $hotelInfo['nombre_hotel'] ?>
                                                            <button class="btn btn-link btn-sm p-0 ms-2 text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalHotel<?= $id_hotel ?>">
                                                                <i class="fas fa-info-circle"></i> Ver detalles
                                                            </button>
                                                        </h5>
                                                        <p class="text-muted small mb-0">
                                                            <i class="fas fa-map-marker-alt text-primary me-1"></i> <?= $hotelInfo['ubicacion_hotel'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="text-warning small">
                                                        <?php for($i=0; $i < $hotelInfo['categoria_hotel']; $i++): ?>
                                                            <i class="fas fa-star"></i>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>

                                                <?php 
                                                $fecha1 = new DateTime($params['checkin']);
                                                $fecha2 = new DateTime($params['checkout']);
                                                $noches = $fecha1->diff($fecha2)->days;
                                                ?>

                                                <div class="d-inline-flex flex-column mb-4">
                                                    <div class="d-inline-flex align-items-center bg-light rounded-pill px-3 py-1 small">
                                                        <i class="far fa-calendar-alt text-primary me-2"></i>
                                                        <span class="text-muted">
                                                            Del <strong><?= date('d/m/Y', strtotime($params['checkin'])) ?></strong> 
                                                            al <strong><?= date('d/m/Y', strtotime($params['checkout'])) ?></strong>
                                                        </span>
                                                    </div>
                                                    <div class="ps-3 mt-1">
                                                        <small class="text-primary fw-bold">
                                                            <i class="fas fa-moon me-1"></i> <?= $noches ?> <?= ($noches == 1) ? 'Noche' : 'Noches' ?> de estancia
                                                        </small>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                                    <div>
                                                        <small class="text-muted d-block lh-1">Mejor tarifa desde</small>
                                                        <div class="align-items-baseline">
                                                            <span class="h3 fw-bold text-success mb-0">$<?= number_format($datos['habitaciones'][0]['tarifa_total'], 2) ?></span>
                                                            <small class="text-muted fw-normal ms-1">MXN</small>
                                                        </div>
                                                        <small class="text-primary small" style="font-size: 0.75rem;"><i class="fas fa-check-circle me-1"></i>Impuestos incluidos</small>
                                                    </div>
                                                    <button class="btn btn-primary px-4 py-2 shadow-sm rounded-pill" 
                                                            data-bs-toggle="collapse" 
                                                            data-bs-target="#collapseRooms<?= $id_hotel ?>"
                                                            aria-expanded="false">
                                                        Ver Disponibilidad <i class="fas fa-chevron-down ms-2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="collapse" id="collapseRooms<?= $id_hotel ?>">
                                        <div class="card-body bg-light border-top p-4">
                                            <h6 class="fw-bold mb-3 text-uppercase text-muted small">Habitaciones Disponibles</h6>
                                            
                                            <?php foreach ($datos['habitaciones'] as $habIdx => $hab): ?>
                                                <?php $uniqueId = $id_hotel . '_' . $habIdx; ?>
                                                
                                                <div class="card mb-3 border-0 shadow-sm overflow-hidden">
                                                    <div class="row g-0">
                                                        <div class="col-md-3 d-none d-md-block position-relative">
                                                            <div id="carouselHab<?= $uniqueId ?>" class="carousel slide h-100" data-bs-ride="carousel">
                                                                <div class="carousel-inner h-100">
                                                                    <?php if (!empty($hab['imagenes_hab'])): ?>
                                                                        <?php foreach ($hab['imagenes_hab'] as $idxH => $imgH): ?>
                                                                            <div class="carousel-item <?= ($idxH == 0) ? 'active' : '' ?> h-100">
                                                                                <img src="<?= base_url($imgH['archivo_imagen_habitacion']); ?>" 
                                                                                    class="d-block w-100 h-100 object-fit-cover" 
                                                                                    style="min-height: 150px;">
                                                                            </div>
                                                                        <?php endforeach; ?>
                                                                    <?php else: ?>
                                                                        <div class="carousel-item active h-100">
                                                                            <img src="<?= !empty($hotelInfo['imagen_mbp_hotel']) ? base_url($hotelInfo['imagen_mbp_hotel']) : base_url('assets/img/hoteldemo.png') ?>" 
                                                                                class="d-block w-100 h-100 object-fit-cover" 
                                                                                style="min-height: 150px; filter: grayscale(0.5);">
                                                                            <div class="carousel-caption d-none d-md-block" style="bottom: 0; left: 0; right: 0; background: rgba(0,0,0,0.5);">
                                                                                <small style="font-size: 0.6rem;">Imagen de referencia</small>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>

                                                                <?php if (count($hab['imagenes_hab'] ?? []) > 1): ?>
                                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHab<?= $uniqueId ?>" data-bs-slide="prev">
                                                                        <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 1.5rem;"></span>
                                                                    </button>
                                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselHab<?= $uniqueId ?>" data-bs-slide="next">
                                                                        <span class="carousel-control-next-icon" aria-hidden="true" style="width: 1.5rem;"></span>
                                                                    </button>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5 p-3">
                                                            <h6 class="fw-bold text-dark mb-1"><?= $hab['nombre_hab'] ?></h6>
                                                            <div class="mb-2 small text-muted">
                                                                <?php if($hab['cama_sencilla_habitacion'] > 0): ?> 
                                                                    <span class="me-2"><i class="fas fa-bed"></i> <?= $hab['cama_sencilla_habitacion'] ?> Sencilla(s)</span>
                                                                <?php endif; ?>
                                                                <?php if($hab['cama_doble_habitacion'] > 0): ?> 
                                                                    <span class="me-2"><i class="fas fa-bed"></i> <?= $hab['cama_doble_habitacion'] ?> Doble(s)</span>
                                                                <?php endif; ?>
                                                                <?php if($hab['cama_queen_habitacion'] > 0): ?> 
                                                                    <span class="me-2"><i class="fas fa-bed"></i> <?= $hab['cama_queen_habitacion'] ?> Queen</span>
                                                                <?php endif; ?>
                                                                <?php if($hab['cama_king_habitacion'] > 0): ?> 
                                                                    <span class="me-2"><i class="fas fa-bed"></i> <?= $hab['cama_king_habitacion'] ?> King</span>
                                                                <?php endif; ?>
                                                            </div>

                                                            <p class="mb-2 small text-muted">
                                                                <i class="fas fa-utensils me-2"></i><?= $hab['nombre_plan'] ?>
                                                            </p>

                                                            <button class="btn btn-outline-secondary btn-xs py-0 px-2 mb-2" style="font-size: 0.7rem;" 
                                                                    data-bs-toggle="modal" data-bs-target="#modalHab<?= $uniqueId ?>">
                                                                <i class="fas fa-plus-circle me-1"></i> Detalles y Servicios
                                                            </button>
                                                            
                                                            <div class="mb-2">
                                                                <?php if(!empty($hab['promos'])): ?>
                                                                    <?php foreach ($hab['promos'] as $promo): ?>
                                                                        <span class="badge bg-soft-warning text-dark border border-warning fw-normal me-1" style="font-size: 0.7rem; background-color: #fff3cd;">
                                                                            <i class="fas fa-tag me-1 text-warning"></i> <?= $promo ?>
                                                                        </span>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </div>

                                                            <button class="btn btn-link btn-sm p-0 text-decoration-none small" 
                                                                    type="button" 
                                                                    data-bs-toggle="collapse" 
                                                                    data-bs-target="#desglose<?= $uniqueId ?>">
                                                                <i class="fas fa-file-invoice-dollar me-1"></i> Ver detalles de impuestos
                                                            </button>
                                                        </div>

                                                        <div class="col-md-4 text-end p-3 border-start bg-white d-flex flex-column justify-content-center">
                                                            <?php if (isset($hab['precio_tachado']) && $hab['precio_tachado'] > $hab['tarifa_total']): ?>
                                                                <small class="text-danger text-decoration-line-through small">
                                                                    $<?= number_format($hab['precio_tachado'], 2) ?>MXN
                                                                </small>
                                                            <?php endif; ?>

                                                            <div class="mb-2">
                                                                <span class="h4 fw-bold text-success mb-0">$<?= number_format($hab['tarifa_total'], 2) ?></span>
                                                                <small class="text-muted small">MXN</small>
                                                            </div>

                                                            <?php
                                                            $queryData = array_merge($params, [
                                                                'id_hotel' => $id_hotel,
                                                                'id_hab'   => $hab['id_hab'],
                                                                'id_plan'  => $hab['id_plan']
                                                            ]);
                                                            $urlCheckout = base_url('Booking/Checkout?' . http_build_query($queryData));
                                                            ?>

                                                            <a href="<?= $urlCheckout ?>" class="btn btn-primary btn-sm w-100 fw-bold rounded-pill">
                                                                Reservar Ahora <i class="fas fa-arrow-right ms-1"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="collapse" id="desglose<?= $uniqueId ?>">
                                                        <div class="p-3 bg-white border-top">
                                                            <div class="row text-center g-2">
                                                                <div class="col-6">
                                                                    <div class="p-2 border rounded bg-light">
                                                                        <small class="d-block text-muted" style="font-size: 0.7rem;">Subtotal</small>
                                                                        <span class="small fw-bold">$<?= number_format($hab['subtotal'], 2) ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="p-2 border rounded bg-light">
                                                                        <small class="d-block text-muted" style="font-size: 0.7rem;">Impuestos</small>
                                                                        <span class="small fw-bold">$<?= number_format($hab['iva'] + $hab['ish'], 2) ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="modalHotel<?= $id_hotel ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold"><?= $hotelInfo['nombre_hotel'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6><strong>Descripción:</strong></h6>
                                                <p class="text-muted small" style="text-align:justify;"><?= nl2br($hotelInfo['descripcion_hotel']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php foreach ($datos['habitaciones'] as $habIdx => $hab): 
                                    $uniqueId = $id_hotel . '_' . $habIdx; 
                                ?>
                                    <div class="modal fade" id="modalHab<?= $uniqueId ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header bg-light">
                                                    <h5 class="modal-title fw-bold"><?= $hab['nombre_hab'] ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6 class="fw-bold"><i class="fas fa-info-circle me-2 text-primary"></i>Descripción</h6>
                                                            <p class="small text-muted" style="text-align: justify;"><?= nl2br($hab['descripcion_habitacion']) ?></p>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-12">
                                                            <h6 class="fw-bold"><i class="fas fa-concierge-bell me-2 text-primary"></i>Servicios y Amenidades</h6>
                                                            <div class="small text-muted">
                                                                <?= nl2br($hab['servicios_habitacion']) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="card border-0 shadow-sm text-center py-5">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <i class="fas fa-search-location fa-4x text-muted opacity-25"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark">No encontramos disponibilidad</h5>
                                    <p class="text-muted mx-auto" style="max-width: 400px;">
                                        Lo sentimos, no hay habitaciones disponibles para los parámetros seleccionados. Intenta con otras fechas o destinos.
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <style>
                /* Un poco de CSS extra para pulir el diseño */
                .hotel-card { transition: transform 0.2s ease; }
                .hotel-card:hover { transform: translateY(-5px); }
                .object-fit-cover { object-fit: cover; }
                .line-clamp-2 {
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;  
                    overflow: hidden;
                }
                .btn-primary { background-color: #003580; border-color: #003580; }
                .text-primary { color: #003580 !important; }
                </style>
            </div>
        </div>
        <!-- room area end -->

    </main>