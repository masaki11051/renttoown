document.getElementById("hidden1").style.display ="none";
document.getElementById("hidden2").style.display = "none";
document.getElementById("hidden3").style.display ="none";

document.getElementById('calculation_1').onclick = function () {

  if(hidden1.style.display=="none"){
		// noneで非表示
		hidden1.style.display ="block";
	}

  //var array = [];
  //for (var i = 0; i < 3; ++i) {
  // array.push(document.getElementById("calculation_" + i));
  //}

  const table = document.getElementById("calculation")
  //const table2 = document.getElementById("calculation_items_motorcycle")
  //for (const r = 0, n = table.rows.length; r < n; r++) {
  // for (const c = 0, m = table.rows[r].cells.length; c < m; c++) {
  //  }
  //}
  var amount = parseInt(table.rows[0].cells[0].innerHTML)
  var interest = parseInt(table.rows[0].cells[1].innerHTML)
  var tenure = parseInt(table.rows[0].cells[2].innerHTML)
  var son = amount * (interest/100) * Math.pow((1+(interest/100)),(tenure*12));
  var mom = Math.pow((1+(interest/100)),(tenure*12)) - 1;
  var pmt = son / mom;
  var round_down = (Math.floor(pmt*100))/100;
  const RA = document.createElement('h2')
  RA.innerHTML = round_down
  var currentDiv = document.getElementById("div1");
  currentDiv.appendChild(RA)
  //var currentDiv = document.getElementById("div1");
  //document.body.insertBefore(newDiv, currentDiv);
}

document.getElementById('calculation_2').onclick = function () {
   if(hidden1.style.display=="none"){
		// noneで非表示
		hidden1.style.display ="block";
	}

  //const table = document.getElementById("calculation")

  const table = document.getElementById("calculation")
  var amount = parseInt(table.rows[0].cells[0].innerHTML)
  var interest = parseInt(table.rows[0].cells[1].innerHTML)
  var tenure = parseInt(table.rows[0].cells[2].innerHTML)
  var son = amount * (interest / 100) * Math.pow((1 + (interest / 100)), (tenure * 12));
  var mom = Math.pow((1 + (interest / 100)), (tenure * 12)) - 1;
  var pmt = son / mom;
  var round_down = (Math.floor(pmt * 100)) / 100
  const RA = document.createElement('h2')
  RA.innerHTML = round_down

  var daily_payment_amount = (Math.floor((RA.innerHTML * (tenure * 12)) / (tenure *365) * 100)) / 100

  var date_calculation = table.rows[0].cells[3].innerHTML
  var ymd_year = parseInt(date_calculation.slice(0, 4))
  var ymd_month = parseInt(date_calculation.slice(5, 7))
  var ymd_day = parseInt(date_calculation.slice(8, 10))

  if (10 <= ymd_day && ymd_day <= 24) {
    var first_payment_amount = (Math.ceil(((30 - ymd_day + 1)*daily_payment_amount)*100)/100)
  } else if (1 <= ymd_day && ymd_day <= 9){
    var first_payment_amount = (Math.ceil(((15 - ymd_day + 1)*daily_payment_amount)*100)/100)
  } else {
    var first_payment_amount = (Math.ceil(((45 - ymd_day + 1)*daily_payment_amount)*100)/100)
  }
  const FRA = document.createElement('h2')
  FRA.innerHTML = first_payment_amount
  var currentDiv = document.getElementById("div2");
  currentDiv.appendChild(FRA)
}

