<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">ADMINISTRAR SALIDAS</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarSalidas" class="row g-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre Salida</label> 
                                <input class="form-control" type="text" id="nombreSalida" name="nombreSalida" placeholder="SALIDA ORIGEN - DESTINO"> 
                                <input class="form-control" type="hidden" id="idSalida" name="idSalida" value="0"> 
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Origen</label>
                                <select class="form-control selectpicker" data-live-search="true" id="origenSalida" name="origenSalida">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Destino</label>
                                <select class="form-control selectpicker" data-live-search="true" id="destinoSalida" name="destinoSalida">
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Status</label> 
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="statusSalida" name="statusSalida">
                                    <label class="custom-control-label" for="statusSalida"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="btnGuardarSalidas" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                            <button class="btn btn-secondary" type="reset"><strong>NUEVA SALIDA</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Basic Card Example -->
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">LISTADO SALIDAS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Salida</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($salidas)): foreach($salidas as $x): ?>
                                <tr>
                                    <td class="text-center text-white h5">
                                        <span class="badge badge-success"><?= $x['nombre']; ?></span>
                                    </td>
                                    <td class="text-center"><?= $x['origen']; ?></td>
                                    <td class="text-center"><?= $x['destino']; ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" title="Administrar" onclick="EditarSalida(<?= $x['id_salida']; ?>)"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

