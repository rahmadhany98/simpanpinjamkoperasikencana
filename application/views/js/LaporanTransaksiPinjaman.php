<script type="text/javascript">
$('#datetimepicker4').datetimepicker({
    format: 'YYYY-MM-DD'
});
$('#datetimepicker5').datetimepicker({
    format: 'YYYY-MM-DD'
});
var table;
table = $("#table-1").DataTable({
    dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                title: '',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'text-align', 'center' )
                        .prepend(
                            '<h5>Tanggal : '+$('#start_date').val()+' - '+$('#end_date').val()+'</h5>',
                        );
                    $(win.document.body)
                        .css( 'text-align', 'center' )
                        .prepend(
                            '<h4>Daftar Transaksi Pinjaman</h4>',
                        );
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ],
	"processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "searching": false,
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?= base_url();?>Laporan/ajax_list_laporan_transaksi_pinjaman",
            "type": "POST",
            "data": function (data) 
            {
                data.start_date = $('#start_date').val();
                data.end_date = $('#end_date').val();
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0,1,2,-1 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        {
            "targets": [ -1 ],
            "render": function(data, type, row) {
                return Number(data).toLocaleString('id', {
                    style: 'currency',
                    currency: 'IDR'
                });
            }
        },
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
				
	    var kreditTotal = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			
				
            // Update footer by showing the total with the reference of the column index 
            $( api.column( 3 ).footer() ).html(kreditTotal.toLocaleString('id', {
                    style: 'currency',
                    currency: 'IDR'
                }));
        }
});
$('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });

</script>