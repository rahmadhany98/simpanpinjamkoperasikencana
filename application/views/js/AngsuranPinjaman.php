<script type="text/javascript">
$('#datetimepicker4').datetimepicker({
    format: 'YYYY-MM-DD'
});
$('.select2').select2({
    placeholder: 'Pilih Anggota',
    minimumInputLength: 1,
    ajax: {
        url: "<?php echo base_url();?>Angsuran/selectsearch",
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
        url: "<?php echo base_url();?>Angsuran/hitung_saldo",
        data: {"no_rekening": $('.select2 option:selected').text()},
        dataType:"json",
        type: "post",
        success: function(data) {
            $('#jumlah_pinjaman').val(data["jumlah_pinjaman"]);
            $('#sisa_pinjaman').val(data["sisa_pinjaman"]);
        }
    });
});
$('#pokok').keyup(function() {
    var pokok = parseInt($('#pokok').val());
    var bunga = parseInt($('#bunga').val());
        $('#total').val((pokok + bunga ? pokok + bunga : 0));
});
$('#bunga').keyup(function() {
    var pokok = parseInt($('#pokok').val());
    var bunga = parseInt($('#bunga').val());
        $('#total').val((pokok + bunga ? pokok + bunga : 0));
});
</script>