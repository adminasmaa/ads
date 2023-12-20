<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 footer-copyright text-center">
                <p class="mb-0">Hotels 2023 </p>
            </div>
            <div class="col-md-6 footer-copyright text-center">
                <a href="https://mynewhotels.net/docs/index.php" target="_blank" class="btn btn-info"
                   style="color:#000;background-color: #fff;display:none;"><i class="flaticon2-help"></i> دليل المساعدة لشرح البرنامج
                </a>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>

<!-- Bootstrap js-->
<!-- feather icon js-->
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>


<script src="{{asset('assets/js/form-wizard/form-wizard.js')}}"></script>

<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/time-picker/highlight.min.js')}}"></script>


<!-- Plugins JS start-->
<script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>


<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>


<!----ghada cleander script-->

<script src="{{asset('assets/js/calendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/js/calendar/fullcalendar-custom.js')}}"></script>
<script src="{{asset('assets/js/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/js/slick/slick.js')}}"></script>
<script src="{{asset('assets/js/header-slick.js')}}"></script>
<!-- <script src="{{asset('assets/js/theme-customizer/customizer.js')}}"></script> -->


<script src="{{asset('assets/js/tooltip-init.js')}}"></script>
<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/script.js')}}"></script>

<script type="https://cdn.bootcdn.net/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.js"></script>
<script type="https://cdn.bootcdn.net/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js"></script>


<script>
    let admin = '{{App\Helpers\Moving::print_permission()}}';
    let table = $('.data-table-responsive').DataTable({
        dom: 'Bfrtip',


        responsive: true,
        buttons: [
            {

                text: 'طباعة',
                extend: 'print',

                customize: function (win) {
                    $(win.document.body)
                        .css('direction', 'rtl');


                },

                exportOptions: {
                    columns: [':visible :not(.not-export-col)'],
                    header: false
                }

            }


        ],


        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"

        },


    })
    table.on('responsive-resize', function (e, table, columns) {
        e.preventDefault();
        show_hide_column(table);


    })

    function show_hide_column(table) {

        if (table.responsive.hasHidden()) {

            //Some columns are hidden, so, show the controls
            let rows = table.rows().data();
            $.each(rows, function (index, rowId) {
                var data = rows.data();
                if (data[0][0] == 1) {

                    table.columns([0]).visible(false);


                } else {

                    table.columns([0]).visible(true);

                }

            })

        } else {

            if (admin == 0) {
                table.buttons('.buttons-print').nodes().addClass('hidden');

            }

            table.columns([0]).visible(true);
        }

        table.draw();
    }


    $('.export-button_class').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [

            {

                text: 'طباعة',
                extend: 'print',
                customize: function (win) {
                    -
                        $(win.document.body)
                            .css('direction', 'rtl');


                },

                exportOptions: {
                    header: false,
                    columns: [':visible :not(.not-export-col)']
                }
            }


        ],

        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"

        }

    })

    $('.export-without_print').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [],

        language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"

        },

    })

    $('.modal-bookmark').on('hidden.bs.modal', function () {
        location.reload();
    })

    function SetBranchSession(id) {
        document.cookie = 'name=' + id;


    }

</script>
<!-- rating js -->
<script src="{{asset('assets/js/rating/jquery.barrating.js')}}"></script>
<script src="{{asset('assets/js/rating/rating-script.js')}}"></script>
</body>

</html>
