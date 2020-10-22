<script type="text/javascript">
$('#datetimepicker4').datetimepicker({
    format: 'YYYY-MM-DD'
});
$('.select2').select2({
    placeholder: 'Pilih Anggota',
    minimumInputLength: 1,
    ajax: {
        url: "<?php echo base_url();?>Transaksi/selectsearch",
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    }
});
$('.selectt2').select2();
$('.select2').change(function() {
    $.ajax({
        url: "<?php echo base_url();?>Transaksi/hitung_saldo",
        data: {"no_rekening": $('.select2 option:selected').text()},
        dataType:"html",
        type: "post",
        success: function(data) {
            $('#saldo_awal').val(data);
        }
    });
});
$('#transaksi').keyup(function() {
    var jenis = $('.selectt2 option:selected').text();
    var saldo_awal = parseInt($('#saldo_awal').val());
    var transaksi = parseInt($('#transaksi').val());
    if(jenis == "Setoran") {
        $('#saldo_akhir').val((saldo_awal + transaksi ? saldo_awal + transaksi : 0));
    }else if(jenis == "Penarikan") {
        $('#saldo_akhir').val((saldo_awal - transaksi ? saldo_awal - transaksi : 0));
    }

})
</script>