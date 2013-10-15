// JavaScript Document
function OnSubmitForm()
{
    
    if (document.busqueda.sitesearch[0].checked == true)
    { document.busqueda.action = "http://www.google.com/search"; 
		document.busqueda.method="get"}
 
    if (document.busqueda.sitesearch[1].checked == true)
    { document.busqueda.action = "tienda/index.php";
			document.busqueda.method="post"}
 

return true;
}
function OnSubmitForm2()
{
    
    if (document.busqueda.sitesearch[0].checked == true)
    { document.busqueda.action = "http://www.google.com/search"; 
		document.busqueda.method="get"}
 
    if (document.busqueda.sitesearch[1].checked == true)
    { document.busqueda.action = "../tienda/index.php";
			document.busqueda.method="post"}
 

return true;
}