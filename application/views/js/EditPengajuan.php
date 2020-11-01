<script type="text/javascript">
$('.select2').select2({
    placeholder: 'Pilih No Rekening',
    minimumInputLength: 1,
    ajax: {
        url: "<?php echo base_url();?>Pengajuan/selectsearch",
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
$('#datetimepicker4').datetimepicker({
    format: 'YYYY-MM-DD'
});
bsCustomFileInput.init();
</script>