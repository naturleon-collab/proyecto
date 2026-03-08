<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Plazas</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">AGREGAR PLAZA</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarPlaza" class="row g-3">
                        <div class="col-md-12 mb-4">
                            <button onclick="AgregarNuevoPlaza()" type="button" class="btn btn-sm btn-primary" title="Agregar Plaza"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombrePlaza" id="nombrePlaza" required>
                                <input type="hidden" class="form-control" id="idPlaza" name="idPlaza" value="0" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="text" class="form-control" name="correoPlaza" id="correoPlaza" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" name="telefonoPlaza" id="telefonoPlaza" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ubicación</label>
                                <input type="text" class="form-control" name="ubicacionPlaza" id="ubicacionPlaza" required>
                            </div>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="btnGuardarPlaza" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
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
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE PLAZAS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Datos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($plazas)){ foreach($plazas as $x){ ?>
                                <tr>
                                    <td class="text-center">
                                        <button onclick="EditarPlaza(<?= $x['id_plaza']; ?>)" type="button" class="btn btn-primary" title="Editar Plaza"><i class="fas fa-edit"></i></button>
                                    </td>
                                    <td class="text-center">
                                        <?= $x['nombre_plaza']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $x['correo_plaza']; ?><br>
                                        <?= $x['telefono_plaza']; ?><br>
                                        <?= $x['ubicacion_plaza']; ?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Datos</th>
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