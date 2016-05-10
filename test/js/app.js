function receive()
{
  var parameters = location.search.substring(1).split("&");
  var temp = parameters[0].split("=");
  varname = unescape(temp[0]);
  if(varname == "") return;
  value = unescape(temp[1]);
  alert(varname + "=" + value);
}
window.onload=receive;
