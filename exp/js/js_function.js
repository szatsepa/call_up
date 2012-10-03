/* 
 * created by arcady.1254@gmail.com 22/2/2012
 */
/* Создание нового объекта XMLHttpRequest для общения с Web-сервером */
function getHTTPRequestObject() {
  var xmlHttpRequest;
  /*@cc_on
  @if (@_jscript_version >= 5)
  try {
    xmlHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (exception1) {
    try {
      xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (exception2) {
      xmlHttpRequest = false;
    }
  }
  @else
    xmlhttpRequest = false;
  @end @*/
 
  if (!xmlHttpRequest && typeof XMLHttpRequest != 'undefined') {
    try {
      xmlHttpRequest = new XMLHttpRequest();
    } catch (exception) {
      xmlHttpRequest = false;
    }
  }
  return xmlHttpRequest;
}
 
var httpRequester = getHTTPRequestObject(); /* Когда страница загрузилась, создаем xml http объект */

function go_Artikul(artikul,price_id, stid, cod){
     
//      var str_out = '';
      var out = '';
      
    if(!cod){
        out = "index.php?act=item_description&artikul="+artikul+"&price_id="+price_id+"&stid="+stid;
    }else{
        out = "index.php?act=item_description&artikul="+artikul+"&price_id="+price_id+"&stid="+stid+"&cod="+cod;
    }
    
    document.location.href = out; 
}

