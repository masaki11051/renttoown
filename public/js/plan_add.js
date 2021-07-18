function getRadioValue(name){
  //ラジオボタンオブジェクトを取得する
  var radios = document.getElementsByName(name);
 
  //取得したラジオボタンオブジェクトから選択されたものを探し出す
  var result;
  for(var i=0; i<radios.length; i++){
    if (radios[i].checked) {
      //選択されたラジオボタンのvalue値を取得する
      result = radios[i].value;
      break;
    }
  }
 
  //value値を表示する
  alert("value値は" + result + "です");
}




