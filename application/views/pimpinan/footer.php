            <div class="footer">
                <div class="pull-right">
                    <strong>{elapsed_time} detik</strong>
                </div>
                <div>
                    <strong>Copyright</strong> PT. Kredit Motor © 2018
                </div>
            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.1.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/jsKnob/jquery.knob.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js')?>"></script>

    <!-- Flot -->
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.tooltip.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.resize.js')?>"></script>

    <!-- Highcharts -->
    <!-- <script src="<?php echo base_url('assets/js/plugins/highcharts/jquery.min.js')?>"></script> -->
    <script src="<?php echo base_url('assets/js/plugins/highcharts/highcharts.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/highcharts/modules/exporting.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/highcharts/themes/skies.js')?>"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.rangking').DataTable({
                "order": [3, "asc"],
                "iDisplayLength": 25,
                "paging":   false,
                "searching": false,
                "info":     false,
                "columnDefs": [ {
                    "targets"  : [0,1,2,3]
                    // "orderable": false,
                }]
            });

            $('.topsis').DataTable({
                "order": [2, "asc"],
                "iDisplayLength": 25,
                "paging":   false,
                "searching": false,
                "info":     false,
                "columnDefs": [ {
                    "targets"  : [0,1,2]
                    // "orderable": false,
                }]
            });

            $('#mytable').DataTable();

            <?php if(isset($laporan_konsumen)) { ?>
            // var chart;
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'laporan_konsumen',
                    type: 'column',
                },
                title: {
                    text: 'Laporan Konsumen',
                    x: -20
                },
                subtitle: {
                    text: 'Berdasarkan Laporan',
                    x: -20
                },
                xAxis: {
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Konsumen Per Bulan'
                    }
                },
                series: [{
                    name: 'Jumlah konsumen',
                    data: <?php echo json_encode($laporan_konsumen); ?>
                }]
            });
            <?php } ?>
        });
    </script>

</body>

</html>