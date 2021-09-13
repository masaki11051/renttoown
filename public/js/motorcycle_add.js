document.getElementById("hidden1").style.display = "none";
document.getElementById("hidden2").style.display = "none";
document.getElementById("hidden3").style.display = "none";
document.getElementById("hidden4").style.display = "none";

//メーカーを選択前では車両モデルの選択を非表示

function myfunc() {
    const check1 = document.getElementById("Honda").checked;
    const check2 = document.getElementById("Kawasaki").checked;
    const check3 = document.getElementById("Suzuki").checked;
    const check4 = document.getElementById("Yamaha").checked;
    const hidden1 = document.getElementById("hidden1");
    const hidden2 = document.getElementById("hidden2");
    const hidden3 = document.getElementById("hidden3");
    const hidden4 = document.getElementById("hidden4");
    //メーカーを選択後に車両モデルを、選択に基づいて表示

    if (check1 === true) {
        hidden1.style.display = "block";
    } else {
        hidden1.style.display = "none";
    }
    if (check2 === true) {
        hidden2.style.display = "block";
    } else {
        hidden2.style.display = "none";
    }
    if (check3 === true) {
        hidden3.style.display = "block";
    } else {
        hidden3.style.display = "none";
    }
    if (check4 === true) {
        hidden4.style.display = "block";
    } else {
        hidden4.style.display = "none";
    }

}
