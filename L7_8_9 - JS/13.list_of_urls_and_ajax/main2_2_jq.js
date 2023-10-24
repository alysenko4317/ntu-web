
$(document).ready(function() {
    // Loading the v1 list on document load
    loadListDataAndCreateBlocks('v1');

    // Setting up event for the v2 button
    $('#loadV2Button').click(function() {
        loadListDataAndCreateBlocks('v2');
    });
});

function createList(listItems) {
    const $ulElement = $('<ul>').addClass('list');
    listItems.forEach(item => {
        const $liElement = $('<li>');
        const $aElement = $('<a>', {
            href: item.href,
            text: item.title
        });
        $liElement.append($aElement);
        $ulElement.append($liElement);
    });
    return $ulElement;
}

function createBlocksInBody(count, list) {
    for(let i = 0; i < count; i++) {
        const $divElement = $('<div>').addClass('block');
        const $divNumberElement = $('<div>').text(`${i+1}`);
        const $ulElement = createList(list);
        $divElement.append($divNumberElement, $ulElement);
        $('body').append($divElement);
    }
}

function loadListDataAndCreateBlocks(version) {
    $.get(`http://localhost:8080/getListItems?version=${version}`, function(data) {
        createBlocksInBody(3, data);
    });
}

/*
 * The $ prefix on variable names is a common convention in the jQuery community to indicate
 *   that the variable holds a jQuery object, rather than a plain DOM object or some other type
 *   of data. This can make it easier to identify at a glance which variables are jQuery objects
 *   and which are not.
 *
 * For instance:
 *
 *   divElement might be a plain DOM element.
 *   $divElement would be a jQuery object representing a DOM element.
 *
 * It's purely a naming convention and doesn't affect the functionality of the code, but can be
 *   helpful for clarity when reading the code. However, if you find it confusing or prefer not
 *   to use it, it's perfectly okay to omit the $ prefix.
 *
 * -------------------
 *
 * In the context of jQuery, $ is essentially an alias for the jQuery object. So, when you see
 *   $.something, it usually refers to a static method or property on the jQuery object.
 *
 * For example:
 *
 *   $.ajax is jQuery's AJAX method.
 *   $.extend is a method to merge two or more objects together.
 *
 * Using $ as a shorthand for the jQuery object makes the code more concise and is widely recognized
 *   in the community.
 */
 