function Nodd(){
var checkboxes = document.getElementsByTagName('input');

for (var i=0; i<checkboxes.length; i++)  {
if (checkboxes[i].type == 'checkbox')   {
  checkboxes[i].checked = false;
}
$("#nidDIV").hide();
$("#passDIV").hide();
$("#otherDIV").hide();
}}
