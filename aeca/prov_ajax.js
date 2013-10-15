// JavaScript Document
jQuery('#provincia').change(function () {
var numero =document.getElementById("provincia").value;
var poblacio = jQuery(this).attr("poblacioattri");
var to=document.getElementById("Buscando");
to.innerHTML="buscando....";
jQuery.ajax({
type: "POST", 
url: "busqueda.php",
data: 'idnumero='+numero+'&idpobla='+poblacio,
success: function(a) {
jQuery('#poblacionList').html(a);
var to=document.getElementById("Buscando");
to.innerHTML="";
}
});
})
.change();