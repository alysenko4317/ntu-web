function createList(listItems) {
    let ulElement = document.createElement('ul');
    ulElement.classList.add('list');
    for (let i = 0; i < listItems.length; i++) {
        let liElement = document.createElement('li');
        let aElement = document.createElement('a');
        aElement.innerText = listItems[i].title;
        aElement.setAttribute('href', listItems[i].href);
        liElement.appendChild(aElement);
        ulElement.appendChild(liElement);
    }
    return ulElement;
}

function createBlocksInBody(count, list) {
    for(let i = 0; i < count; i++) {
        let divElement = document.createElement('div');
        let divNumberElement = document.createElement('div');
        let ulElement = createList(list);
        divNumberElement.innerText = `${i+1}`;
        divElement.appendChild(divNumberElement);
        divElement.appendChild(ulElement);
        divElement.classList.add('block');
        document.body.appendChild(divElement);
    }
}

function loadListDataAndCreateBlocks(version) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `http://localhost:8080/getListItems?version=${version}`, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const listItems = JSON.parse(xhr.responseText);
            createBlocksInBody(3, listItems);
        }
    };
    xhr.send();
}

document.addEventListener('DOMContentLoaded', function() {
    loadListDataAndCreateBlocks('v1');
});

function loadVersion2() {
    loadListDataAndCreateBlocks('v2');
}
