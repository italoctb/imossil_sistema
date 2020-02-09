<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?=base_url('static/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap -->
<script src="<?=base_url('static/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=base_url('static/fastclick/lib/fastclick.js')?>"></script>
<!-- NProgress -->
<script src="<?=base_url('static/nprogress/nprogress.js')?>"></script>
<!-- Chart.js -->
<script src="<?=base_url('static/Chart.js/dist/Chart.min.js')?>"></script>
<!-- gauge.js -->
<script src="<?=base_url('static/gauge.js/dist/gauge.min.js')?>"></script>
<!-- bootstrap-progressbar -->
<script src="<?=base_url('static/bootstrap-progressbar/bootstrap-progressbar.min.js')?>"></script>
<!-- iCheck -->
<script src="<?=base_url('static/iCheck/icheck.min.js')?>"></script>
<!-- Skycons -->
<script src="<?=base_url('static/skycons/skycons.js')?>"></script>
<!-- Flot -->
<script src="<?=base_url('static/Flot/jquery.flot.js')?>"></script>
<script src="<?=base_url('static/Flot/jquery.flot.pie.js')?>"></script>
<script src="<?=base_url('static/Flot/jquery.flot.time.js')?>"></script>
<script src="<?=base_url('static/Flot/jquery.flot.stack.js')?>"></script>
<script src="<?=base_url('static/Flot/jquery.flot.resize.js')?>"></script>
<!-- Flot plugins -->
<script src="<?=base_url('static/flot.orderbars/js/jquery.flot.orderBars.js')?>"></script>
<script src="<?=base_url('static/flot-spline/js/jquery.flot.spline.min.js')?>"></script>
<script src="<?=base_url('static/flot.curvedlines/curvedLines.js')?>"></script>
<!-- DateJS -->
<script src="<?=base_url('static/DateJS/build/date.js')?>"></script>
<!-- JQVMap -->
<script src="<?=base_url('static/jqvmap/dist/jquery.vmap.js')?>"></script>
<script src="<?=base_url('static/jqvmap/dist/maps/jquery.vmap.world.js')?>"></script>
<script src="<?=base_url('static/jqvmap/examples/js/jquery.vmap.sampledata.js')?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?=base_url('static/moment/min/moment.min.js')?>"></script>
<script src="<?=base_url('static/bootstrap-daterangepicker/daterangepicker.js')?>"></script>

<script src="<?=base_url('static/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')?>"></script>
<!-- Custom Theme Scripts -->
<script src="<?=base_url('static/build/js/custom.min.js')?>"></script>
<script src="<?=base_url('static/js/main.js')?>"></script>
<script src="<?=base_url('static/js/owl.carousel.min.js')?>"></script>
<script src="<?=base_url('static/js/scripts.js')?>"></script>

<!-- Initialize datetimepicker -->
<script>
    $('#myDatepicker').datetimepicker({
		format: 'DD/MM/YYYY HH:mm'
	});

    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });

    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });

    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>

<script>
	function nomeArquivo(i) {
        $('#nome_arquivo_'+i).val($('#input_file_'+i).val());
        // console.log($('#nome_arquivo').val())
    }
</script>
<script>
	$("#test").val($("#teste2").val());
</script>
</body>
</html>
