$(function () {
    $('#subida').submit(function () {
        var comprobar = $('#title').val().length * $('#foto').val().length* $('#galery').val().length* $('#desc_short').val().length * $('#desc_long').val().length * $('#status').val().length * $('#creation_date').val().length;

        if (comprobar > 0) {

            var formulario = $('#subida');

            var datos = formulario.serialize();

            var archivos = new FormData();

            var url = 'php/Upload_Photo.php';

            for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {

                archivos.append((formulario.find('input[type="file"]:eq(' + i + ')').attr("name")), ((formulario.find('input[type="file"]:eq(' + i + ')')[0]).files[0]));

            }

            $.ajax({
                url: url + '?' + datos,
                type: 'POST',
                contentType: false,
                data: archivos,
                processData: false,
                beforeSend: function () {

                    $('#cargando').show(300);

                },
                success: function (data) {

                    $('#cargando').hide(900);
                    $(location).attr('href', 'Galery_Photos.php');

                    return false;
                }

            });

            return false;

        } else {


            var imagen = document.getElementById("foto").files;
            if (imagen.length == 0)

            {
              //  $('#foto').after('<div class="alert alert-danger">No has seleccionado ningun archivo</div>');
                
                bootbox.alert("No has seleccionado ningun archivo");
                return false;
            }
            else

            {

                for (x = 0; x < imagen.length; x++)

                {



                    if (imagen[x].type != "image/png" && imagen[x].type != "image/jpg" && imagen[x].type != "image/jpeg" && imagen[x].type != "image/gif")

                    {
                        //$('#foto').after('<div class="alert alert-danger">El archivo ' + imagen[x].name + '  no es una imagen, selecciona una imagen</div>');
                        bootbox.alert("El archivo" + imagen[x].name+ " no es una imagen");    
                        return false;

                    }


                    if (imagen[x].size > 1024 * 1024 * 2)

                    {
                        //$('#foto').after('<div class="alert alert-danger">La imagen ' + imagen[x].name + '  pesa mas de 3 MB selescciona otro archivo</div>');
                        bootbox.alert("El archivo   " + imagen[x].name+ " sobrepasa el peso permitido");    
                        return  false;
                    }
                }
            }

        }
    });
});
