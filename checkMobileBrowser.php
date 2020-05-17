
<?php
  function isMobileDevice() {
      return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  }

  if(isMobileDevice()){
      echo "<h1> Thanks for visiting http://covidheroes.space/. 
        <br><br> Please use a Desktop browser to view our website.
        <br><br> Mobile support is coming soon.
        </h1>";
      exit;
      }
?>