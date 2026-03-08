<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">ADMINISTRAR DESTINOS</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarDestino" class="row g-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Destino</label>
                                <select class="form-control selectpicker" data-live-search="true" id="destino" name="destino">
                                    <option value="0">NUEVO DESTINO</option>
                                    <optgroup label="NACIONALES">
                                        <?php if(!empty($destinosnacionales)){ foreach($destinosnacionales as $x){ ?>
                                            <option value="<?= $x['id_destino']; ?>"><?= $x['nombre_destino']; ?></option>
                                        <?php } } ?>
                                    </optgroup>
                                    <optgroup label="INTERNACIONALES">
                                        <?php if(!empty($destinosinternacionales)){ foreach($destinosinternacionales as $x){ ?>
                                            <option value="<?= $x['id_destino']; ?>"><?= $x['nombre_destino']; ?></option>
                                        <?php } } ?>
                                    </optgroup>
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre</label> 
                                <input class="form-control" type="text" id="nombredestino" name="nombredestino"> 
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Abrev.</label> 
                                <input class="form-control" type="text" id="abrevdestino" name="abrevdestino"> 
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>IATA</label> 
                                <input class="form-control" type="text" id="iatadestino" name="iatadestino"> 
                            </div>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Status</label> 
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="statusdestino">
                                    <label class="custom-control-label" for="statusdestino"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>DESTINO</label>
                                <div class="input-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="destinotipo" id="destinotipo1" value="Nacional" checked>
                                        <label class="form-check-label" for="destinotipo1">Nacional</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="destinotipo" id="destinotipo2" value="Internacional">
                                        <label class="form-check-label" for="destinotipo2">Internacional</label>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <!-- <div class="col-md-7">
                            <div class="form-group">
                                <label>Tipo</label>
                                <div class="input-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input chkTipoDestino" id="aerodestino">
                                        <label class="form-check-label" for="aerodestino">Aéreo</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="checkbox" class="form-check-input chkTipoDestino" id="charterdestino">
                                        <label class="form-check-label" for="charterdestino">Charter</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="checkbox" class="form-check-input chkTipoDestino" id="hoteleriadestino">
                                        <label class="form-check-label" for="hoteleriadestino">Hotelería</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="checkbox" class="form-check-input chkTipoDestino" id="trasladodestino">
                                        <label class="form-check-label" for="trasladodestino">Traslado</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="checkbox" class="form-check-input chkTipoDestino" id="actividadesdestino">
                                        <label class="form-check-label" for="actividadesdestino">Actividades</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="checkbox" class="form-check-input chkTipoDestino" id="naturflightdestino">
                                        <label class="form-check-label" for="naturflightdestino">Naturflight</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="checkbox" class="form-check-input chkTipoDestino" id="mpbdestino">
                                        <label class="form-check-label" for="mpbdestino">MBP</label>
                                    </div>
                                </div> 
                            </div>
                        </div> -->
                        <div class="col-12 mb-2 text-center">
                            <button id="btnGuardarDestino" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->