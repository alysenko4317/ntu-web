let tags = document.querySelectorAll('main a');

for(let i = 0; i < tags.length; i++) {
    tags[i].classList.add('link');  // Assuming 'lLink' was a typo and you meant 'link'
	
	tags[i].addEventListener('click', (event) => {
        event.preventDefault();
		event.target.classList.toggle('selected');
	});
}

tags[2].classList.add('selected');

console.log(tags);
