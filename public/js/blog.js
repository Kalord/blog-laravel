/**
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
    //Conc
    else {
        currentUrl += `&${key}=${value}`;
    }

    window.history.pushState(null, null, window.location.pathname + currentUrl);
};

/**
 * @param {string} key
 * @param {string} value
 */
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

const updatePosts = () => {
    let posts = $('.single-item');
    let last = $(posts.get(posts.length - 1)).attr('data-id');

    $.ajax({
        type: 'GET',
        url: '/api/posts',
        data: {
            limit: 10,
            pivot: last
        },
        success: (html) => {
            html.forEach(post => {
                $('.blog-items').append(`
                <div class="single-item">
                    <div class="bi-pic">
                        <img src="${post.cover}" alt="" style="width: 300px;">
                    </div>
                    <div class="bi-text">
                    <h4><a href="/blog/detail/${post.id}">${post.title}</a></h4>
                    <ul>
                        <li>${post.user.name}</li>
                        <li>${post.category.title}</li>
                    </ul>
                    <p>It’s that time again when people start thinking about their New Years Resolutions.
                       Usually they involve, losing weight, quitting smoking, and joining a gym, just to
                        mention a few.
                    </p>
                    <a href="/blog/detail/${post.id}" class="btn btn-success">Читать далее</a>
                    </div>
                </div>
                `)
            });
        }
    })
};

$(document).ready((event) => {
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

    $('.reset-category').click((event) => {
        let states = window.location.search.slice(1).split('&');
        let regExp = new RegExp(/category=\d+/);

        states.forEach(state => {
            if (state.match(regExp)) {
                states.shift(states.indexOf(state));
            }
        });
    });

    updatePosts();
});
