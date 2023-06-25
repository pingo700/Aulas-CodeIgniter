function Carregamento() {
    Swal.fire({
        title: 'Aguarde...',
        html: 'Buscando...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {}, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {})
}

$(document).ready(function () {
    $(document).on('click', 'button', function (e) {
        if ($(this).attr("name") != undefined) {
            var modal = $(this).attr("name");
            var module = $(this).attr("module");
            var validation = $(this).attr("validation");
            if (validation == 1) {
                Swal.fire({
                    title: 'Confirmação',
                    icon: 'question',
                    html: $(this).attr("title"),
                    confirmButtonColor: '#A9D18E',
                    denyButtoColor: '#F6CECE',
                    TextColor: '#0a0a0a',
                    showDenyButton: true,
                    confirmButtonText: 'Confirmar',
                    denyButtonText: `Cancelar`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: ""+$(this).attr("name")+"/"+$(this).attr("data-ref")+"",
                            beforeSend: function () {
                                Carregamento();
                            },
                            success: function (data) {
                                $('#Tabela').DataTable().ajax.reload();
                                Swal.close();
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                Swal.fire({
                                    icon: textStatus,
                                    title: 'Oops...',
                                    text: errorThrown,
                                    confirmButtonColor: "#f52525",
                                });
                            }
                        });
                    }
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: ""+$(this).attr("name")+"/"+$(this).attr("data-ref")+"",
                    beforeSend: function () {
                        Carregamento();
                    },
                    success: function (data) {
                        $("#DivPadrao").html(data);
                        $("#ModalUsuario").modal("show");
                        Swal.close();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: textStatus,
                            title: 'Oops...',
                            text: jqXHR['responseText'],
                            confirmButtonColor: "#f52525",
                        });
                    }
                });
            }
        }
    });
});


$("form").submit(function (e) {
    e.preventDefault();
    var form = $(this);
    var nome = $(this).attr("name");
    var id = $(this).attr("id");
    Swal.fire({
        title: 'Confirmação',
        icon: 'question',
        html: $(this).attr("title"),
        confirmButtonColor: '#A9D18E',
        denyButtoColor: '#F6CECE',
        TextColor: '#0a0a0a',
        showDenyButton: true,
        confirmButtonText: 'Confirmar',
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: form.attr('action'),
                enctype: 'multipart/form-data',
                data: $(this).serialize(),
                beforeSend: function () {
                    Carregamento();
                },
                success: function (data) {
                    $('#Tabela').DataTable().ajax.reload();
                    Swal.close();
                }
            }).fail(function (jqXHR, textStatus, msg) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: jqXHR['responseText'],
                    confirmButtonColor: "#f52525",
                });
            });
        }
    })
});