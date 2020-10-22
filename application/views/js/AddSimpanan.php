<script type="text/javascript">
$('.select2').select2({
    placeholder: 'Pilih Anggota',
    minimumInputLength: 1,
    ajax: {
        url: "<?php echo base_url();?>Simpanan/selectsearch",
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
</script>