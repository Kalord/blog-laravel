$('.ajax-form').submit((event) => {
    $.ajax({
        type: $('.ajax-form').attr('method'),
        url: $('.ajax-form').attr('action'),
        data: $('.ajax-form').serialize()
    });

    return false;
});