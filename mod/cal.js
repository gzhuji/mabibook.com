function cal(){
var v_nowpay = document.getElementsByName("nowpay");
var v_total = document.getElementsByName("nowtotal");

for (var i=0;i<v_nowpay.length;i++){
var nowless=parseInt(v_total[i].value) - parseInt(v_nowpay[i].value);
var oneneed=parseInt((v_total[i].value)/2) - v_nowpay[i].value;
var onetotal= parseInt((v_total[i].value)/2);
var oneall=parseInt(v_total[i].value) - parseInt(v_nowpay[i].value) + parseInt((v_total[i].value)/2);
var twoneed=parseInt((v_total[i].value)/3) - v_nowpay[i].value;
var twototal= parseInt((v_total[i].value)/3);
var twoall=parseInt(v_total[i].value) - parseInt(v_nowpay[i].value) + parseInt((v_total[i].value)/3);
var threeneed=parseInt((v_total[i].value)/4) - v_nowpay[i].value;
var threetotal= parseInt((v_total[i].value)/4);
var threeall=parseInt(v_total[i].value) - parseInt(v_nowpay[i].value) + parseInt((v_total[i].value)/4);
var fourneed=parseInt((v_total[i].value)/5) - v_nowpay[i].value;
var fourtotal= parseInt((v_total[i].value)/5);
var fourall=parseInt(v_total[i].value) - parseInt(v_nowpay[i].value) + parseInt((v_total[i].value)/5);
var fiveneed=parseInt((v_total[i].value)/6) - v_nowpay[i].value;
var fivetotal= parseInt((v_total[i].value)/6);
var fiveall=parseInt(v_total[i].value) - parseInt(v_nowpay[i].value) + parseInt((v_total[i].value)/6);
}

document.g12.nowless.value=formatNum(nowless);
document.g12.oneneed.value=formatNum(oneneed);
document.g12.onetotal.value=formatNum(onetotal);
document.g12.oneall.value=formatNum(oneall);
document.g12.twoneed.value=formatNum(twoneed);
document.g12.twototal.value=formatNum(twototal);
document.g12.twoall.value=formatNum(twoall);
document.g12.threeneed.value=formatNum(threeneed);
document.g12.threetotal.value=formatNum(threetotal);
document.g12.threeall.value=formatNum(threeall);
document.g12.fourneed.value=formatNum(fourneed);
document.g12.fourtotal.value=formatNum(fourtotal);
document.g12.fourall.value=formatNum(fourall);
document.g12.fiveneed.value=formatNum(fiveneed);
document.g12.fivetotal.value=formatNum(fivetotal);
document.g12.fiveall.value=formatNum(fiveall);

}