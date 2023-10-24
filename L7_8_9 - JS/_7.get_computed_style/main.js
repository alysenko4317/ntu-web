let tag = document.querySelector('#block');
console.log("backgroundColor:" + tag.style.backgroundColor);
console.log("tag.style.borderColor:" + tag.style.borderColor);

let cs = getComputedStyle(tag);
console.log("computedStyle:borderColor:" + cs.borderColor )
console.log("computedStyle:borderRadius:" + cs.borderRadius )