let body = document.body;
let children = body.children;

console.log(children);
console.log(children[0]);
console.log(children[0].children);
console.log(children[0].children[0]);

let tags = children[0].children[0].children[0].children;
console.log(tags);

const menuItems = [
    'Appetizer',
    'Salad',
    'Main Course',
    'Dessert',
    'Drink'
];

// Function to generate a random color.
function getRandomColor() {
    let letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

Array.from(tags).forEach(function(o, index) {
    // Assign menu text
    if (index < menuItems.length) {
        o.innerHTML = menuItems[index];
    } else {
        o.innerHTML = 'Item ' + (index + 1);
    }
    
    // Assign random color
    o.style.color = getRandomColor();
});

//---------------------------------------------

let nextTag = tags[0].nextElementSibling;
let prevTag = tags[0].previousElementSibling;

console.log("nextTag=" + nextTag);
console.log("prevTag=" + prevTag);

nextTag.style.fontWeight = "bold";
console.log(nextTag.parentNode.parentNode);
