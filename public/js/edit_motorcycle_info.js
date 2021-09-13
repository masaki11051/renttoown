document.getElementById("hidden1").style.display = "none";
document.getElementById("hidden2").style.display = "none";
document.getElementById("hidden3").style.display = "none";
document.getElementById("hidden4").style.display = "none";

//メーカーを選択前では車両モデルの選択を非表示

function myfunc() {
    var check1 = document.getElementById("Honda").checked;
    var check2 = document.getElementById("Kawasaki").checked;
    var check3 = document.getElementById("Suzuki").checked;
    var check4 = document.getElementById("Yamaha").checked;
    var hidden1 = document.getElementById("hidden1");
    var hidden2 = document.getElementById("hidden2");
    var hidden3 = document.getElementById("hidden3");
    var hidden4 = document.getElementById("hidden4");
    //メーカーを選択後に車両モデルを、選択に基づいて表示

    if (check1 == true) {
        hidden1.style.display = "block";
    } else {
        hidden1.style.display = "none";
    }
    if (check2 == true) {
        hidden2.style.display = "block";
    } else {
        hidden2.style.display = "none";
    }
    if (check3 == true) {
        hidden3.style.display = "block";
    } else {
        hidden3.style.display = "none";
    }
    if (check4 == true) {
        hidden4.style.display = "block";
    } else {
        hidden4.style.display = "none";
    }

}
