$(document).ready(function () {
$('body').on('mouseout', 'li', function () { func_over('out','');});
$('body').on('mouseover', 'li a', function () { func_over('over',$(this).attr('class'));



})

var arr_li=document.body.getElementsByTagName("li");
for(var i=0; i<arr_li.length; i++) {
arr_li[i].setAttribute("onmouseover", "func_over(this);");
}
function func_over(elem) {
for(var i=0; i<arr_li.length; i++) {
if(arr_li[i]==elem) {
arr_li[i].childNodes[1].style.visibility="visible";
}
else {
arr_li[i].childNodes[1].style.visibility="hidden";
}
}
}