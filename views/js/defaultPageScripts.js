$( document ).ready(function() {
    console.log('Jquery listo!');

    //Validacion de formularios
    var forms = document.querySelectorAll('.needs-validation')

    //Bucle sobre los campos para evitar el envio
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        });

    //Datatable
    $('#listDocumento').dataTable({
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "bProcessing": true,
        "sAjaxSource": window.root+"/documentos/ajax/",
        "aoColumns": [
            { mData: 'doc_id' },
            { mData: 'doc_nombre' },
            { mData: 'doc_codigo' },
            { mData: 'tip_nombre' },
            { mData: 'pro_nombre' },
            {
                "targets": 0,
                "data": "doc_id",
                "render": function ( data, type, row, meta ) {
                    return'<div class="text-center">' +
                        '<a href="'+window.root+'/documentos/editar/'+data+'" ><i class="fas fa-pencil-alt"></i></a>' +
                        '</div>';
                }
            },
            {
                "targets": 0,
                "data": "doc_id",
                "render": function ( data, type, row, meta ) {
                    return'<div class="text-center">' +
                        '<a href="'+window.root+'/documentos/editar/'+data+'"><i class="fas fa-trash-alt"></i></a>' +
                        '</div>';
                }
            }
        ]
    });
});