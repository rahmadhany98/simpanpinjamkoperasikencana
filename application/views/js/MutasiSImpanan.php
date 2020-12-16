<script type="text/javascript">
var table = $("#table-1").DataTable({
    dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                title: '',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'text-align', 'center' )
                        .prepend(
                            '<h5>No Rekening : '+$('.select2 option:selected').text()+'</h5>',
                        );
                    $(win.document.body)
                        .css( 'text-align', 'center' )
                        .prepend(
                            '<h4>Mutasi Simpanan</h4>',
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
                "url": "<?= base_url(); ?>Laporan/ajax_list_laporan_mutasi_simpanan",
                "type": "POST",
                "data": function(data) {
                    data.no_rekening = $('.select2 option:selected').text();
                }
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [0, 1, 2, 3, -1], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [2, 3, -1],
                    "render": function(data, type, row) {
                        return Number(data).toLocaleString('id', {
                            style: 'currency',
                            currency: 'IDR'
                        });
                    }
                },
            ],
            // "footerCallback": function ( row, data, start, end, display ) {
            //     var api = this.api(), data;

            //     // converting to interger to find total
            //     var intVal = function ( i ) {
            //         return typeof i === 'string' ?
            //             i.replace(/[\$,]/g, '')*1 :
            //             typeof i === 'number' ?
            //                 i : 0;
            //     };

            //     // computing column Total of the complete result 
            //     var debitTotal = api
            //         .column( 2 )
            //         .data()
            //         .reduce( function (a, b) {
            //             return intVal(a) + intVal(b);
            //         }, 0 );

            // var kreditTotal = api
            //         .column( 3 )
            //         .data()
            //         .reduce( function (a, b) {
            //             return intVal(a) + intVal(b);
            //         }, 0 );


            //     // Update footer by showing the total with the reference of the column index 
            // $( api.column( 1 ).footer() ).html('Total');
            //     $( api.column( 2 ).footer() ).html(debitTotal.toLocaleString('id', {
            //             style: 'currency',
            //             currency: 'IDR'
            //         }));
            //     $( api.column( 3 ).footer() ).html(kreditTotal.toLocaleString('id', {
            //             style: 'currency',
            //             currency: 'IDR'
            //         }));
            // }
        });
    $('#btn-filter').click(function() { //button filter event click
        table.ajax.reload();
    });
    $('.select2').select2({
        placeholder: 'Pilih Anggota',
        minimumInputLength: 1,
        ajax: {
            url: "<?php echo base_url(); ?>Transaksi/selectsearch",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
</script>