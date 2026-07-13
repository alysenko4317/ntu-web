function highlightElements() {
    let elements = document.querySelectorAll('.example');

    console.log(elements);
	
    elements.forEach(function(element) {
        element.style.color = 'red';
        element.style.fontWeight = 'bold';
    });
	
	/*
	elements.forEach(element => {
        element.style.color = 'red';
        element.style.fontWeight = 'bold';
    });
	*/

    /*
	for (let i = 0; i < elements.length; i++) {
        let element = elements[i];
        element.style.color = 'red';
        element.style.fontWeight = 'bold';
    }
	*/
	
    /*
	elements.forEach(element => {
        element.classList.add('some_class_name_for_red_color')
		// або
		element.classList.remove('some_class_name_for_red_color')
		// або
		element.classList.toggle('some_class_name_for_red_color')
    });
	*/
	
	
}
