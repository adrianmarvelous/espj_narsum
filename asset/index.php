<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>maribelajarcoding.com - Membuat Autocomplete JQuery Database Mysql PHP</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {

    $( "#kode_permasalahan" ).autocomplete({
      source: "data_kode_permasalahan.php"
    });
  });
  </script>
</head>
<body> 
<div class="ui-widget">
  <form method="POST">
    <label >Kode Permasalahan: </label>
    <input type="text" id="kode_permasalahan">
  </form>
</div>
</body>
</html>