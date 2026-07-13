export default class Greeter {
    constructor(name) {
        this.name = name;
    }

    greet() {
        return `Привіт, ${this.name}!`;
    }
}
