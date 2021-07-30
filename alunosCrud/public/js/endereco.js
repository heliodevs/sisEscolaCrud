   function buscaEndeco(){

    $.get( "https://serviceweb.aix.com.br/aixapi/api/cep/" + $("#cep").val(),
    function( data ) {
        console.log(data);

        $("#rua").val(data.logradouro)
        $("#cidade").val(data.cidade)
        $("#bairro").val(data.bairro)
        $("#estado").val(data.estado)
    });

   }

