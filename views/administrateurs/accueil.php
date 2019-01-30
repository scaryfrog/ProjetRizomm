<!DOCTYPE html>
<html>
  <head>
    <!-- <link> doesn't need a closing tag -->
    <link href="CSS/Master.css" rel="stylesheet" type="text/css">
    <!-- include the jQuery UI style sheet -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- include jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- include jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>
  <body>

        <script type="text/javascript">             
        window.onload=function() {f('insertHour'); };

        var f = function() {
        var date = new Date();
        var heure =date.getHours();
        var minutes=date.getMinutes();
        var seconde=date.getSeconds();
        document.getElementById("insertHour").textContent=heure+":"+(minutes > 9 ? "" + minutes: "0" + minutes)+":"+(seconde > 9 ? "" + seconde: "0" + seconde);
        setTimeout(f, 1000);
        }
        setTimeout(f, 1000);
        </script>

<div class="box"> <h3 style='text-align: center'> Bonjour, il est <span id='insertHour'> </span>  </h3> </div>
    
  </body>
</html>