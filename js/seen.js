
function setSeen(element,idList, idMovie, seen) {
    $.ajax({
        method: "POST",
        url: "setSeen.php",
        data: { idMovie: idMovie, seen: seen, idList: idList }
    });

    if (seen) {
        $(element).parent().parent().css('background-color', 'yellow')
    } else {
        $(element).parent().parent().css('background-color', 'white')
    }
}