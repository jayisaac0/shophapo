<script type="text/javascript">
function showResult(str)
{
if (str.length==0)
  {
  document.getElementById("results").innerHTML="";
  document.getElementById("results").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("results").innerHTML=xmlhttp.responseText;
    document.getElementById("results");
    }
  }
xmlhttp.open("GET","includes/searchengine/search.inc.php?search_text="+document.search.search_text.value,true);
xmlhttp.send();
}
</script>

