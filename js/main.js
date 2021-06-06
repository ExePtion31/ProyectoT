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

    //ACTUALIZAR REGISTRO ESTUDIANTES
    $('#update_estudiante').on('submit',function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();

        if($('#nombreACT').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite el nombre.'
            })
        }else if($('#edadACT').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite la edad.'
            })
        }else if($('#cursoACT').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione un curso.'
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
                            'Registro actualizado exitosamente',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();           
                        }, 2000);
                    }else{
                        Swal.fire(
                            'Error',
                            'Hubo un error al actualizar el registro.',
                            'error'
                        )
                    }
                }
            })
        }
    });

    //ACTUALIZAR REGISTRO MATERIAS
    $('#update_materias').on('submit',function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();

        if($('#materiaATC').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite el nombre de la materia.'
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
                            'Registro actualizado exitosamente',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();           
                        }, 2000);
                    }else{
                        Swal.fire(
                            'Error',
                            'Hubo un error al actualizar el registro.',
                            'error'
                        )
                    }
                }
            })
        }
    });

    //ACTUALIZAR REGISTRO CALIFICACIONES
    $('#form_edit_notas').on('submit',function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();

        if($('#calificacionACT').val().trim() === ''){
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
                            'Registro actualizado exitosamente',
                            'success'
                        )
                        setTimeout(function() {
                            location.reload();           
                        }, 2000);
                    }else{
                        Swal.fire(
                            'Error',
                            'Hubo un error al actualizar el registro.',
                            'error'
                        )
                    }
                }
            })
        }
    });

    //VALIDAR TRADUCTOR
    $('#form_translate').on('submit',function(e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        var Lentrada = document.getElementById('Lentrada')
        var Lsalida = document.getElementById('Lsalida')

        if(Lentrada.value === Lsalida.value){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los idiomas tienen que ser diferentes.'
            })
        }else if(Lentrada.value == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione el idioma de entrada.'
            })
        }else if(Lsalida.value == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione el idioma de salida.'
            })
        }else if($('#textotraducir').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, escriba el texto a traducir.'
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
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Mensaje traducido',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        var traducido = document.getElementById('textotraducido');
                        traducido.value = resultado.palabra;
                    }else{
                        Swal.fire(
                            'Error',
                            'Hubo un error al traducir.',
                            'error'
                        )
                    }
                }
            })            
        }
    });
});

function getDataTorta(){
    $.ajax({
        type: 'POST',
        data : '',
        url: 'php/graficaTorta.php',
        dataType: 'json',
        success: function(data){
            var resultado = data;
            graficoTorta(resultado);
        }
    })    
}

function graficoTorta(data){
    console.log(data);
    torta = {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Promedios de calificación por materia'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Promedio Total',
            colorByPoint: true,
            data: [{ 
                name: data[0]['materia'],
                y: data[0]['promedio']
            }]
        }]
    };  

    Highcharts.chart('container',torta)  

}

function graficaBarras(){
    Highcharts.chart('container2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Estudiantes según su promedio totalizado de todas las materias'
        },
        subtitle: {
            text: ''
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Estudiantes según su promedio'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [
            {
                name: "Browsers",
                colorByPoint: true,
                data: [
                    {
                        name: "Chrome",
                        y: 62.74,
                        drilldown: "Chrome"
                    },
                    {
                        name: "Firefox",
                        y: 10.57,
                        drilldown: "Firefox"
                    },
                    {
                        name: "Internet Explorer",
                        y: 7.23,
                        drilldown: "Internet Explorer"
                    },
                    {
                        name: "Safari",
                        y: 5.58,
                        drilldown: "Safari"
                    },
                    {
                        name: "Edge",
                        y: 4.02,
                        drilldown: "Edge"
                    },
                    {
                        name: "Opera",
                        y: 1.92,
                        drilldown: "Opera"
                    },
                    {
                        name: "Other",
                        y: 7.62,
                        drilldown: null
                    }
                ]
            }
        ],
        drilldown: {
            series: [
                {
                    name: "Chrome",
                    id: "Chrome",
                    data: [
                        [
                            "v65.0",
                            0.1
                        ],
                        [
                            "v64.0",
                            1.3
                        ],
                        [
                            "v63.0",
                            53.02
                        ],
                        [
                            "v62.0",
                            1.4
                        ],
                        [
                            "v61.0",
                            0.88
                        ],
                        [
                            "v60.0",
                            0.56
                        ],
                        [
                            "v59.0",
                            0.45
                        ],
                        [
                            "v58.0",
                            0.49
                        ],
                        [
                            "v57.0",
                            0.32
                        ],
                        [
                            "v56.0",
                            0.29
                        ],
                        [
                            "v55.0",
                            0.79
                        ],
                        [
                            "v54.0",
                            0.18
                        ],
                        [
                            "v51.0",
                            0.13
                        ],
                        [
                            "v49.0",
                            2.16
                        ],
                        [
                            "v48.0",
                            0.13
                        ],
                        [
                            "v47.0",
                            0.11
                        ],
                        [
                            "v43.0",
                            0.17
                        ],
                        [
                            "v29.0",
                            0.26
                        ]
                    ]
                },
                {
                    name: "Firefox",
                    id: "Firefox",
                    data: [
                        [
                            "v58.0",
                            1.02
                        ],
                        [
                            "v57.0",
                            7.36
                        ],
                        [
                            "v56.0",
                            0.35
                        ],
                        [
                            "v55.0",
                            0.11
                        ],
                        [
                            "v54.0",
                            0.1
                        ],
                        [
                            "v52.0",
                            0.95
                        ],
                        [
                            "v51.0",
                            0.15
                        ],
                        [
                            "v50.0",
                            0.1
                        ],
                        [
                            "v48.0",
                            0.31
                        ],
                        [
                            "v47.0",
                            0.12
                        ]
                    ]
                },
                {
                    name: "Internet Explorer",
                    id: "Internet Explorer",
                    data: [
                        [
                            "v11.0",
                            6.2
                        ],
                        [
                            "v10.0",
                            0.29
                        ],
                        [
                            "v9.0",
                            0.27
                        ],
                        [
                            "v8.0",
                            0.47
                        ]
                    ]
                },
                {
                    name: "Safari",
                    id: "Safari",
                    data: [
                        [
                            "v11.0",
                            3.39
                        ],
                        [
                            "v10.1",
                            0.96
                        ],
                        [
                            "v10.0",
                            0.36
                        ],
                        [
                            "v9.1",
                            0.54
                        ],
                        [
                            "v9.0",
                            0.13
                        ],
                        [
                            "v5.1",
                            0.2
                        ]
                    ]
                },
                {
                    name: "Edge",
                    id: "Edge",
                    data: [
                        [
                            "v16",
                            2.6
                        ],
                        [
                            "v15",
                            0.92
                        ],
                        [
                            "v14",
                            0.4
                        ],
                        [
                            "v13",
                            0.1
                        ]
                    ]
                },
                {
                    name: "Opera",
                    id: "Opera",
                    data: [
                        [
                            "v50.0",
                            0.96
                        ],
                        [
                            "v49.0",
                            0.82
                        ],
                        [
                            "v12.1",
                            0.14
                        ]
                    ]
                }
            ]
        }
    });
}