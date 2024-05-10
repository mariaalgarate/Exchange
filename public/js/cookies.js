// Función para establecer una cookie
function aceptarCookies() {
    var theDate = new Date();
    var oneYearLater = new Date(theDate.getTime() + 31536000000); // 1 año en milisegundos
    var expiryDate = oneYearLater.toGMTString();
  
    // Aceptamos todas las cookies
    document.cookie = "exchange_tecnica=TRUE;expires=" + expiryDate + ";path=/";
    document.cookie = "exchange_preferencias=TRUE;expires=" + expiryDate + ";path=/";
    document.cookie = "exchange_analisis=TRUE;expires=" + expiryDate + ";path=/";
    document.cookie = "exchange_publicidad=TRUE;expires=" + expiryDate + ";path=/";
  
    document.getElementById("modal-cookies").style.display = 'none'; // Ocultamos el modal
    if (document.getElementById('idioma') == null) {
      location.reload(); // Recargamos la página
    }
  
    return false;
  }
  
  function rechazarCookies() {
    var theDate = new Date();
    var oneYearLater = new Date(theDate.getTime() + 31536000000); // 1 año en milisegundos
    var expiryDate = oneYearLater.toGMTString();
  
    // Rechazamos cookies de preferencias, análisis y publicidad
    document.cookie = "exchange_tecnica=TRUE;expires=" + expiryDate + ";path=/"; // Siempre se acepta la cookie técnica
    document.cookie = "exchange_preferencias=FALSE;expires=" + expiryDate + ";path=/";
    document.cookie = "exchange_analisis=FALSE;expires=" + expiryDate + ";path=/";
    document.cookie = "exchange_publicidad=FALSE;expires=" + expiryDate + ";path=/";
  
    document.getElementById("modal-cookies").style.display = 'none'; // Ocultamos el modal
    if (document.getElementById('idioma') == null) {
      location.reload(); // Recargamos la página
    }
    return false;
  }
  
  function guardarCookies() {
    var theDate = new Date();
    var oneYearLater = new Date(theDate.getTime() + 31536000000); // 1 año en milisegundos
    var expiryDate = oneYearLater.toGMTString();
  
    // Cookies técnicas siempre aceptadas
    document.cookie = "exchange_tecnica=TRUE;expires=" + expiryDate + ";path=/";
  
    // Configuración de las cookies según las preferencias del usuario
    document.cookie = "exchange_preferencias=" + (document.getElementById('check1').checked ? "TRUE" : "FALSE") + ";expires=" + expiryDate + ";path=/";
    document.cookie = "exchange_analisis=" + (document.getElementById('check2').checked ? "TRUE" : "FALSE") + ";expires=" + expiryDate + ";path=/";
    document.cookie = "exchange_publicidad=" + (document.getElementById('check3').checked ? "TRUE" : "FALSE") + ";expires=" + expiryDate + ";path=/";
  
    document.getElementById("modal-cookies").style.display = 'none'; // Ocultamos el modal
    if (document.getElementById('Modalidioma') != null) {
      location.reload(); // Recargamos la página si es necesario
    }
    return false;
  }
  