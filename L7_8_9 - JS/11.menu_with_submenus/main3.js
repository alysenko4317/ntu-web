document.body.addEventListener('click', function(event) {
    let tag = event.target;
    let nextTag = tag.nextElementSibling;

    console.log(tag);
	console.log(nextTag);
	
    if (nextTag !== null && nextTag.tagName === 'UL') {
        //nextTag.style.display = 'block';
		nextTag.classList.toggle('active');
		event.preventDefault();
    }
});