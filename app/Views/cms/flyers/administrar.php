<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-md-12">
        <h1 class="h4 mb-0 text-gray-800">FLYERS</strong></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-block" title="Nuevo Flyer"><strong>NUEVO FLYER</strong></button>
                    <hr>
                    <form class="row g-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombreFlyer" name="nombreFlyer" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Visible Desde</label>
                                <input type="date" class="form-control" id="desdeFlyer" name="desdeFlyer" value="<?= date("Y-m-d"); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Visible Hasta</label>
                                <input type="date" class="form-control" id="hastaFlyer" name="hastaFlyer" value="<?= date("Y-m-d"); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Archivo</label>
                                <input type="file" class="form-control" id="archivoFlyer" name="archivoFlyer" accept="image/jpg, image/jpeg">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Plaza</label>
                                <select class="form-control" id="plazabanner" name="plazabanner">
                                    <option value="Todas">Todas</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guadalajara">Guadalajara</option>
                                    <option value="León">León</option>
                                    <option value="Monterrey">Monterrey</option>
                                    <option value="Morelia">Morelia</option>
                                    <option value="Pachuca">Pachuca</option>
                                    <option value="Pacífico">Pacífico</option>
                                    <option value="Querétaro">Querétaro</option>
                                    <option value="San Luis Potosí">San Luis Potosí</option>
                                    <option value="Sureste">Sureste</option>
                                    <option value="Tepic">Tepic</option>
                                </select> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Status</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="statusFlyer" name="statusFlyer">
                                <label class="custom-control-label" for="statusFlyer"></label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2 text-center">
                            <button class="btn btn-primary" type="button"><strong>GUARDAR</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <strong>FLYERS ACTIVOS PARA TODOS</strong>
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="row align-items-center">
                                    <div class="col mt-2 ml-2 mb-2">
                                        <a style="cursor: pointer;" class="text-secondary float-end ms-1" data-toggle="modal" data-target="#modalTest-0">
                                        <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>">
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <span class="text-muted fw-bold text-uppercase">NOMBRE FLYER</span>
                                        <p class="mb-0">2025-01-01 > 2025-01-31</p>
                                        <p class="mb-0">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTest-0"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                        </p>
                                    </div>
                                    <div id="modalTest-0" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTestLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTestLabel">NOMBRE FLYER</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>" alt="semana grupos">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="row align-items-center">
                                    <div class="col mt-2 ml-2 mb-2">
                                        <a style="cursor: pointer;" class="text-secondary float-end ms-1" data-toggle="modal" data-target="#modalTest-0">
                                        <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>">
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <span class="text-muted fw-bold text-uppercase">NOMBRE FLYER</span>
                                        <p class="mb-0">2025-01-01 > 2025-01-31</p>
                                        <p class="mb-0">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTest-0"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <strong>FLYERS ACTIVOS PARA GUADALAJARA</strong>
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="row align-items-center">
                                    <div class="col mt-2 ml-2 mb-2">
                                        <a style="cursor: pointer;" class="text-secondary float-end ms-1" data-toggle="modal" data-target="#modalTest-0">
                                        <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>">
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <span class="text-muted fw-bold text-uppercase">NOMBRE FLYER</span>
                                        <p class="mb-0">2025-01-01 > 2025-01-31</p>
                                        <p class="mb-0">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTest-0"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <strong>FLYERS ACTIVOS PARA LEÓN</strong>
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="row align-items-center">
                                    <div class="col mt-2 ml-2 mb-2">
                                        <a style="cursor: pointer;" class="text-secondary float-end ms-1" data-toggle="modal" data-target="#modalTest-0">
                                        <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>">
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <span class="text-muted fw-bold text-uppercase">NOMBRE FLYER</span>
                                        <p class="mb-0">2025-01-01 > 2025-01-31</p>
                                        <p class="mb-0">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTest-0"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <p>
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <strong>VER FLYERS VENCIDOS</strong>
              </button>
            </p>
            <div class="collapse" id="collapseExample">
              <div class="card card-body shadow">
                <strong>FLYERS VENCIDOS</strong>
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="row align-items-center">
                                <div class="col mt-2 ml-2 mb-2">
                                    <a style="cursor: pointer;" class="text-secondary float-end ms-1" data-toggle="modal" data-target="#modalTest-0">
                                    <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>">
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <span class="text-muted fw-bold text-uppercase">NOMBRE FLYER</span>
                                    <p class="mb-0">2025-01-01 > 2025-01-31</p>
                                    <p class="mb-0"><span class="text-danger">•</span> TODAS</p>
                                    <p class="mb-0">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTest-0"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                    </p>
                                </div>
                                <div id="modalTest-0" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTestLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTestLabel">NOMBRE FLYER</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>" alt="semana grupos">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="row align-items-center">
                                <div class="col mt-2 ml-2 mb-2">
                                    <a style="cursor: pointer;" class="text-secondary float-end ms-1" data-toggle="modal" data-target="#modalTest-0">
                                    <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>">
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <span class="text-muted fw-bold text-uppercase">NOMBRE FLYER</span>
                                    <p class="mb-0">2024-12-01 > 2024-12-31</p>
                                    <p class="mb-0"><span class="text-danger">•</span> AGUASCALIENTES</p>
                                    <p class="mb-0">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTest-0"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="row align-items-center">
                                <div class="col mt-2 ml-2 mb-2">
                                    <a style="cursor: pointer;" class="text-secondary float-end ms-1" data-toggle="modal" data-target="#modalTest-0">
                                    <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>">
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <span class="text-muted fw-bold text-uppercase">NOMBRE FLYER</span>
                                    <p class="mb-0">2024-12-01 > 2024-12-31</p>
                                    <p class="mb-0"><span class="text-danger">•</span> DURANGO</p>
                                    <p class="mb-0">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTest-0"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="row align-items-center">
                                <div class="col mt-2 ml-2 mb-2">
                                    <a style="cursor: pointer;" class="text-secondary float-end ms-1" data-toggle="modal" data-target="#modalTest-0">
                                    <img class="img-fluid" src="<?= base_url("assets/img/bg_login.jpg"); ?>">
                                    </a>
                                </div>
                                <div class="col text-center">
                                    <span class="text-muted fw-bold text-uppercase">NOMBRE FLYER</span>
                                    <p class="mb-0">2024-12-01 > 2024-12-31</p>
                                    <p class="mb-0"><span class="text-danger">•</span> GUADAJALARA</p>
                                    <p class="mb-0">
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTest-0"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->