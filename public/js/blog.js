/**
 * Обновление URL в соответствии с поисковыми параметрами
 *
 * @param {string} key
 * @param {string} value
 * @param {bool} replaceInCaseExists
 */
const updateSearchStateURL = (key, value, replaceInCaseExists = true) => {
    let currentUrl = window.location.search;

    //Empty
    if (!currentUrl) {
        currentUrl = `?${key}=${value}`;
    }
    //Replace
    else if (replaceInCaseExists && currentUrl.search(key) != -1) {
        let regExp = new RegExp(`${key}=\\d+`);
        currentUrl = currentUrl.replace(regExp, `${key}=${value}`);
    }
    //Concatenation
    else {
        currentUrl += `&${key}=${value}`;
    }

    window.history.pushState(null, null, window.location.pathname + currentUrl);
};

/**
 * Удаление URL параметров
 *
 * @param {string} key
 * @param {string} value
 */
const removeSearchStateURL = (key, value) => {
    let currentUrl = window.location.search;
    let states = currentUrl.slice(1).split('&');
    let index = `${key}=${value}`;

    if (states.length === 1) {
        currentUrl = '';
    } else if (states.indexOf(index) === 0) {
        currentUrl = currentUrl.replace(index, '');
        currentUrl = currentUrl.replace('?&', '?');
    } else {
        currentUrl = currentUrl.replace(`&${index}`, '');
    }

    window.history.pushState(null, null, window.location.pathname + currentUrl);
};

/**
 * Получение категории для поиска
 *
 * @returns {string|null}
 */
const getCategoryState = () => {
    let matches = window.location.search.match(/category=(\d+)/);

    if(!matches) return null;

    return matches[1];
};

/**
 * Отсчистка контейнера с публикациями
 */
const cleanPostsContainer = () => {
    $('.blog-items').empty();
};

/**
 * Обновление контейнера с публикациями
 */
const updatePosts = () => {
    /**
     * Лимит выборки постов
     * @type {number}
     */
    let limit       = 10;
    /**
     * Опорный идентификатор после которого начинается выборка
     * @type {null|undefined|jQuery}
     */
    let pivot       = $('.single-item').last().attr('data-id');
    /**
     * Категория
     * @type {string}
     */
    let id_category = getCategoryState();
    /**
     * Обработчик успешного запроса
     * @param posts
     */
    let successCallback = (posts) => {
        posts.filter(post => {
            singlePostTemplate(post);
        })
    };
    /**
     * Обработчик провального запроса
     * @param error
     */
    let errorCallback = (error) =>  {
        console.log(error);
    };
    /**
     * Инициация запроса
     */
    getPostsRequest(successCallback, errorCallback, limit, pivot, id_category);
};

$(document).ready((event) => {
    /**
     * Событие нажатия на поисковой фильтр по категориям
     */
    $('.item-category').click((event) => {
        let element = $(event.target);

        while (element.prop('tagName') !== 'LI') {
            element = element.parent();
        }

        updateSearchStateURL('category', element.attr('data-id'));
        cleanPostsContainer();
        updatePosts();
    });

    /**
     * Событие нажатия на поисковой фильтр по тегам
     * TODO: Доделать
     */
    $('.tag-item').click((event) => {
        let element = $(event.target);

        if (element.hasClass('active-tag')) {
            element.removeClass('active-tag');
            removeSearchStateURL('tag', element.attr('data-id'));
            return;
        }

        element.addClass('active-tag');
        updateSearchStateURL('tag', element.attr('data-id'), false);
    });

    /**
     * Сброс категорий
     * TODO: Доделать
     */
    $('.reset-category').click((event) => {
        let states = window.location.search.slice(1).split('&');
        let regExp = new RegExp(/category=\d+/);

        states.forEach(state => {
            if (state.match(regExp)) {
                states.shift(states.indexOf(state));
            }
        });
    });

    /**
     * Подгрузка публикаций
     */
    $('.more-blog').click((event) => {
        updatePosts();
    });

    updatePosts();
});

const getIdCurrentPost = () => {
    let result = window.location.href.match(/\d+$/);

    return result ? result[0] : null;
}

/**
 * Stars
 **/
$('.star').click((event) => {
    $('.star').removeClass('selected-star');
    let star = $(event.target);
    let stars = 0;

    while(star.hasClass('star'))
    {
        star.addClass('selected-star');
        stars++;
        star = star.prev();
    }

    $.ajax({
        type: 'GET',
        url: '/blog/stars',
        data: {
            id_post: getIdCurrentPost(),
            stars: stars
        }
    });
})
