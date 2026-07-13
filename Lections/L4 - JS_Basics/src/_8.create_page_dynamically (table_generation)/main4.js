function generateTable(rows, cols) {
    // Create the table element
    let table = document.createElement('table');
    table.border = "1"; // You can adjust this or remove if you don't want borders

    for (let i = 0; i < rows; i++) {
        let tr = document.createElement('tr');
        for (let j = 0; j < cols; j++) {
            let td = document.createElement('td');
            td.innerHTML = `Row ${i + 1} Col ${j + 1}`; // You can customize this as needed
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }

    return table;
}

// Example usage:
let tableElement = generateTable(5, 3); // Generates a table with 5 rows and 3 columns
document.body.appendChild(tableElement);