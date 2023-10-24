let tag = document.createElement('div');
let tagH1 = document.createElement('h1');
tagH1.innerHTML = 'Text of Header';
tag.appendChild(tagH1);
//tag.innerHTML = 'Content';
tag.classList.add('selected');
document.body.appendChild(tag);
