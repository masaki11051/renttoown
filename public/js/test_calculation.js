document.getElementById("hidden1").style.display ="none";



document.getElementById('calculation_1').onclick = function () {
    if(hidden1.style.display=="none") {
        // noneで非表示
        hidden1.style.display = "block";
    }
    const button = document.getElementById('calculation_1');
    button.disabled = true;

    const price = document.getElementById("price")
    const interest = document.querySelectorAll("input[name=interest_rate]:checked");
    if( 0 < interest.length ) {
        for(var selected_interest of interest) {
        }
    }
    const tenure = document.querySelectorAll("input[name=tenure]:checked");
    if( 0 < interest.length ) {
        for(var selected_tenure of tenure) {
        }
    }
    const son = price.value * (selected_interest.value/100) * Math.pow((1+(selected_interest.value/100)),(selected_tenure.value*12));
    const mom = Math.pow((1+(selected_interest.value/100)),(selected_tenure.value*12)) - 1;
    const pmt = son / mom;
    const round_down = (Math.floor(pmt*100))/100;
    const RA = document.createElement('h2')
    RA.innerHTML = round_down
    const currentDiv = document.getElementById("div1");
    currentDiv.appendChild(RA)
}

//document.getElementById('calculation_2').onclick = function () {
    //if(hidden1.style.display=="none") {
        // noneで非表示
    //    hidden1.style.display = "block";
    //}

    //const button = document.getElementById('calculation_2');
    //button.disabled = true;

    //const start_date = document.getElementById("start_date");
    //const price = document.getElementById("price");
    //const interest = document.querySelectorAll("input[name=interest_rate]:checked");
    //if( 0 < interest.length ) {
    //    for(var selected_interest of interest) {
    //    }
    //}
    //const tenure = document.querySelectorAll("input[name=tenure]:checked");
    //if( 0 < interest.length ) {
    //    for(var selected_tenure of tenure) {
    //    }
    //}
    //const son = price.value * (selected_interest.value/100) * Math.pow((1+(selected_interest.value/100)),(selected_tenure.value*12));
    //const mom = Math.pow((1+(selected_interest.value/100)),(selected_tenure.value*12)) - 1;
    //const pmt = son / mom;
    //const round_down = (Math.floor(pmt*100))/100;
    //const RA = document.createElement('h2')
    //RA.innerHTML = round_down
    //const daily_payment_amount = (Math.floor((RA.innerHTML * (selected_tenure.value * 12)) / (selected_tenure.value *365) * 100)) / 100

    //const ymd_year = parseInt(start_date.value.slice(0, 4))
    //const ymd_month = parseInt(start_date.value.slice(5, 7))
    //const ymd_day = parseInt(start_date.value.slice(8, 10))

    //if (10 <= ymd_day && ymd_day <= 24) {
    //    var first_payment_amount = (Math.ceil(((30 - ymd_day + 1)*daily_payment_amount)*100)/100)
    //} else if (1 <= ymd_day && ymd_day <= 9){
    //    var first_payment_amount = (Math.ceil(((15 - ymd_day + 1)*daily_payment_amount)*100)/100)
    //} else {
    //    var first_payment_amount = (Math.ceil(((45 - ymd_day + 1)*daily_payment_amount)*100)/100)
    //}

    //const FRA = document.createElement('h2')
    //FRA.innerHTML = first_payment_amount
    //var currentDiv = document.getElementById("div2");
    //currentDiv.appendChild(FRA)
//}

