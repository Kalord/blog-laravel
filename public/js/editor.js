$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});

const SRC_KEY = '@update';

/**
 * Файлы для загрузки
 **/
let imgs = [];
let dataUrl = [];

const getEditorData = (status) => {
    let formData = new FormData();
    let identity = identityUser();
    let tags = selectedTags();

    formData.append('title', $('.title').html());
    formData.append('description', $('.description').html());
    formData.append('cover', $('.cover').prop('files')[0]);
    formData.append('id_category', $('.category').val());

    if (tags.length) {
        formData.append('selectedTags', tags);
    }

    let editor = $('#editor');

    if (imgs.length) {
        let resources = editor.find('.editor-img');
        dataUrl = [];

        for (let i = 0; i < imgs.length; i++) {
            let resource = $(resources.get(i));
            dataUrl.push(resource.attr('src'))
            formData.append(`resource-${i}`, imgs[i]);
            resource.attr('src', SRC_KEY);
        }

        resources.attr('src', SRC_KEY);
        formData.append('src_key', SRC_KEY);
    }

    formData.append('status', status);
    formData.append('id_user', identity);
    formData.append('content', editor.html());
    formData.append('_token', $('[name="_token"]').val());

    return formData;
};

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

    for (let i = 0; i < tags.length; i++) {
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

/**
 * Замена заглушек пути до изображения на соответствующие данные из массива dataUrl
 **/
const setDataForImage = () => {
    let resources = $('#editor').find('.editor-img');

    for(let i = 0; i < dataUrl.length; i++)
    {
        let resource = $(resources.get(i));
        resource.attr('src', dataUrl[i]);
    }
};

$('.btn-save').click((event) => {
    /**
     * Текущая нажатая кнопка
     */
    let buttonSave = $(event.target);
    /**
     * Предпросмотры
     */
    if (status === 'view') {
        viewPost();
        return;
    }
    /**
     * Обработчик успешного запроса
     */
    const successCallback = (html) => {
        setTimeout(() => {
            window.location.href = `/blog/detail/${html.id}`;
        }, 300);

        $('.alert').hide();
        $('.alert-save-post').show();

        setDataForImage();
    };
    /**
     * Обработчик провального запроса
     */
    const errorCallback = (html) => {
        setDataForImage();
    };

    createPostRequest(
        getEditorData(buttonSave.attr('data-type')),
        successCallback,
        errorCallback
    );
});

const toggleSelected = (button) => {
    button = $(button);

    if (button.hasClass('badge-light')) {
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

$('.img-load').click((event) => {
    $('.modal').show();
});

$('.close').click((event) => {
    $('.modal').hide();
});

$('.img-to-editor').click((event) => {
    let file = $('.image').prop('files')[0];
    let reader = new FileReader();

    reader.readAsDataURL(file);

    reader.onload = () => {
        imgs.push(file);

        $('#editor').append(`<img src="${reader.result}" class="editor-img">`);
        $('.modal').hide();
    }
});

/**
 * Отображение публикаций
 */
if ($('.editor-index').get(0)) {
    const successCallback = (html) => {
        html.forEach(post => {
            $('.table-body').append(`
            <tr>
            <td data-label="Contact ID">
                ${post.title}
            </td>
            <td data-label="Power">${post.category_title}</td>
            <td data-label="Expiration">${post.views}</td>
            <td data-label="Value">
                <a href="/blog/detail/${post.id}" class="btn btn__active">Просмотр</a>
                <a href="/editor/update/${post.id}" class="btn btn__active">Изменить</a>
                <a class="btn btn__active delete-button">Удалить</a>
            </td>
            </tr>
        `);
        });
    };
    const errorCallback = (html) => {
        console.log(html);
    }

    getPostsRequest(successCallback, errorCallback, 10, identityUser());
}

/**
 * Обновление записи
 */
$('.btn-change').click((event) => {
    console.log('Change');
});
