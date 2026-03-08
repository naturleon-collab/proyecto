<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sliders</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-easycheck">
                    <h6 class="m-0 font-weight-bold text-white">AGREGAR SLIDER</h6>
                </div>
                <div class="card-body">
                    <form id="FormGuardarSlider" class="row g-3">
                        <div class="col-md-12 mb-4">
                            <button onclick="AgregarNuevoSlider()" type="button" class="btn btn-sm btn-primary" title="Agregar Slider"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombreSlider" id="nombreSlider" required>
                                <input type="hidden" class="form-control" id="idSlider" name="idSlider" value="0" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Imagen</label> <small>(1920px * 900px)</small>
                                <input type="file" class="form-control" name="archivoSlider" id="archivoSlider" accept="image/jpg, image/jpeg">
                                <div id="divArchivo" hidden>
                                    <label>Imagen Actual</label>
                                    <img id="vistaArchivo" class="img-fluid" src="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Visible Desde</label>
                                <input type="date" class="form-control" id="desdeSlider" name="desdeSlider" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Visible Hasta</label>
                                <input type="date" class="form-control" id="hastaSlider" name="hastaSlider" required>
                            </div>
                        </div>
                        <div class="col-12 mb-2 text-center">
                            <button id="BtnGuardarSlider" class="btn btn-primary" type="submit"><strong>GUARDAR</strong></button>
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
                    <h6 class="m-0 font-weight-bold text-white">LISTADO DE SLIDERS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display tablanaturleon" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Visible</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($sliders)){ foreach($sliders as $x){ ?>
                                <tr>
                                    <td class="text-center">
                                        <button onclick="EditarSlider(<?= $x['id_slider']; ?>)" type="button" class="btn btn-primary" title="Editar Slider"><i class="fas fa-edit"></i></button>
                                        <?php if($x['status_slider'] == 1){ ?>
                                        <button onclick="CambiarStatusSlider(<?= $x['id_slider']; ?>,0)" type="button" class="btn btn-danger" title="Desactivar Slider"><i class="fas fa-times"></i></button>
                                        <?php }else{ ?>
                                        <button onclick="CambiarStatusSlider(<?= $x['id_slider']; ?>,1)" type="button" class="btn btn-success" title="Activar Slider"><i class="fas fa-check"></i></button>  
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $x['nombre_slider']; ?>
                                    </td>
                                    <td class="w-25 text-center">
                                        <img id="myImg" src="<?= base_url($x['imagen_slider']); ?>" class="img-fluid">
                                    </td>
                                    <td class="text-center">
                                        <?= date('d/m/Y', strtotime($x['desde_slider'])); ?> al <?= date('d/m/Y', strtotime($x['hasta_slider'])); ?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Acciones</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Visible</th>
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