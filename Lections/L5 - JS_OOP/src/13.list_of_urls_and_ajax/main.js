
let listItems2 = [
	{
		title: 'IPZ-22-1',
		href: 'https://ipz221.ztu.edu.ua'
	},
	{
		title: 'IPZ-22-2',
		href: 'https://ipz222.ztu.edu.ua'
	},
	{
		title: 'IPZ-22-3',
		href: 'https://ipz223.ztu.edu.ua'
	}
];

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

// Invoke the function to generate the blocks of links when the document loads
document.addEventListener('DOMContentLoaded', () => {
    createBlocksInBody(3, listItems2);  // For instance, generating 3 blocks using the listItems2 data
});