document.getElementById('calculation_3').onclick = function () {
    if (hidden1.style.display == "none") {
        // noneで非表示
        hidden1.style.display = "block";
    }

    //const table = document.getElementById("calculation")

    const table = document.getElementById("calculation")
    var amount = parseInt(table.rows[0].cells[0].innerHTML)
    var interest = parseInt(table.rows[0].cells[1].innerHTML)
    var tenure = parseInt(table.rows[0].cells[2].innerHTML)
    var son = amount * (interest / 100) * Math.pow((1 + (interest / 100)), (tenure * 12));
    var mom = Math.pow((1 + (interest / 100)), (tenure * 12)) - 1;
    var pmt = son / mom;
    var round_down = (Math.floor(pmt * 100)) / 100
    const RA = document.createElement('h2')
    RA.innerHTML = round_down

    var daily_payment_amount = (Math.ceil((RA.innerHTML * (tenure * 12)) / (tenure * 365) * 100)) / 100

    var date_calculation = table.rows[0].cells[3].innerHTML
    var ymd_year = parseInt(date_calculation.slice(0, 4))
    var ymd_month = parseInt(date_calculation.slice(5, 7))
    var ymd_day = parseInt(date_calculation.slice(8, 10))

    if (10 <= ymd_day && ymd_day <= 24) {
        var first_payment_amount = (Math.ceil(((30 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
    } else if (1 <= ymd_day && ymd_day <= 9) {
        var first_payment_amount = (Math.ceil(((15 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
    } else {
        var first_payment_amount = (Math.ceil(((45 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
    }
    /////////////////////////////////////////////////////////////////////////////////////////////
    var tenure = parseInt(table.rows[0].cells[2].innerHTML)
    var date_calculation = table.rows[0].cells[3].innerHTML
    var ymd_year = parseInt(date_calculation.slice(0, 4))
    var ymd_month = parseInt(date_calculation.slice(5, 7) - 1)
    var ymd_day = parseInt(date_calculation.slice(8, 10))

    if (10 <= ymd_day && ymd_day <= 24) {
        var ymd_day = 30
    } else if (1 <= ymd_day && ymd_day <= 9) {
        var ymd_day = 15
    } else {
        var ymd_month = (ymd_month + 1)
        var ymd_day = 15
    }
    var date = new Date(ymd_year, ymd_month, ymd_day)

    var tableEle = document.getElementById('data-table')
    if (tenure === 2) {
        for (var i = 0; i <= 23; i++) {
            // テーブルの行を追加
            var tr = document.createElement('tr')
            for (var j = 0; j < 3; j++) {
                // テーブルの列を 3行追加する
                var td = document.createElement('td')
                if (j === 0) {
                    td.innerHTML = (i + 1)
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                } else if (j === 1) {
                    if (i >= 1) {
                        date.setMonth(date.getMonth() + 1)
                        td.innerHTML = date.toDateString();
                        tr.appendChild(td);
                    } else {
                        td.innerHTML = date.toDateString();
                        tr.appendChild(td);
                    }
                    tableEle.appendChild(tr)
                } else {
                    const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                    td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                }
            }
        }
    } else if (tenure === 3) {
        for (var i = 0; i <= 35; i++) {
            // テーブルの行を追加
            var tr = document.createElement('tr')
            for (var j = 0; j < 3; j++) {
                // テーブルの列を 3行追加する
                var td = document.createElement('td')
                if (j === 0) {
                    td.innerHTML = (i + 1)
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                } else if (j === 1) {
                    if (i >= 1) {
                        date.setMonth(date.getMonth() + 1)
                        td.innerHTML = date.toDateString();
                        tr.appendChild(td);
                    } else {
                        td.innerHTML = date.toDateString();
                        tr.appendChild(td);
                    }
                    tableEle.appendChild(tr)
                } else {
                    const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                    td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                }
            }
        }
    } else {
        for (var i = 0; i <= 47; i++) {
            // テーブルの行を追加
            var tr = document.createElement('tr')
            for (var j = 0; j < 3; j++) {
                // テーブルの列を 3行追加する
                var td = document.createElement('td')
                if (j === 0) {
                    td.innerHTML = (i + 1)
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                } else if (j === 1) {
                    if (i >= 1) {
                        date.setMonth(date.getMonth() + 1)
                        td.innerHTML = date.toDateString();
                        tr.appendChild(td);
                    } else {
                        td.innerHTML = date.toDateString();
                        tr.appendChild(td);
                    }
                    tableEle.appendChild(tr)
                } else {
                    const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                    td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                }
            }
        }
    }

    document.getElementById('calculation_4').onclick = function () {
        if (hidden2.style.display == "none") {
            // noneで非表示
            hidden2.style.display = "block";
        }

        const table = document.getElementById("calculation2")

        var amount = parseInt(table.rows[0].cells[0].innerHTML)
        var interest = parseInt(table.rows[0].cells[1].innerHTML)
        var tenure = parseInt(table.rows[0].cells[2].innerHTML)
        var son = amount * (interest / 100) * Math.pow((1 + (interest / 100)), (tenure * 12));
        var mom = Math.pow((1 + (interest / 100)), (tenure * 12)) - 1;
        var pmt = son / mom;
        var round_down = (Math.floor(pmt * 100)) / 100;
        const RA = document.createElement('h2')
        RA.innerHTML = round_down
        var currentDiv = document.getElementById("div3");
        currentDiv.appendChild(RA)
        //var currentDiv = document.getElementById("div1");
        //document.body.insertBefore(newDiv, currentDiv);
    }

    document.getElementById('calculation_5').onclick = function () {
        if (hidden2.style.display == "none") {
            // noneで非表示
            hidden2.style.display = "block";
        }

        //const table = document.getElementById("calculation")

        const table = document.getElementById("calculation2")
        var amount = parseInt(table.rows[0].cells[0].innerHTML)
        var interest = parseInt(table.rows[0].cells[1].innerHTML)
        var tenure = parseInt(table.rows[0].cells[2].innerHTML)
        var son = amount * (interest / 100) * Math.pow((1 + (interest / 100)), (tenure * 12));
        var mom = Math.pow((1 + (interest / 100)), (tenure * 12)) - 1;
        var pmt = son / mom;
        var round_down = (Math.floor(pmt * 100)) / 100
        const RA = document.createElement('h2')
        RA.innerHTML = round_down

        var daily_payment_amount = (Math.ceil((RA.innerHTML * (tenure * 12)) / (tenure * 365) * 100)) / 100

        var date_calculation = table.rows[0].cells[3].innerHTML
        var ymd_year = parseInt(date_calculation.slice(0, 4))
        var ymd_month = parseInt(date_calculation.slice(5, 7))
        var ymd_day = parseInt(date_calculation.slice(8, 10))

        if (10 <= ymd_day && ymd_day <= 24) {
            var first_payment_amount = (Math.ceil(((30 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        } else if (1 <= ymd_day && ymd_day <= 9) {
            var first_payment_amount = (Math.ceil(((15 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        } else {
            var first_payment_amount = (Math.ceil(((45 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        }
        const FRA = document.createElement('h2')
        FRA.innerHTML = first_payment_amount
        var currentDiv = document.getElementById("div4");
        currentDiv.appendChild(FRA)
    }

    document.getElementById('calculation_6').onclick = function () {
        if (hidden2.style.display == "none") {
            // noneで非表示
            hidden2.style.display = "block";
        }

        //const table = document.getElementById("calculation")

        const table = document.getElementById("calculation2")
        var amount = parseInt(table.rows[0].cells[0].innerHTML)
        var interest = parseInt(table.rows[0].cells[1].innerHTML)
        var tenure = parseInt(table.rows[0].cells[2].innerHTML)
        var son = amount * (interest / 100) * Math.pow((1 + (interest / 100)), (tenure * 12));
        var mom = Math.pow((1 + (interest / 100)), (tenure * 12)) - 1;
        var pmt = son / mom;
        var round_down = (Math.floor(pmt * 100)) / 100
        const RA = document.createElement('h2')
        RA.innerHTML = round_down

        var daily_payment_amount = (Math.ceil((RA.innerHTML * (tenure * 12)) / (tenure * 365) * 100)) / 100

        var date_calculation = table.rows[0].cells[3].innerHTML
        var ymd_year = parseInt(date_calculation.slice(0, 4))
        var ymd_month = parseInt(date_calculation.slice(5, 7))
        var ymd_day = parseInt(date_calculation.slice(8, 10))

        if (10 <= ymd_day && ymd_day <= 24) {
            var first_payment_amount = (Math.ceil(((30 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        } else if (1 <= ymd_day && ymd_day <= 9) {
            var first_payment_amount = (Math.ceil(((15 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        } else {
            var first_payment_amount = (Math.ceil(((45 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        var tenure = parseInt(table.rows[0].cells[2].innerHTML)
        var date_calculation = table.rows[0].cells[3].innerHTML
        var ymd_year = parseInt(date_calculation.slice(0, 4))
        var ymd_month = parseInt(date_calculation.slice(5, 7) - 1)
        var ymd_day = parseInt(date_calculation.slice(8, 10))

        if (10 <= ymd_day && ymd_day <= 24) {
            var ymd_day = 30
        } else if (1 <= ymd_day && ymd_day <= 9) {
            var ymd_day = 15
        } else {
            var ymd_month = (ymd_month + 1)
            var ymd_day = 15
        }
        var date = new Date(ymd_year, ymd_month, ymd_day)

        var tableEle = document.getElementById('data-table2')
        if (tenure === 2) {
            for (var i = 0; i <= 23; i++) {
                // テーブルの行を追加
                var tr = document.createElement('tr')
                for (var j = 0; j < 3; j++) {
                    // テーブルの列を 3行追加する
                    var td = document.createElement('td')
                    if (j === 0) {
                        td.innerHTML = (i + 1)
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    } else if (j === 1) {
                        if (i >= 1) {
                            date.setMonth(date.getMonth() + 1)
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        } else {
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        }
                        tableEle.appendChild(tr)
                    } else {
                        const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                        td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    }
                }
            }
        } else if (tenure === 3) {
            for (var i = 0; i <= 35; i++) {
                // テーブルの行を追加
                var tr = document.createElement('tr')
                for (var j = 0; j < 3; j++) {
                    // テーブルの列を 3行追加する
                    var td = document.createElement('td')
                    if (j === 0) {
                        td.innerHTML = (i + 1)
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    } else if (j === 1) {
                        if (i >= 1) {
                            date.setMonth(date.getMonth() + 1)
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        } else {
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        }
                        tableEle.appendChild(tr)
                    } else {
                        const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                        td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    }
                }
            }
        } else {
            for (var i = 0; i <= 47; i++) {
                // テーブルの行を追加
                var tr = document.createElement('tr')
                for (var j = 0; j < 3; j++) {
                    // テーブルの列を 3行追加する
                    var td = document.createElement('td')
                    if (j === 0) {
                        td.innerHTML = (i + 1)
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    } else if (j === 1) {
                        if (i >= 1) {
                            date.setMonth(date.getMonth() + 1)
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        } else {
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        }
                        tableEle.appendChild(tr)
                    } else {
                        const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                        td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    }
                }
            }
        }
    }

    document.getElementById('calculation_7').onclick = function () {
        if (hidden3.style.display == "none") {
            // noneで非表示
            hidden3.style.display = "block";
        }

        const table = document.getElementById("calculation3")

        var amount = parseInt(table.rows[0].cells[0].innerHTML)
        var interest = parseInt(table.rows[0].cells[1].innerHTML)
        var tenure = parseInt(table.rows[0].cells[2].innerHTML)
        var son = amount * (interest / 100) * Math.pow((1 + (interest / 100)), (tenure * 12));
        var mom = Math.pow((1 + (interest / 100)), (tenure * 12)) - 1;
        var pmt = son / mom;
        var round_down = (Math.floor(pmt * 100)) / 100;
        const RA = document.createElement('h2')
        RA.innerHTML = round_down
        var currentDiv = document.getElementById("div5");
        currentDiv.appendChild(RA)
        //var currentDiv = document.getElementById("div1");
        //document.body.insertBefore(newDiv, currentDiv);
    }

    document.getElementById('calculation_8').onclick = function () {
        if (hidden3.style.display == "none") {
            // noneで非表示
            hidden3.style.display = "block";
        }

        //const table = document.getElementById("calculation")

        const table = document.getElementById("calculation3")
        var amount = parseInt(table.rows[0].cells[0].innerHTML)
        var interest = parseInt(table.rows[0].cells[1].innerHTML)
        var tenure = parseInt(table.rows[0].cells[2].innerHTML)
        var son = amount * (interest / 100) * Math.pow((1 + (interest / 100)), (tenure * 12));
        var mom = Math.pow((1 + (interest / 100)), (tenure * 12)) - 1;
        var pmt = son / mom;
        var round_down = (Math.floor(pmt * 100)) / 100
        const RA = document.createElement('h2')
        RA.innerHTML = round_down

        var daily_payment_amount = (Math.ceil((RA.innerHTML * (tenure * 12)) / (tenure * 365) * 100)) / 100

        var date_calculation = table.rows[0].cells[3].innerHTML
        var ymd_year = parseInt(date_calculation.slice(0, 4))
        var ymd_month = parseInt(date_calculation.slice(5, 7))
        var ymd_day = parseInt(date_calculation.slice(8, 10))

        if (10 <= ymd_day && ymd_day <= 24) {
            var first_payment_amount = (Math.ceil(((30 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        } else if (1 <= ymd_day && ymd_day <= 9) {
            var first_payment_amount = (Math.ceil(((15 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        } else {
            var first_payment_amount = (Math.ceil(((45 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        }
        const FRA = document.createElement('h2')
        FRA.innerHTML = first_payment_amount
        var currentDiv = document.getElementById("div6");
        currentDiv.appendChild(FRA)
    }

    document.getElementById('calculation_9').onclick = function () {
        if (hidden3.style.display == "none") {
            // noneで非表示
            hidden3.style.display = "block";
        }

        //const table = document.getElementById("calculation")

        const table = document.getElementById("calculation3")
        var amount = parseInt(table.rows[0].cells[0].innerHTML)
        var interest = parseInt(table.rows[0].cells[1].innerHTML)
        var tenure = parseInt(table.rows[0].cells[2].innerHTML)
        var son = amount * (interest / 100) * Math.pow((1 + (interest / 100)), (tenure * 12));
        var mom = Math.pow((1 + (interest / 100)), (tenure * 12)) - 1;
        var pmt = son / mom;
        var round_down = (Math.floor(pmt * 100)) / 100
        const RA = document.createElement('h2')
        RA.innerHTML = round_down

        var daily_payment_amount = (Math.ceil((RA.innerHTML * (tenure * 12)) / (tenure * 365) * 100)) / 100

        var date_calculation = table.rows[0].cells[3].innerHTML
        var ymd_year = parseInt(date_calculation.slice(0, 4))
        var ymd_month = parseInt(date_calculation.slice(5, 7))
        var ymd_day = parseInt(date_calculation.slice(8, 10))

        if (10 <= ymd_day && ymd_day <= 24) {
            var first_payment_amount = (Math.ceil(((30 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        } else if (1 <= ymd_day && ymd_day <= 9) {
            var first_payment_amount = (Math.ceil(((15 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        } else {
            var first_payment_amount = (Math.ceil(((45 - ymd_day + 1) * daily_payment_amount) * 100) / 100)
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        var tenure = parseInt(table.rows[0].cells[2].innerHTML)
        var date_calculation = table.rows[0].cells[3].innerHTML
        var ymd_year = parseInt(date_calculation.slice(0, 4))
        var ymd_month = parseInt(date_calculation.slice(5, 7) - 1)
        var ymd_day = parseInt(date_calculation.slice(8, 10))

        if (10 <= ymd_day && ymd_day <= 24) {
            var ymd_day = 30
        } else if (1 <= ymd_day && ymd_day <= 9) {
            var ymd_day = 15
        } else {
            var ymd_month = (ymd_month + 1)
            var ymd_day = 15
        }
        var date = new Date(ymd_year, ymd_month, ymd_day)

        var tableEle = document.getElementById('data-table3')
        if (tenure === 2) {
            for (var i = 0; i <= 23; i++) {
                // テーブルの行を追加
                var tr = document.createElement('tr')
                for (var j = 0; j < 3; j++) {
                    // テーブルの列を 3行追加する
                    var td = document.createElement('td')
                    if (j === 0) {
                        td.innerHTML = (i + 1)
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    } else if (j === 1) {
                        if (i >= 1) {
                            date.setMonth(date.getMonth() + 1)
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        } else {
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        }
                        tableEle.appendChild(tr)
                    } else {
                        const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                        td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    }
                }
            }
        } else if (tenure === 3) {
            for (var i = 0; i <= 35; i++) {
                // テーブルの行を追加
                var tr = document.createElement('tr')
                for (var j = 0; j < 3; j++) {
                    // テーブルの列を 3行追加する
                    var td = document.createElement('td')
                    if (j === 0) {
                        td.innerHTML = (i + 1)
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    } else if (j === 1) {
                        if (i >= 1) {
                            date.setMonth(date.getMonth() + 1)
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        } else {
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        }
                        tableEle.appendChild(tr)
                    } else {
                        const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                        td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    }
                }
            }
        } else {
            for (var i = 0; i <= 47; i++) {
                // テーブルの行を追加
                var tr = document.createElement('tr')
                for (var j = 0; j < 3; j++) {
                    // テーブルの列を 3行追加する
                    var td = document.createElement('td')
                    if (j === 0) {
                        td.innerHTML = (i + 1)
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    } else if (j === 1) {
                        if (i >= 1) {
                            date.setMonth(date.getMonth() + 1)
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        } else {
                            td.innerHTML = date.toDateString();
                            tr.appendChild(td);
                        }
                        tableEle.appendChild(tr)
                    } else {
                        const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                        td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                        tr.appendChild(td)
                        tableEle.appendChild(tr)
                    }
                }
            }
        }
    }
}
