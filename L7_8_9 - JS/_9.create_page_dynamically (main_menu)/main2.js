// Function to generate a random color.
function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function renderMenu(menuItems) {
    const tags = document.body.children[0].children[0].children[0].children;

    Array.from(tags).forEach((tag, index) => {
        tag.innerHTML = index < menuItems.length ? menuItems[index] : 'Item ' + (index + 1);
        tag.style.color = getRandomColor();
    });

    const nextTag = tags[0].nextElementSibling;
    const prevTag = tags[0].previousElementSibling;

    console.log("nextTag=", nextTag);
    console.log("prevTag=", prevTag);

    nextTag.style.fontWeight = "bold";
    console.log(nextTag.parentNode.parentNode);
}

function loadMenu() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8080/getMenu', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const menuItems = JSON.parse(xhr.responseText);
            renderMenu(menuItems);
        }
		else
			console.log(`state=${xhr.readyState}, status=${xhr.status}`)
    };
    xhr.send();
}

// Initialize
loadMenu();

