$('.json-viewer').each(function () {
    var json = $(this).text();
    if (json[0] == '{' || json[0] == '[') {
        $(this).jsonview(json);
    }
});