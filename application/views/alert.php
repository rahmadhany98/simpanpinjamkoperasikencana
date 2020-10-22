<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


<script type="text/javascript">
    <?php if ($this->session->flashdata('success')) { ?>

        toastr.success("<?php echo $this->session->flashdata('success'); ?>");

    <?php } else if ($this->session->flashdata('danger')) { ?>

        toastr.error("<?php echo $this->session->flashdata('danger'); ?>");

    <?php } else if ($this->session->flashdata('delete')) { ?>

        toastr.success("<?php echo $this->session->flashdata('delete'); ?>");

    <?php }  ?>
</script>