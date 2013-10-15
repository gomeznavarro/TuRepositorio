// JavaScript Document
var NP_numnewsall=document.getElementById('NP_orgnwall').getAttribute('np_numnews');
function NP_newsall(d){
	document.getElementById('NP_cnewsall').innerHTML=d.c;
	}
function NP_actnewsall(ow){
	var ns=document.createElement('SCRIPT');
	document.getElementById('NP_cnewsall').innerHTML='<div align="center" style="margin-top:'+(((97+147*NP_numnewsall)/2)-25)+'px"><img src="https://secure.neopromociones.com/images/logoespera.gif" /></div>';ns.src='https://secure.neopromociones.com/widgets/aj_newspub.asp?ow='+ow+'&nw='+NP_numnewsall;document.getElementsByTagName('HEAD')[0].appendChild(ns);
	}
	var NP_nenwall=document.createElement('LINK');NP_nenwall.rel='stylesheet';NP_nenwall.type='text/css';
	NP_nenwall.href='https:/secure.neopromociones.com/widgets/NP_news'+document.getElementById('NP_orgnwall').getAttribute('np_estilo')+'.css';NP_nenwall.id='newsallcss';document.getElementsByTagName('HEAD')[0].appendChild(NP_nenwall);
	NP_nenwall=document.createElement('DIV');
	NP_nenwall.id='NP_cnewsall';
	NP_nenwall.align='left';
	NP_nenwall.style.minHeight=(97+147*NP_numnewsall)+'px';
	NP_nenwall.innerHTML='<div align="center" style="margin-top:'+(((97+147*NP_numnewsall)/2)-25)+'px"><img src="https://secure.neopromociones.com/images/logoespera.gif" /></div>';var NP_oe=document.getElementById('NP_orgnwall');NP_oe.parentNode.insertBefore(NP_nenwall,NP_oe);NP_actnewsall('');