// greet.ts
function greet(name: string): string {
    return `Привіт, ${name}!`;
}

document.getElementById("output")!.textContent += "\n" + greet("TypeScript");
