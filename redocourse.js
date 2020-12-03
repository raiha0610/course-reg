var arr = new Array();	// array for header.
arr =['','COURSE_ID','COURSE_NAME','CREDIT']

// first create TABLE structure with the headers. 
function createTable() {
    var redoTable = document.createElement('table');
    redoTable.setAttribute('id', 'redoTable'); // table id.

    var tr = redoTable.insertRow(-1);
    for (var h = 0; h < arr.length; h++) {
        var th = document.createElement('th'); // create table headers
        th.innerHTML = arr[h];
        tr.appendChild(th);
    }

    var div = document.getElementById('cont');
    div.appendChild(redoTable);  // add the TABLE to the container.
}

// now, add a new to the TABLE.
function newRow() {
    var redoTab = document.getElementById('redoTable');

    var rowCnt = redoTab.rows.length;   // table row count.
    var tr = redoTab.insertRow(rowCnt); // the table row.
    tr = redoTab.insertRow(rowCnt);

    for (var c = 0; c < arr.length; c++) {
        var td = document.createElement('td'); // table definition.
        td = tr.insertCell(c);

        if (c == 0) {      // the first column.
            // add a button in every new row in the first column.
            var button = document.createElement('input');

            // set input attributes.
            button.setAttribute('type', 'button');
            button.setAttribute('value', 'Remove');

            // add button's 'onclick' event.
            button.setAttribute('onclick', 'removeRow(this)');

            td.appendChild(button);
        }
        else {
            // 2nd, 3rd and 4th column, will have textbox.
            var ele = document.createElement('input');
            ele.setAttribute('type', 'text');
            ele.setAttribute('value', '');

            td.appendChild(ele);
        }
    }
}

// delete TABLE row function.
function removeRow(oButton) {
    var redoTab = document.getElementById('redoTable');
    redoTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // button -> td -> tr.
}
