let tag = document.querySelector("#block");

tag.innerHTML = '<div>Some text</div><div>Some text</div><div>Some text</div>';
//tag.textContent = '<div>Some text     </div>   <div>Some    text</div><div>   Some text  </div>';

console.log(tag.textContent)
console.log(tag.innerText)
console.log(tag.innerHTML)
console.log(tag.outerHTML)
