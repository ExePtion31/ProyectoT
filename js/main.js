///Data table 
$(document).ready(function() {
    $('#tablausers').DataTable();
    $('#tablamaterias').DataTable();
    $('#tablacalifi').DataTable();


    //Validacion formulario registro de usuarios
    $('#form_registro_est').on('submit', function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        var grado = document.getElementById('gradoRE')

        if($('#nombreRE').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite el nombre.'
            })
        }else if($('#edadRE').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite la edad.'
            })
        }else if(grado.value == "0"){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione el grado.'
            })
        }else{
            $.ajax({
                type: $(this).attr('method'),
                data : datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data){
                    var resultado = data;
                    if(resultado.respuesta == "Exito"){
                        Swal.fire(
                            'Correcto',
                            'El estudiante se creo correctamente',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();          
                        }, 2000);
                    }else{
                        Swal.fire(
                            'Error',
                            'Error al crear al estudiante',
                            'error'
                        )
                    }
                }
            })
        }
    })

    //Validacion formulario registro de materias
    $('#form_registro_mate').on('submit', function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();

        if($('#materiaRM').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite la materia.'
            })
        }else{
            $.ajax({
                type: $(this).attr('method'),
                data : datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data){
                    var resultado = data;
                    if(resultado.respuesta == "Exito"){
                        Swal.fire(
                            'Correcto',
                            'La materia se creo correctamente',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();        
                        }, 2000);
                    }else{
                        Swal.fire(
                            'Error',
                            'Error al crear la materia',
                            'error'
                        )
                    }
                }
            })
        }
    })

    //Validacion formulario registro de calificaciones
    $('#form_registro_notas').on('submit', function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        var materia = document.getElementById('materiaRCF')
        var estudiante = document.getElementById('estudianteRCF')

        if($('#fechaRCF').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione la fecha.'
            })
        }else if(estudiante.value == "0"){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione el estudiante.'
            })
        }else if(materia.value == "0"){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione una materia.'
            })
        }else if($('#calificacionRCF').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite la calificación.'
            })
        }else{
            $.ajax({
                type: $(this).attr('method'),
                data : datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data){
                    var resultado = data;
                    if(resultado.respuesta == "Exito"){
                        Swal.fire(
                            'Correcto',
                            'La calificación se registró exitosamente',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();           
                        }, 2000);
                    }else{
                        Swal.fire(
                            'Error',
                            'Error al registrar la calificación',
                            'error'
                        )
                    }
                }
            })
        }
    })

    // ELIMINAR REGISTRO
    $('.borrar_registro').on('click', function(e){
        e.preventDefault();

        var id = $(this).attr('data-id');
        var categoria = $(this).attr('data-tipo');
        
        Swal.fire({
            title: 'Esta seguro?',
            text: "Seguro que quieres eliminar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    data : {
                        'id': id,
                        'categoria' : categoria
                    },
                    url: 'php/eliminar.php',
                    success: function(data){
                        var resultado = JSON.parse(data);
                    }       
                })
                Swal.fire(
                    'Eliminado',
                    'El registro ha sido eliminado exitosamente.',
                    'success'
                )
                setTimeout(function() {
                    location.reload();           
                }, 2000);
            }
          })
    });
} );





