function generateTable(rows, cols) {
    let table = document.createElement('table');

    // Create a table header
    let thead = document.createElement('thead');
    let headerRow = document.createElement('tr');
    for (let j = 0; j < cols; j++) {
        let th = document.createElement('th');
        th.innerHTML = `Column ${j + 1}`;
        headerRow.appendChild(th);
    }
    thead.appendChild(headerRow);
    table.appendChild(thead);

    // Create table body
    let tbody = document.createElement('tbody');
    for (let i = 0; i < rows; i++) {
        let tr = document.createElement('tr');
        for (let j = 0; j < cols; j++) {
            let td = document.createElement('td');
            td.innerHTML = `Row ${i + 1} Col ${j + 1}`;
            tr.appendChild(td);
        }
        tbody.appendChild(tr);
    }
    table.appendChild(tbody);

    return table;
}

// Example usage:
let tableElement = generateTable(5, 3); 
document.body.appendChild(tableElement);
