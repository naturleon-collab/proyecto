        </div>
        <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span style="color:#0e223b;"><strong>&copy; <?= date("Y"); ?> Naturleón S.A. de C.V.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->    

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Cerrar Sesión" si estás listo para salir.</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="<?= base_url('Dashboard/LogOut/'); ?>"><strong>CERRAR SESIÓN</strong></a>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><strong>CANCELAR</strong></button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
      var base_url = "<?= base_url(); ?>";
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/extranet/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/extranet/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <script src="<?= base_url('assets/extranet/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <script src="<?= base_url('assets/extranet/js/sb-admin-2.min.js'); ?>"></script>

    <script src="<?= base_url('assets/sweetalert/sweetalert2.js'); ?>"></script>

    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdn.datatables.net/columncontrol/1.0.4/js/dataTables.columnControl.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    
    <script src="<?= base_url("assets/extranet/js/validate/extranet.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/hoteles.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/destinos.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/agencias.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/cms.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/usuarios.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/tours.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/naturcharter.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/naturflight.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/cobros.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/pagos.js") ?>"></script>
    <script src="<?= base_url("assets/extranet/js/validate/iniciador.js") ?>"></script>

</body>

</html>