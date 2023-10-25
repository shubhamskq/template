<script>
// cookie functions
function setCookie(e,t,n){
    var i="";if(n){var o=new Date;o.setTime(o.getTime()+24*n*60*60*1e3),i="; expires="+o.toUTCString()}document.cookie=e+"="+(t||"")+i+"; path=/"}
  function getCookie(e){for(var t=e+"=",n=document.cookie.split(";"),i=0;i<n.length;i++)
  {for(var o=n[i];" "==o.charAt(0);)o=o.substring(1,o.length);if(0==o.indexOf(t))return o.substring(t.length,o.length)}return null}

  // Function to save cookie

  function save_cookie() {
    var url = window.location.href;
    var today = "<?= date("Y-m-d") ?>";

    var sluglog = getcookie('slug_log');
    var jsonData = sluglog ? JSON.parse(sluglog) : {};

    // If data is NULL
    if(!jsonData[today]) {
      jsonData[today] = url;
    }
    else if(jsonData[today] != url) {
      jsonData[today] = url;
    }
    setCookie('slug_log', JSON.stringify(jsonData), 1);
  }
    window.addEventListener('load', save_cookie);

</script>