document.getElementById('calculation_3').onclick = function () {
    if (hidden1.style.display == "none") {
        // noneで非表示
        hidden1.style.display = "block";
    }

    const button = document.getElementById('calculation_3');
    button.disabled = true;

    const start_date = document.getElementById("start_date");
    const price = document.getElementById("price");
    let price_calculation = price.value;
    const interest = document.querySelectorAll("input[name=interest_rate]:checked");
    if (0 < interest.length) {
        for (var selected_interest of interest) {
        }
    }
    const tenure = document.querySelectorAll("input[name=tenure]:checked");
    if (0 < interest.length) {
        for (var selected_tenure of tenure) {
        }
    }
    const son = price_calculation * (selected_interest.value / 100) * Math.pow((1 + (selected_interest.value / 100)), (selected_tenure.value * 12));
    const mom = Math.pow((1 + (selected_interest.value / 100)), (selected_tenure.value * 12)) - 1;
    const pmt = son / mom;
    const round_down = (Math.floor(pmt * 100)) / 100;
    const RA = document.createElement('h2')
    RA.innerHTML = round_down
    const daily_payment_amount = (Math.floor((RA.innerHTML * (selected_tenure.value * 12)) / (selected_tenure.value * 365) * 100)) / 100
    var ymd_year = parseInt(start_date.value.slice(0, 4))
    var ymd_month = parseInt(start_date.value.slice(5, 7))
    var ymd_day = parseInt(start_date.value.slice(8, 10))

    if (10 <= ymd_day && ymd_day <= 24) {
        var month = (ymd_month - 1)
        var day = 30
    } else if (1 <= ymd_day && ymd_day <= 9) {
        var month = (ymd_month - 1)
        var day = 15
    } else {
        var month = ymd_month
        var day = 15
    }

    const date = new Date(ymd_year, month, day)
    const tableEle = document.getElementById('data-table')

    if (parseInt(selected_tenure.value) === 2) {
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
                        if(date.getMonth() === 0 && date.getDate() === 30 ) {
                            date.setDate(1);
                            date.setMonth(date.getMonth() + 2)
                            date.setDate(0);
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else if(date.getDate() === 28 || date.getDate() === 29) {
                            date.setMonth(date.getMonth() + 1)
                            date.setDate(30);
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else{
                            date.setMonth(date.getMonth() + 1)
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                    } else {
                        if(date.getMonth() === 2 && date.getDate() === 1 || date.getMonth() === 2 && date.getDate() === 2) {
                            date.setDate(0);
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else{
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                    }
                    tableEle.appendChild(tr)
                } else {
                    const roundup_interest = Math.ceil((price_calculation * (selected_interest.value / 100)) * 100) / 100
                    td.innerHTML = Math.ceil((price_calculation - (round_down - roundup_interest)) * 100) / 100
                    price_calculation = Math.ceil((price_calculation - (round_down - roundup_interest)) * 100) / 100
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                }
            }
        }
    } else if (parseInt(selected_tenure.value) === 3) {
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
                        if(date.getMonth() === 0 && date.getDate() === 30 ) {
                            date.setDate(1);
                            date.setMonth(date.getMonth() + 2)
                            date.setDate(0);
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else if(date.getDate() === 28 || date.getDate() === 29) {
                            date.setMonth(date.getMonth() + 1)
                            date.setDate(30);
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else{
                            date.setMonth(date.getMonth() + 1)
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                    } else {
                        if(date.getMonth() === 2 && date.getDate() === 1 || date.getMonth() === 2 && date.getDate() === 2) {
                            date.setDate(0);
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else{
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                    }
                    tableEle.appendChild(tr)
                } else {
                    const roundup_interest = Math.ceil((price_calculation * (selected_interest.value / 100)) * 100) / 100
                    td.innerHTML = Math.ceil((price_calculation - (round_down - roundup_interest)) * 100) / 100
                    price_calculation = Math.ceil((price_calculation - (round_down - roundup_interest)) * 100) / 100
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
                        if(date.getMonth() === 0 && date.getDate() === 30 ) {
                            date.setDate(1);
                            date.setMonth(date.getMonth() + 2)
                            date.setDate(0);
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else if(date.getDate() === 28 || date.getDate() === 29) {
                            date.setMonth(date.getMonth() + 1)
                            date.setDate(30);
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else{
                            date.setMonth(date.getMonth() + 1)
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                    } else {
                        if(date.getMonth() === 2 && date.getDate() === 1 || date.getMonth() === 2 && date.getDate() === 2) {
                            date.setDate(0);
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else{
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                    }
                    tableEle.appendChild(tr)
                } else {
                    const roundup_interest = Math.ceil((price_calculation * (selected_interest.value / 100)) * 100) / 100
                    td.innerHTML = Math.ceil((price_calculation - (round_down - roundup_interest)) * 100) / 100
                    price_calculation = Math.ceil((price_calculation - (round_down - roundup_interest)) * 100) / 100
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                }
            }
        }
    }
}
