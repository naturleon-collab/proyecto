<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">ADMINISTRAR RUTAS</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarRutas" class="row g-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre Ruta</label> 
                                <input class="form-control" type="text" id="nombreRuta" name="nombreRuta" placeholder="AEROLINEA ORIGEN - DESTINO"> 
                                <input class="form-control" type="hidden" id="idRuta" name="idRuta" value="0"> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Aerolínea</label>
                                <select class="form-control selectpicker" data-live-search="true" id="aerolineaRuta" name="aerolineaRuta">
                                    <?php if(!empty($aerolineas)){ foreach($aerolineas as $x){ ?>
                                            <option value="<?= $x['id_aerolinea']; ?>"><?= $x['nombre_aerolinea']; ?></option>
                                        <?php } } ?>
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Origen</label>
                                <select class="form-control selectpicker" data-live-search="true" id="origenRuta" name="origenRuta">
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
                                <label>Destino</label>
                                <select class="form-control selectpicker" data-live-search="true" id="destinoRuta" name="destinoRuta">
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
                        <div class="col-md-6">
                            <label>Frecuencia</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Monday" id="LunesRuta">
                                <label class="form-check-label" for="Lunes">L</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Tuesday" id="MartesRuta">
                                <label class="form-check-label" for="Martes">M</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Wednesday" id="MiercolesRuta">
                                <label class="form-check-label" for="Miércoles">Mi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Thursday" id="JuevesRuta">
                                <label class="form-check-label" for="Jueves">J</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Friday" id="ViernesRuta">
                                <label class="form-check-label" for="Viernes">V</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Saturday" id="SabadoRuta">
                                <label class="form-check-label" for="Sábado">S</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Sunday" id="DomingoRuta">
                                <label class="form-check-label" for="Domingo">D</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Status</label> 
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="statusRuta" name="statusRuta">
                                    <label class="custom-control-label" for="statusRuta"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="btnGuardarRutas" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                            <button class="btn btn-secondary" type="reset"><strong>NUEVA RUTA</strong></button>
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
                    <h6 class="m-0 font-weight-bold text-white">LISTADO RUTAS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaAgregarHoteles" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Rutas</th>
                                    <th>Aearolinea</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Frecuencia</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($rutas)): foreach($rutas as $r): ?>
                                <tr>
                                    <td class="text-center text-white h5">
                                        <span class="badge badge-success"><?= $r['nombre_ruta']; ?></span>
                                    </td>
                                    <td class="text-center"><?= $r['nombre_aerolinea']; ?></td>
                                    <td class="text-center"><?= $r['origen']; ?></td>
                                    <td class="text-center"><?= $r['destino']; ?></td>
                                    <td class="text-center">
                                        <?php 
                                            $dias = [
                                                'frecuencia_lunes' => 'L',
                                                'frecuencia_martes' => 'M',
                                                'frecuencia_miercoles' => 'Mi',
                                                'frecuencia_jueves' => 'J',
                                                'frecuencia_viernes' => 'V',
                                                'frecuencia_sabado' => 'S',
                                                'frecuencia_domingo' => 'D'
                                            ];

                                            foreach($dias as $columna => $inicial) {
                                                if(isset($r[$columna]) && $r[$columna] == 1) {
                                                    echo '<span class="badge badge-light mx-1">' . $inicial . '</span>';
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" title="Administrar" onclick="EditarRuta(<?= $r['id_ruta']; ?>)"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Rutas</th>
                                    <th>Aearolinea</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Frecuencia</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

