document.getElementById("hidden1").style.display = "none";
//ボタンがクリックされるまでViewのHTMLを非表示
document.getElementById('calculation_1').onclick = function () {

    if (hidden1.style.display == "none") {
        hidden1.style.display = "block";
    }
    //ボタンがクリックされると同時に非表示箇所を表示
    const button = document.getElementById('calculation_1');
    button.disabled = true;
    //ボタンが複数回クリックされないように、Disable化

    const table = document.getElementById("calculation")
    var amount = parseInt(table.rows[0].cells[0].innerHTML)
    var interest = parseInt(table.rows[0].cells[1].innerHTML)
    var tenure = parseInt(table.rows[0].cells[2].innerHTML)
    //テーブルから支払額計算のためのデータをIntで取得
    var son = amount * (interest / 100) * Math.pow((1 + (interest / 100)), (tenure * 12));
    var mom = Math.pow((1 + (interest / 100)), (tenure * 12)) - 1;
    var pmt = son / mom;
    //実行年率での金利計算
    var round_down = (Math.floor(pmt * 100)) / 100;
    //小数点調整と小数点３位以下切り捨て（切り上げにすると、総支払額が元本を越えるため）
    const RA = document.createElement('h2')
    RA.innerHTML = round_down
    var currentDiv = document.getElementById("div1");
    currentDiv.appendChild(RA)
    //View上に計算結果表示
    const RAA = document.createElement('input')
    RAA.setAttribute('id', 'payment_amount');
    RAA.setAttribute('type', 'hidden');
    RAA.setAttribute('name', 'payment_amount');
    RAA.setAttribute('value', round_down);
    //コントローラーでデータベースに保存するために計算結果をInputフォームに代入
    var currentDiv = document.getElementById("div1");
    currentDiv.appendChild(RAA)
    //View上に計算結果表示

////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //var daily_payment_amount = (Math.floor((RA.innerHTML * (tenure * 12)) / (tenure *365) * 100)) / 100

    //var date_calculation = table.rows[0].cells[3].innerHTML
    //var ymd_year = parseInt(date_calculation.slice(0, 4))
    //var ymd_month = parseInt(date_calculation.slice(5, 7))
    //var ymd_day = parseInt(date_calculation.slice(8, 10))

    // if (10 <= ymd_day && ymd_day <= 24) {
    //    var first_payment_amount = (Math.ceil(((30 - ymd_day + 1)*daily_payment_amount)*100)/100)
    // } else if (1 <= ymd_day && ymd_day <= 9){
    //    var first_payment_amount = (Math.ceil(((15 - ymd_day + 1)*daily_payment_amount)*100)/100)
    //} else {
    //    var first_payment_amount = (Math.ceil(((45 - ymd_day + 1)*daily_payment_amount)*100)/100)
    //}
    //const FRA = document.createElement('h2')
    //FRA.innerHTML = first_payment_amount
    //var currentDiv = document.getElementById("div2");
    //currentDiv.appendChild(FRA)

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var tenure = parseInt(table.rows[0].cells[2].innerHTML)
    var date_calculation = table.rows[0].cells[3].innerHTML
    var ymd_year = parseInt(date_calculation.slice(0, 4))
    var ymd_month = parseInt(date_calculation.slice(5, 7))
    var ymd_day = parseInt(date_calculation.slice(8, 10))
    //テーブルから申込日をIntで取得

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

    var tableEle = document.getElementById('data-table')
    if (tenure === 2) {
        for (var i = 0; i <= 23; i++) {
            // テーブルの行を追加
            var tr = document.createElement('tr')
            for (var j = 0; j < 4; j++) {
                // テーブルの列を4行追加する
                var td = document.createElement('td')
                if (j === 0) {
                    td.innerHTML = (i + 1)
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                    //０列目は、支払い回数なので１から、1行ごとにプラス１
                } else if (j === 1) {
                    if (i >= 1) {
                        if (date.getMonth() === 0 && date.getDate() === 30) {
                            date.setDate(1);
                            date.setMonth(date.getMonth() + 2)
                            date.setDate(0);
                            //2月に30日が存在せず支払いサイクルがズレるので、2月は月末算出
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        } else if (date.getDate() === 28 || date.getDate() === 29) {
                            date.setMonth(date.getMonth() + 1)
                            date.setDate(30);
                            //初回支払日が2月の場合は28日、ないしは29日が支払日となるため、よく月の支払日が30日になるように調整
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        } else {
                            date.setMonth(date.getMonth() + 1)
                            //月に一度の支払いのため、毎月同じ日付を表示
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                        var payment_schedule = document.createElement('input');
                        payment_schedule.setAttribute('type', 'hidden');
                        payment_schedule.setAttribute('id', 'payment_date');
                        payment_schedule.setAttribute('name', td.innerHTML);
                        payment_schedule.setAttribute('value', td.innerHTML);
                        td.appendChild(payment_schedule);
                        //コントローラーでデータベースに保存するために計算結果をInputフォームに代入
                    } else {
                        if (date.getMonth() === 2 && date.getDate() === 1 || date.getMonth() === 2 && date.getDate() === 2) {
                            date.setDate(0);
                            //初回支払日が2月の場合は30日が存在せず69行目の30日指定により、3月１日な石は2日が表示されるため、2月の月末表示ね修正
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        } else {
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                        var payment_schedule = document.createElement('input');
                        payment_schedule.setAttribute('type', 'hidden');
                        payment_schedule.setAttribute('id', 'payment_date');
                        payment_schedule.setAttribute('name', td.innerHTML);
                        payment_schedule.setAttribute('value', td.innerHTML);
                        td.appendChild(payment_schedule);
                        //コントローラーでデータベースに保存するために計算結果をInputフォームに代入
                    }
                    tableEle.appendChild(tr)
                } else if (j === 2) {
                    const RA = document.createElement('tr')
                    RA.innerHTML = round_down
                    tr.appendChild(RA)
                    tableEle.appendChild(tr)
                    //事前に計算した月額の支払額を表示（定額返済のため、支払月による金額に変更なし）
                } else {
                    const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                    td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    //毎月の支払額には元本と金利分が含まれるため、残高から元本分を引いた金額を計算
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                }
            }
        }
    } else if (tenure === 3) {
        for (var i = 0; i <= 35; i++) {
            // テーブルの行を追加
            var tr = document.createElement('tr')
            for (var j = 0; j < 4; j++) {
                // テーブルの列を 4行追加する
                var td = document.createElement('td')
                if (j === 0) {
                    td.innerHTML = (i + 1)
                    tr.appendChild(td)
                    //０列目は、支払い回数なので１から、1行ごとにプラス１
                } else if (j === 1) {
                    if (i >= 1) {
                        if (date.getMonth() === 0 && date.getDate() === 30) {
                            date.setDate(1);
                            date.setMonth(date.getMonth() + 2)
                            date.setDate(0);
                            //2月に30日が存在せず支払いサイクルがズレるので、2月は月末算出
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        } else if (date.getDate() === 28 || date.getDate() === 29) {
                            date.setMonth(date.getMonth() + 1)
                            date.setDate(30);
                            //初回支払日が2月の場合は28日、ないしは29日が支払日となるため、よく月の支払日が30日になるように調整
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        } else {
                            date.setMonth(date.getMonth() + 1)
                            //月に一度の支払いのため、毎月同じ日付を表示
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                        var payment_schedule = document.createElement('input');
                        payment_schedule.setAttribute('type', 'hidden');
                        payment_schedule.setAttribute('id', 'payment_date');
                        payment_schedule.setAttribute('name', td.innerHTML);
                        payment_schedule.setAttribute('value', td.innerHTML);
                        td.appendChild(payment_schedule);
                        //コントローラーでデータベースに保存するために計算結果をInputフォームに代入
                    } else {
                        if (date.getMonth() === 2 && date.getDate() === 1 || date.getMonth() === 2 && date.getDate() === 2) {
                            date.setDate(0);
                            //初回支払日が2月の場合は30日が存在せず69行目の30日指定により、3月１日な石は2日が表示されるため、2月の月末表示ね修正
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        } else {
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                        var payment_schedule = document.createElement('input');
                        payment_schedule.setAttribute('type', 'hidden');
                        payment_schedule.setAttribute('id', 'payment_date');
                        payment_schedule.setAttribute('name', td.innerHTML);
                        payment_schedule.setAttribute('value', td.innerHTML);
                        td.appendChild(payment_schedule);
                        //コントローラーでデータベースに保存するために計算結果をInputフォームに代入
                    }
                } else if (j === 2) {
                    const RA = document.createElement('tr')
                    RA.innerHTML = round_down
                    tr.appendChild(RA)
                    tableEle.appendChild(tr)
                    //事前に計算した月額の支払額を表示（定額返済のため、支払月による金額に変更なし）
                } else {
                    const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                    td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
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
            for (var j = 0; j < 4; j++) {
                // テーブルの列を4行追加する
                var td = document.createElement('td')
                if (j === 0) {
                    td.innerHTML = (i + 1)
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                    //０列目は、支払い回数なので１から、1行ごとにプラス１
                } else if (j === 1) {
                    if (i >= 1) {
                        if (date.getMonth() === 0 && date.getDate() === 30) {
                            date.setDate(1);
                            date.setMonth(date.getMonth() + 2)
                            date.setDate(0);
                            //2月に30日が存在せず支払いサイクルがズレるので、2月は月末算出
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        } else if (date.getDate() === 28 || date.getDate() === 29) {
                            date.setMonth(date.getMonth() + 1)
                            date.setDate(30);
                            //初回支払日が2月の場合は28日、ないしは29日が支払日となるため、よく月の支払日が30日になるように調整
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        } else {
                            date.setMonth(date.getMonth() + 1)
                            //月に一度の支払いのため、毎月同じ日付を表示
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                        var payment_schedule = document.createElement('input');
                        payment_schedule.setAttribute('type', 'hidden');
                        payment_schedule.setAttribute('id', 'payment_date');
                        payment_schedule.setAttribute('name', td.innerHTML);
                        payment_schedule.setAttribute('value', td.innerHTML);
                        td.appendChild(payment_schedule);
                        //コントローラーでデータベースに保存するために計算結果をInputフォームに代入
                    } else {
                        if (date.getMonth() === 2 && date.getDate() === 1 || date.getMonth() === 2 && date.getDate() === 2) {
                            date.setDate(0);
                            //初回支払日が2月の場合は30日が存在せず69行目の30日指定により、3月１日な石は2日が表示されるため、2月の月末表示ね修正
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        } else {
                            if (date.getDay() === 0) {
                                date.setDate(date.getDate() - 2)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 2)
                                //日曜日は支払日とならないため、日曜日の場合は2日前の金曜日へ支払日を変更
                            } else if (date.getDay() === 6) {
                                date.setDate(date.getDate() - 1)
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                                date.setDate(date.getDate() + 1)
                                //土曜日は支払日とならないため、土曜日の場合は1日前の金曜日へ支払日を変更
                            } else {
                                td.innerHTML = date.toDateString();
                                tr.appendChild(td);
                            }
                        }
                        var payment_schedule = document.createElement('input');
                        payment_schedule.setAttribute('type', 'hidden');
                        payment_schedule.setAttribute('id', 'payment_date');
                        payment_schedule.setAttribute('name', td.innerHTML);
                        payment_schedule.setAttribute('value', td.innerHTML);
                        td.appendChild(payment_schedule);
                        //コントローラーでデータベースに保存するために計算結果をInputフォームに代入
                    }
                    tableEle.appendChild(tr)
                } else if (j === 2) {
                    const RA = document.createElement('tr')
                    RA.innerHTML = round_down
                    tr.appendChild(RA)
                    tableEle.appendChild(tr)
                    //事前に計算した月額の支払額を表示（定額返済のため、支払月による金額に変更なし）
                } else {
                    const roundup_interest = Math.ceil((amount * (interest / 100)) * 100) / 100
                    td.innerHTML = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    amount = Math.ceil((amount - (round_down - roundup_interest)) * 100) / 100
                    //毎月の支払額には元本と金利分が含まれるため、残高から元本分を引いた金額を計算
                    tr.appendChild(td)
                    tableEle.appendChild(tr)
                }
            }
        }
    }
}
