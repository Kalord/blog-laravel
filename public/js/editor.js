$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});
$(document).ready(function() {
    var colorPalette = ['000000', 'FF9966', '6699FF', '99FF66', 'CC0000', '00CC00', '0000CC', '333333', '0066FF', 'FFFFFF'],
        forePalette = $('.fore-palette'),
        backPalette = $('.back-palette'),
        editor = $('.editor');

    for (var i = 0; i < colorPalette.length; i++) {
        forePalette.append('<a href="#" data-command="foreColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
        backPalette.append('<a href="#" data-command="backColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
    }
    $('.toolbar a').click(function(e) {
        e.preventDefault();
        var command = $(this).data('command');
        if (command == 'h1' || command == 'h2' || command == 'p') {
            document.execCommand('formatBlock', false, command);
        }
        if (command == 'foreColor' || command == 'backColor') {
            var color = $(this).data('value');
            document.execCommand($(this).data('command'), false, color);
            alert(color);
        }
        if (command == 'removeFormat') {
            document.execCommand('removeFormat', false, command);
        }
        if (command == 'createlink' || command == 'insertimage') {
            url = prompt('Enter the link here: ', 'http:\/\/');
            console.log(command + " " + url);
            document.execCommand($(this).data('command'), false);
            // document.execCommand($(this).data('command') && 'enableObjectResizing', false, url);
        } else document.execCommand($(this).data('command'), false);
    });
    $('.editorAria img').click(function() {
        document.execCommand('enableObjectResizing', false);
    });
    $("#getHTML").click(function() {
        var editorId = $(this).attr('get-data');
        var html = $("#" + editorId).find('.editorAria').html();
        alert(html);
    });
});

const selectedTags = () => {
    let tags = $('.tags-list').find('.selected');
    let ids = [];

    for(let i = 0; i < tags.length; i++)
    {
        ids.push($(tags.get(i)).attr('data-id'));
    }

    return ids;
};

const viewPost = () => {

};

const identityUser = () => {
    let identity;

    $.ajax({
        type: 'GET',
        url: '/profile/identity',
        async: false,
        success: (html) => {
            identity = html;
        }
    });

    return identity;
};

$('.btn-save').click((event) => {
   let buttonSave = $(event.target);
   let status = buttonSave.attr('data-type');

   if(status === 'view') {
       viewPost();
       return;
   }

   let formData = new FormData();
   let identity = identityUser();

    formData.append('title', $('.title').html());
    formData.append('cover', $('.cover').prop('files')[0]);
    formData.append('id_category', $('.category').val());
    formData.append('selectedTags', selectedTags());
    formData.append('status', status);
    formData.append('id_user', identity);
    formData.append('content', $('#editor').html());
    formData.append('_token', $('[name="_token"]').val());

    $.ajax({
        type: 'POST',
        url: '/api/posts',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        data: formData,
        success: (html) => {
            console.log('Here');
        }
    });
});

const toggleSelected = (button) => {
    button = $(button);

    if(button.hasClass('badge-light'))
    {
        button.removeClass('badge-light');
        button.addClass('badge-primary');
        button.addClass('selected');
        return;
    }

    button.removeClass('badge-primary');
    button.removeClass('selected');
    button.addClass('badge-light');
};

$('.tag').click((event) => {
    toggleSelected(event.target);
});
