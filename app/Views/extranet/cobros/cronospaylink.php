<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
            CronosPay Link
        </h1>
    </div>

    <div class="row mb-4">
        <div class="col-12 col-lg-8 order-2 order-lg-1" id="cronospaylink">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-edit mr-1"></i> Configuración del Link de Pago
                    </h6>
                </div>
                <div class="card-body">
                    <form id="formGuardarLinkPago" class="row">
                        <div class="mb-3 col-12 col-md-6 col-xl-4">
                            <label class="form-label text-dark font-weight-bold small">Agencia</label>
                            <select class="form-control selectpicker form-control-sm border-left-primary" id="agencia_id" name="agencia_id" data-live-search="true">
                                <option value="0">Selecciona...</option>
                                <?php if(!empty($agencias)): foreach($agencias as $x): ?>
                                <option value="<?= $x['id_agencia']; ?>"><?= $x['nombre_agencia']; ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-xl-4">
                            <label class="form-label text-dark font-weight-bold small">Localizador</label>
                            <input class="form-control form-control-sm" type="text" id="link_localizador" name="link_localizador" onChange="BuscarReservacionLink()">
                            <input type="hidden" id="id_link_reservacion" name="link_reservacion">
                            <input type="hidden" id="id_link" name="id_link" value="0">
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-xl-4">
                            <label class="form-label text-dark font-weight-bold small">Hotel</label>
                            <input class="form-control form-control-sm ui-autocomplete-input" type="text" id="link_hotel" name="link_hotel" autocomplete="off">
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-xl-4">
                            <label class="form-label text-dark font-weight-bold small">Titular de la reserva</label>
                            <input class="form-control form-control-sm" type="text" id="link_titular_reservacion" name="link_titular_reservacion">
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-xl-4">
                            <label class="form-label text-dark font-weight-bold small">Monto a Pagar</label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input class="form-control" type="text" id="link_monto" name="link_monto" required>
                            </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-xl-4">
                            <label class="form-label text-dark font-weight-bold small">WhatsApp (10 dígitos)</label>
                            <input class="form-control form-control-sm" maxlength="10" type="text" id="whatsapp" name="whatsapp">
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-xl-4">
                            <label class="form-label text-dark font-weight-bold small">E-Mail</label>
                            <input class="form-control form-control-sm" type="email" id="email" name="email" style="text-transform:none;">
                        </div>

                        <div class="col-12 text-right mt-3">
                            <hr>
                            <button type="reset" class="btn btn-light btn-sm mr-2 border">
                                CANCELAR
                            </button>
                            <button id="btnGuardarLinkPago" type="submit" class="btn btn-primary btn-sm px-4">
                                <i class="fas fa-save mr-1"></i> GUARDAR LINK
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 order-1 order-lg-2">
            <div class="card bg-gradient-info text-white shadow mb-4 h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                    <h5 class="font-weight-bold px-2">Genera links de pago para uso directo de tus clientes.</h5>
                    <p class="small text-white-50 p-2">
                        El cliente recibirá un acceso seguro para realizar su pago con tarjeta de crédito o débito de forma inmediata.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="contenedor_links">

    <?php if(!empty($links)): 
            usort($links, function($a, $b) {
                return $a['estatus_pago'] <=> $b['estatus_pago'];
            });
        foreach($links as $x): ?>

        <?php if($x['estatus_pago'] == "0"): ?>
        
        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Pago Pendiente
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">
                                <?= $x['titular_reservacion']; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <span class="h5 font-weight-bold text-dark">$<?= number_format($x['monto_pagar'],2); ?></span>
                        </div>
                    </div>
                    
                    <div class="mb-3 small">
                        <strong class="text-primary"><?= $x['folio_reservacion']; ?></strong><br>
                        <span class="text-gray-600"><?= $x['hotel_reservacion']; ?></span>
                    </div>

                    <div class="bg-light p-2 rounded mb-3 border d-flex align-items-center justify-content-between">
                        <a class="small text-truncate d-block font-italic" href="<?= $x['url_pago'] ?>" target="_blank" id="link_<?= $x['id_link'] ?>">
                            <i class="fas fa-external-link-alt mr-1"></i> <?= $x['url_pago'] ?>
                        </a>
                        <button class="btn btn-sm btn-light ml-2" onclick="copyToClipboard('<?= $x['url_pago'] ?>', this)" title="Copiar Link">
                            <i class="far fa-copy"></i>
                        </button>
                    </div>

                    <hr class="my-2">
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <button class="btn btn-circle btn-sm btn-primary mr-1" onclick="editarLink(<?= $x['id_link']; ?>)" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-circle btn-sm btn-light border shadow-sm" onclick="desactivarLink(<?= $x['id_link']; ?>)" title="Eliminar">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-info px-3 mr-1" title="Enviar Email">
                                <i class="fas fa-envelope mr-1"></i> Email
                            </button>
                            <button class="btn btn-sm btn-success px-3" title="Enviar WhatsApp">
                                <i class="fab fa-whatsapp mr-1"></i> WhatsApp
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php else: ?>

        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-gradient-light">
                <div class="card-body">
                    <div class="row no-gutters align-items-center mb-3">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <i class="fas fa-check-circle"></i> PAGADO
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">
                                <?= $x['titular_reservacion']; ?>
                            </div>
                        </div>
                        <div class="col-auto text-success">
                            <span class="h5 font-weight-bold">$<?= number_format($x['monto_pagar'],2); ?></span>
                        </div>
                    </div>
                    
                    <div class="mb-3 small">
                        <strong class="text-primary"><?= $x['folio_reservacion']; ?></strong><br>
                        <span class="text-gray-600"><?= $x['hotel_reservacion']; ?></span>
                    </div>

                    <div class="bg-white p-2 rounded mb-3 border shadow-sm">
                        <span class="small text-muted"><i class="fas fa-lock mr-1"></i> Link Finalizado</span>
                    </div>

                    <hr class="my-2">
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div>
                            <button class="btn btn-circle btn-sm btn-light border" disabled>
                                <i class="fas fa-pencil-alt text-gray-400"></i>
                            </button>
                        </div>
                        <div class="text-right">
                                <span class="badge badge-success px-3 py-2">Transacción Exitosa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    <?php endforeach; endif; ?>

    </div>
</div>