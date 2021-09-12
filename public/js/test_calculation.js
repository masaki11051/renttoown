document.getElementById("hidden1").style.display ="none";
//ボタンがクリックされるまでViewのHTMLを非表示

document.getElementById('calculation_1').onclick = function () {
    if(hidden1.style.display=="none") {
        hidden1.style.display = "block";
    }
    //ボタンがクリックされると同時に非表示箇所を表示
    const button = document.getElementById('calculation_1');
    button.disabled = true;
    //ボタンが複数回クリックされないように、Disable化

    const price = document.getElementById("price")
    const interest = document.querySelectorAll("input[name=interest_rate]:checked");
    if( 0 < interest.length ) {
        for(var selected_interest of interest) {
        }
    }
    //ラジオボタンで選択された金利を読み取り
    const tenure = document.querySelectorAll("input[name=tenure]:checked");
    if( 0 < interest.length ) {
        for(var selected_tenure of tenure) {
        }
    }
    //ラジオボタンで選択された期間を読み取り
    const son = price.value * (selected_interest.value/100) * Math.pow((1+(selected_interest.value/100)),(selected_tenure.value*12));
    const mom = Math.pow((1+(selected_interest.value/100)),(selected_tenure.value*12)) - 1;
    const pmt = son / mom;
    //実行年率での金利計算
    const round_down = (Math.floor(pmt*100))/100;
    const RA = document.createElement('h2')
    RA.innerHTML = round_down
    //小数点調整と小数点３位以下切り捨て（切り上げにすると、総支払額が元本を越えるため）
    const currentDiv = document.getElementById("div1");
    currentDiv.appendChild(RA)
    //View上に計算結果表示
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
        hidden1.style.display = "block";
    }
    //ボタンがクリックされると同時に非表示箇所を表示
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
    //ラジオボタンで選択された金利を読み取り
    const tenure = document.querySelectorAll("input[name=tenure]:checked");
    if (0 < interest.length) {
        for (var selected_tenure of tenure) {
        }
    }
    //ラジオボタンで選択された期間を読み取り
    const son = price_calculation * (selected_interest.value / 100) * Math.pow((1 + (selected_interest.value / 100)), (selected_tenure.value * 12));
    const mom = Math.pow((1 + (selected_interest.value / 100)), (selected_tenure.value * 12)) - 1;
    const pmt = son / mom;
    const round_down = (Math.floor(pmt * 100)) / 100;
    const RA = document.createElement('h2')
    RA.innerHTML = round_down
    var ymd_year = parseInt(start_date.value.slice(0, 4))
    var ymd_month = parseInt(start_date.value.slice(5, 7))
    var ymd_day = parseInt(start_date.value.slice(8, 10))
    //申込日をIntで取得

    if (10 <= ymd_day && ymd_day <= 24) {
        var month = (ymd_month - 1)
        var day = 30//10-24日の車両納品の場合は、初回支払日が当月30日
    } else if (1 <= ymd_day && ymd_day <= 9) {
        var month = (ymd_month - 1)
        var day = 15//1-9日の車両納品の場合は、初回支払日が当月15日
    } else {
        var month = ymd_month
        var day = 15//それ以外の場合は、初回支払日が翌月15日
    }

    const date = new Date(ymd_year, month, day)
    const tableEle = document.getElementById('data-table')

    if (parseInt(selected_tenure.value) === 2) {
        for (var i = 0; i <= 23; i++) {
            // テーブルの行を追加
            var tr = document.createElement('tr')
            for (var j = 0; j < 3; j++) {
                // テーブルの列を3行追加する
                var td = document.createElement('td')
                if (j === 0) {
                    td.innerHTML = (i + 1)
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                    //０列目は、支払い回数なので１から、1行ごとにプラス１
                } else if (j === 1) {
                    if (i >= 1) {
                        if(date.getMonth() === 0 && date.getDate() === 30 ) {
                            date.setDate(1);
                            date.setMonth(date.getMonth() + 2)
                            date.setDate(0);
                            //2月に30日が存在せず支払いサイクルがズレるので、2月は月末算出
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else if(date.getDate() === 28 || date.getDate() === 29) {
                            date.setMonth(date.getMonth() + 1)
                            date.setDate(30);
                            //初回支払日が2月の場合は28日、ないしは29日が支払日となるため、よく月の支払日が30日になるように調整
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
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
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                    } else {
                        if(date.getMonth() === 2 && date.getDate() === 1 || date.getMonth() === 2 && date.getDate() === 2) {
                            date.setDate(0);
                            //初回支払日が2月の場合は30日が存在せず69行目の30日指定により、3月１日な石は2日が表示されるため、2月の月末表示ね修正
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
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
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
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
                    //毎月の支払額には元本と金利分が含まれるため、残高から元本分を引いた金額を計算
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
                // テーブルの列を3行追加する
                var td = document.createElement('td')
                if (j === 0) {
                    td.innerHTML = (i + 1)
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                    //０列目は、支払い回数なので１から、1行ごとにプラス１
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
                                //2月に30日が存在せず支払いサイクルがズレるので、2月は月末算出
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else if(date.getDate() === 28 || date.getDate() === 29) {
                            date.setMonth(date.getMonth() + 1)
                            date.setDate(30);
                            //初回支払日が2月の場合は28日、ないしは29日が支払日となるため、よく月の支払日が30日になるように調整
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else{
                            date.setMonth(date.getMonth() + 1)
                            //月に一度の支払いのため、毎月同じ日付を表示
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                    } else {
                        if(date.getMonth() === 2 && date.getDate() === 1 || date.getMonth() === 2 && date.getDate() === 2) {
                            date.setDate(0);
                            //初回支払日が2月の場合は30日が存在せず69行目の30日指定により、3月１日な石は2日が表示されるため、2月の月末表示ね修正
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
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
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変
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
                    //毎月の支払額には元本と金利分が含まれるため、残高から元本分を引いた金額を計算
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
                // テーブルの列を3行追加する
                var td = document.createElement('td')
                if (j === 0) {
                    td.innerHTML = (i + 1)
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                    //０列目は、支払い回数なので１から、1行ごとにプラス１
                } else if (j === 1) {
                    if (i >= 1) {
                        if(date.getMonth() === 0 && date.getDate() === 30 ) {
                            date.setDate(1);
                            date.setMonth(date.getMonth() + 2)
                            date.setDate(0);
                            //2月に30日が存在せず支払いサイクルがズレるので、2月は月末算出
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else if(date.getDate() === 28 || date.getDate() === 29) {
                            date.setMonth(date.getMonth() + 1)
                            date.setDate(30);
                            //初回支払日が2月の場合は28日、ないしは29日が支払日となるため、よく月の支払日が30日になるように調整
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            }else{
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }else{
                            date.setMonth(date.getMonth() + 1)
                            //月に一度の支払いのため、毎月同じ日付を表示
                            if(date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
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
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
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
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            }else if(date.getDay() === 6){
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
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
                    //毎月の支払額には元本と金利分が含まれるため、残高から元本分を引いた金額を計算
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                }
            }
        }
    }
}
