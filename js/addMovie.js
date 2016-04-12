
function addMovie(idList, name, director, rating, year, seen) {
    $.ajax({
        method: "POST",
        url: "agregarPelicula.php",
        data: {
             idList: idList, 
             name: name, 
             director: director, 
             rating: rating, 
             year: year}
    });
window.location.replace("./");

}