<script type="text/javascript">
var table;
table = $("#table-1").DataTable({
	"processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= base_url();?>Simpanan/ajax_list",
            "type": "POST",
            "data": function (data) 
            {
                data.jenis_simpanan = $('#jenis_simpanan').val();
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0,-1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
});
$('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
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
            $(location).attr('href','<?= base_url('Simpanan/')?>'+id);
        }
    })
};
</script>