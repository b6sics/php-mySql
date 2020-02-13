function profilkep_be(event,id) {
 var kep = document.getElementById(id);
 kep.style.left = event.pageX - kep.offsetLeft + "px";
 kep.style.top = event.pageY - kep.offsetTop - 130 + "px";
 kep.style.position = "absolute";
 kep.style.display = "block";
 kep.style.zIndex = 5;
}

function profilkep_ki(event,id) {
 var kep = document.getElementById(id);
 kep.style.display = "none";
}

function rakerdez(elem) {
 var funkcio;
 if (elem.name.indexOf("modosit") != -1 ||
	 elem.className.indexOf("modosit") != -1)
  funkcio="módosítani"
 else if (elem.className.indexOf("torlo") != -1)
  funkcio="törölni";
 if (confirm("Valóban akarod " + funkcio + "?"))
  return true
 else
  return false;
}

function betolt(url) {
 document.location.href=url;
}

function hozzaszolas_szerkesztes(sorszam) {
 document.getElementById('szerkeszto_gomb'+sorszam).style.display="none";
 document.getElementById('modosito_gomb'+sorszam).style.display="inline-block";
 document.getElementById('torlo_gomb'+sorszam).style.display="none";
 document.getElementById('megse_gomb'+sorszam).style.display="inline-block";
 hozzaszolas=document.querySelector('#hozzaszolas_szoveg'+sorszam);
 urlap=document.forms['hozzaszolas'];
 urlap['hozzasz_azon'].value=hozzaszolas.getAttribute('data-azon');
 urlap['sorszam'].value=hozzaszolas.dataset.sorszam;
 urlap['szint'].value=hozzaszolas.getAttribute('data-szint');
 urlap['valasza'].value=hozzaszolas.dataset.valasza;
 hozzaszolas.contentEditable="true";
 hozzaszolas.focus();
 
}

function hozzaszolas_modositas(sorszam) {
 document.getElementById('hozzaszolas_szoveg'+sorszam).contentEditable="false";
 hivatkozas=document.getElementById('hozzaszolas_szoveg'+sorszam).innerHTML;
 hozzaszolas=hivatkozas.trim().replace('</a>','').replace(/<.*>/,'').replace('&nbsp;',' ');
 document.forms['hozzaszolas']['szoveg'].value=hozzaszolas;
 document.forms['hozzaszolas']['frissit'].click();
}