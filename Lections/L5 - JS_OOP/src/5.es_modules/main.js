import { add, multiply } from "./math.js";
import Greeter from "./greeter.js";

const output = document.getElementById("output");

const greeter = new Greeter("JavaScript");

output.innerHTML = `
    <p>${greeter.greet()}</p>
    <p>add(2, 3) = ${add(2, 3)}</p>
    <p>multiply(4, 5) = ${multiply(4, 5)}</p>
`;

console.log("Модулі завантажено успішно.");
