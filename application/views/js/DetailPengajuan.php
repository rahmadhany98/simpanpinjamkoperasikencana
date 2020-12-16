<script type="text/javascript">
$("#table-1").DataTable({
    dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                title: '',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'text-align', 'center' )
                        .prepend(
                            '<h5>No PK : <?= $pinjaman->no_pk; ?></h5>',
                        );
                    $(win.document.body)
                        .css( 'text-align', 'center' )
                        .prepend(
                            '<h4>Riwayat Angsuran</h4>',
                        );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ],
	"processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
        "searching": false,
        "lengthChange": false,
        // Load data for the table's content from an Ajax source
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0, 1, 2 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        {
            "targets": [2,3 ],
            "render": function(data, type, row) {
                return Number(data).toLocaleString('id', {
                    style: 'currency',
                    currency: 'IDR'
                });
            }
        },
        ],
});

function sweetAlert(a){
    var id = a.value;
    Swal.fire({
        title: 'Are you sure?',
        text: "You Will delete this data !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#5cb85c',
        cancelButtonColor: '#d9534f',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            $(location).attr('href','<?= base_url('Pengajuan/')?>'+id);
        }
    })
};
</script>