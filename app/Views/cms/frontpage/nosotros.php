<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nosotros</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">MODIFICAR NOSOTROS</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarNosotros" class="row g-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Imagen</label> <small>(1920px * 900px)</small>
                                <input type="file" class="form-control" name="archivoNosotros" id="archivoNosotros" accept="image/jpg, image/jpeg">
                                <?php if($nosotros[0]['banner_nosotros'] != ""){ ?>
                                <label>Imagen Actual</label>
                                <img class="img-fluid" src="<?= base_url($nosotros[0]['banner_nosotros']); ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mision</label>
                                <textarea class="form-control" id="misionNosotros" name="misionNosotros" rows="5" required><?= $nosotros[0]['mision_nosotros']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Vision</label>
                                <textarea class="form-control" id="visionNosotros" name="visionNosotros" rows="5" required><?= $nosotros[0]['vision_nosotros']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="BtnGuardarNosotros" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">ADMINISTRAR VALORES</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarValores" class="row g-3">
                        <div class="col-md-12 mb-4">
                            <button onclick="AgregarNuevoValor()" type="button" class="btn btn-sm btn-primary" title="Agregar Valor"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Texto</label>
                                <textarea class="form-control" id="textoValor" name="textoValor" required></textarea>
                                <input type="hidden" class="form-control" id="idValor" name="idValor" value="0" required>
                            </div>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="BtnGuardarValores" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE VALORES</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Texto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($valores)){ foreach($valores as $x){ ?>
                                <tr>
                                    <td class="text-center">
                                        <button onclick="EditarValor(<?= $x['id_valor']; ?>)" type="button" class="btn btn-primary" title="Editar Valor"><i class="fas fa-edit"></i></button>
                                    </td>
                                    <td class="text-center">
                                        <?= $x['texto_valor']; ?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Texto</th>
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