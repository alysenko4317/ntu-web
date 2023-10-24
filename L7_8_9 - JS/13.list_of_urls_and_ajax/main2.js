
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

function loadListDataAndCreateBlocks() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8080/getListItems?version=v1', true); // Change this URL to your server endpoint
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const listItems2 = JSON.parse(xhr.responseText);
            createBlocksInBody(3, listItems2);
        }
    };
    xhr.send();
}

// Invoke the function to generate the blocks of links when the document loads
document.addEventListener('DOMContentLoaded', loadListDataAndCreateBlocks);
