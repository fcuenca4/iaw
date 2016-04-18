$(document).ready(function () {
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
        $("#" + (
            $("id", responseXML).text())
        ).remove();
    } else {
        window.alert("Error: no se pudo eliminar a ");
    }


}

function editarPelicula(url, idMovie,idList) {
    $('#modalCuenca').openModal();

    $.ajax({
        method: "GET",
        url: "obtenerPelicula.php",
        dataType: "json",
        data: {
            idMovie: idMovie,
            idList: idList
        }
    })
        .done(function (msg) {

            $('#modalCuencaName').val(msg.name);
            $('#modalCuencaRating').val(msg.rating);
            $('#modalCuencaDirector').val(msg.director);
            $('#modalCuencaLink').val(msg.link);
            $('#modalCuencaYear').val(msg.year);
            console.log(msg);
        });
}
