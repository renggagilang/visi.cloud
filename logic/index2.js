class Stack {
  constructor() {
    this.items = [];
  }

  push(element) {
    this.items.push(element);
  }

  pop() {
    if (this.isEmpty()) {
      return "Stack sudah kosong";
    }
    return this.items.pop();
  }

  peek() {
    if (this.isEmpty()) {
      return "Stack kosong";
    }
    return this.items[this.items.length - 1];
  }

  isEmpty() {
    return this.items.length === 0;
  }
}

let stack = new Stack();

stack.push(1);
stack.push(2);
stack.push(3);

console.log("Elemen teratas:", stack.peek()); // Output: Elemen teratas: 3

console.log("Pop:", stack.pop()); // Output: Pop: 3

console.log("Apakah stack kosong?", stack.isEmpty()); // Output: Apakah stack kosong? false
