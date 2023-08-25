<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
      $( function() {

        $( "#kode_permasalahan" ).autocomplete({
          source: "data_kode_permasalahan.php"
      });
    });
</script>

<style type="text/css">
    [aria-current="page"] {
      pointer-events: none;
      cursor: default;
      text-decoration: none;
      color: white;
  }

  a.disabled {
      pointer-events: auto;
      color: grey;
  }
  a.disabled:active {
      pointer-events: none;
  }
  /* Tooltip **/
  [data-tooltip] {
      position: relative;
      z-index: 10;
  }

  [data-tooltip]::after {
      pointer-events: auto;
      background: #444;
      border-radius: 0.25rem;
      box-shadow: 0 1rem 2rem -0.5rem rgba(0, 0, 0, 0.25);
      color: #fff;
      content: attr(data-tooltip);

      display: inline-block;
      font-size: 0.75rem;
      letter-spacing: 1px;
      line-height: 1;
      max-width: 50rem;
      opacity: 0.8;
      padding: 0.375rem 0.25rem;

      position: absolute;
      left: 50%;
      bottom: calc(100% + 0.25rem);

      text-align: center;
      transform: translate(-15%, 0.25rem);
      user-select: none;
      -webkit-user-select: none;
      vertical-align: left;
      visibility: hidden;

      white-space: normal;
      overflow: hidden;
      text-overflow: ellipsis;
      z-index: 999;
  }

  [data-tooltip]:hover::after {
      visibility: visible;
      opacity: 0.8;
      transform: translate(-50%, 0.125rem);
      width: 100%;
      z-index: 9999 !important;
      transition: opacity 200ms ease-in-out, transform 500ms ease-in-out;
  }
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
