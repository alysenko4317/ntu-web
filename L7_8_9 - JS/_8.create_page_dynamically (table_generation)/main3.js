let tag = document.createElement('div');
let tagH1 = document.createElement('h1');
let tagSpan = document.createElement('span');

tagSpan.innerHTML = 'Text of Header';
tagH1.appendChild(tagSpan);
tag.appendChild(tagH1);

//tag.innerHTML = 'Content';
tag.classList.add('selected');

document.body.appendChild(tag);


<div class="selected"><h1><span>'Text of Header'</span></h1></div>



