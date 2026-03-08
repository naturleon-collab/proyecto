<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Aviso de Privacidad</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">MODIFICAR BANNER AVISO</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarBannerAviso" class="row g-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Imagen</label> <small>(1920px * 900px)</small>
                                <input type="file" class="form-control" name="archivoAviso" id="archivoAviso" accept="image/jpg, image/jpeg">
                                <?php if($banner[0]['archivo_aviso'] != ""){ ?>
                                <label>Imagen Actual</label>
                                <img class="img-fluid" src="<?= base_url($banner[0]['archivo_aviso']); ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" name="tituloAvisoBanner" id="tituloAvisoBanner" value="<?= $banner[0]['titulo_aviso']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Texto</label>
                                <input type="text" class="form-control" name="textoAvisoBanner" id="textoAvisoBanner" value="<?= $banner[0]['texto_aviso']; ?>" required>
                            </div>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="BtnGuardarBannerAviso" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">ADMINISTRAR AVISOS</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarAvisos" class="row g-3">
                        <div class="col-md-12 mb-4">
                            <button onclick="AgregarNuevoAviso()" type="button" class="btn btn-sm btn-primary" title="Agregar Aviso"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" class="form-control" id="tituloAviso" name="tituloAviso" required>
                                <input type="hidden" class="form-control" id="idAviso" name="idAviso" value="0" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Texto</label>
                                <textarea class="form-control" id="textoAviso" name="textoAviso" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="BtnGuardarAvisos" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Basic Card Example -->
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE AVISOS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Título</th>
                                    <th>Texto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($avisos)){ foreach($avisos as $x){ ?>
                                <tr>
                                    <td class="text-center">
                                        <button onclick="EditarAviso(<?= $x['id_aviso']; ?>)" type="button" class="btn btn-primary" title="Editar Aviso"><i class="fas fa-edit"></i></button>
                                    </td>
                                    <td class="text-center">
                                        <?=  $x['titulo_aviso']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?=  $x['texto_aviso']; ?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Título</th>
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