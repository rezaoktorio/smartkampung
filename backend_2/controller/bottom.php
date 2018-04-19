        <!-- jQuery  -->
        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/detect.js"></script>
        <script src="../../assets/js/fastclick.js"></script>
        <script src="../../assets/js/jquery.slimscroll.js"></script>
        <script src="../../assets/js/jquery.blockUI.js"></script>
        <script src="../../assets/js/waves.js"></script>
        <script src="../../assets/js/wow.min.js"></script>
        <script src="../../assets/js/jquery.nicescroll.js"></script>
        <script src="../../assets/js/jquery.scrollTo.min.js"></script>

        <!-- Modal-Effect -->
        <script src="../../assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="../../assets/plugins/custombox/js/legacy.min.js"></script>

        <script src="../../assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="../../assets/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="../../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="../../assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="../../assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="../../assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="../../assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="../../assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="../../assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="../../assets/plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="../../assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="../../assets/plugins/autocomplete/countries.js"></script>
        <script type="text/javascript" src="../../assets/pages/autocomplete.js"></script>

        <script type="text/javascript" src="../../assets/pages/jquery.form-advanced.init.js"></script>

        <!-- Page Specific JS Libraries -->
        <script src="../../assets/plugins/dropzone/dropzone.js"></script>


        <!-- App core js -->
        <script src="../../assets/js/jquery.core.js"></script>
        <script src="../../assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="../../assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="../../assets/plugins/datatables/jszip.min.js"></script>
<script src="../../../../assets/plugins/datatables/pdfmake.min.js"></script>
<script src="../../assets/plugins/datatables/vfs_fonts.js"></script>
<script src="../../assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatables/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="../../assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="../../assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../../assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="../../assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="../../assets/plugins/datatables/dataTables.colVis.js"></script>
<script src="../../assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>
<script src="../../assets/pages/datatables.init.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();

</script>