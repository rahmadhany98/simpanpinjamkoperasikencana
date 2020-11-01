<script type="text/javascript">
$('#datetimepicker4').datetimepicker({
    format: 'YYYY-MM-DD'
});
$('#datetimepicker3').datetimepicker({
    format: 'YYYY-MM-DD'
});
$('.select2').select2({
    placeholder: 'Masukkan Nama',
    minimumInputLength: 1,
    ajax: {
        url: "<?php echo base_url();?>Realisasi/selectsearch",
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
$('.select2').change(function() {
    $.ajax({
        url: "<?php echo base_url();?>Realisasi/tampil_data",
        data: {"nama_debitor": $('.select2 option:selected').text()},
        dataType:"json",
        type: "post",
        success: function(data) {
            $('#alamat').val(data["alamat"]);
            $('#jaminan').val(data["jaminan"]);
            $('#no_hp').val(data["no_telepon"]);
            $('#jumlah_pinjam').val(data["jumlah_pinjam"]);
            $('#lama_pinjam').val(data["lama_pinjam"]);
            $('#total_realisasi').val(data["jumlah_pinjam"]);
            var a = $('#jumlah_pinjam').val();
    var b = $('#lama_pinjam').val();
    var pokok = parseInt(a) / parseInt(b);
    var bunga = 0.0125 * parseInt(a);
    var total_angsur = pokok + bunga;
    $('#angsuran_pokok').val(pokok);
    $('#bunga').val(bunga);
    $('#total_angsuran').val(total_angsur);
        }
    });
});
$('#biaya_admin').keyup(function() {
    var jumlah = parseInt($('#jumlah_pinjam').val());
    var biaya_admin = parseInt($('#biaya_admin').val());
    var materai = parseInt($('#materai').val());
    var total_realisasi = parseInt($('#total_realisasi').val());
        $('#total_realisasi').val((jumlah - biaya_admin - materai ? jumlah - biaya_admin - materai : 0));
});
$('#materai').keyup(function() {
    var jumlah = parseInt($('#jumlah_pinjam').val());
    var biaya_admin = parseInt($('#biaya_admin').val());
    var materai = parseInt($('#materai').val());
    var total_realisasi = parseInt($('#total_realisasi').val());
        $('#total_realisasi').val((jumlah - biaya_admin - materai ? jumlah - biaya_admin - materai : 0));
});
$("#datetimepicker4").on("change.datetimepicker",function(){
    $.ajax({
        url: "<?php echo base_url();?>Realisasi/hitung_tanggal",
        data: {
            "tanggal_realisasi": $('#datetimepickerrr').val(),
            "bulan": $('#lama_pinjam').val()
            },
        dataType:"html",
        type: "post",
        success: function(data) {
            $('#datetimepickerr').val(data);
        }
    });
})
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