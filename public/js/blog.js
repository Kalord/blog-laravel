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
    //Conc
    else {
        currentUrl += `&${key}=${value}`;
    }

    window.history.pushState(null, null, window.location.pathname + currentUrl);
};

const removeSearchStateURL = (key, value) => {
    let currentUrl = window.location.search;
    let states = currentUrl.slice(1).split('&');
    let index = `${key}=${value}`;

    if (states.length == 1) {
        currentUrl = '';
    } else if (states.indexOf(index) == 0) {
        currentUrl = currentUrl.replace(index, '');
        currentUrl = currentUrl.replace('?&', '?');
    } else {
        currentUrl = currentUrl.replace(`&${index}`, '');
    }

    window.history.pushState(null, null, window.location.pathname + currentUrl);
}

$('.item-category').click((event) => {
    let element = $(event.target);

    while (element.prop('tagName') != 'LI') {
        element = element.parent();
    }

    updateSearchStateURL('category', element.attr('data-id'));
});

$('.tag-item').click((event) => {
    let element = $(event.target);

    if (element.hasClass('active-tag')) {
        element.removeClass('active-tag');
        removeSearchStateURL('tag', element.attr('data-id'));
        return;
    }

    element.addClass('active-tag')
    updateSearchStateURL('tag', element.attr('data-id'), false);
})