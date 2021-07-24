

document.getElementById('calculation').onclick = function () {

  var array = [];
  for (var i = 0; i < 3; ++i) {
   array.push(document.getElementById("calculation_" + i));
  }
  
  console.log(array[1])
  
  
  //const table1 = document.getElementById("calculation_1")
  //const table2 = document.getElementById("calculation_items_motorcycle")
  //for (const r = 0, n = table.rows.length; r < n; r++) {
  // for (const c = 0, m = table.rows[r].cells.length; c < m; c++) {
  //  }
  //}
  //var interest = table1.rows[0].cells[1].innerHTML
  //var tenure = table1.rows[0].cells[2].innerHTML
  //var price = table2.rows[1].cells[1].innerHTML
  //Number(interest, tenure, price)
  //test3 = interest + (tenure * 12)

  //const items = document.createElement('h2')
  //items.innerHTML = test3
  //var currentDiv = document.getElementById("p1");
  //currentDiv.appendChild(items)
  //var currentDiv = document.getElementById("div1");
  //document.body.insertBefore(newDiv, currentDiv);
  }