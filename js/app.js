$(document).ready(function(){
    $('.modal-trigger').leanModal();
});
function borrarCollection(url) {
    $.ajax({
        url: url,
        context: document.body,
        success: function (data) {
            actualizarListado(data);
        }
    });
}

function actualizarListado(responseXML) {
    if ($("eliminado", responseXML).text() === "1") {
        $("#"+(
            $("id", responseXML).text())
            ).remove();        
    } else {
        window.alert("Error: no se pudo eliminar a ");
    }
    

}

function editarPelicula(url, id) {
    $('#modalCuenca').openModal();
    $.ajax({
        url: url,
        context: document.body,
        success: function (data) {
           console.log(data)
        },
        error: function(data){
          console.log( data);  
        }
    });
}
