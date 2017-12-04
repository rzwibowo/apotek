</div>
<div class="clearfix"></div>
<footer class="footer">
    <div class="container">
        <h3>by rzwibowo <small>under construction</small></h3>
    </div>
</footer>

<script>
    $('.tanggal').datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: new Date(),
        dateFormat: 'yy-mm-dd'
    });
    $('.tanggal-btn').click(function() {
        $('.tanggal').datepicker("show")
    });
</script>
