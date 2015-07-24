<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bootstrap + Chosen</title>
	<link href="../bootstrapLogin/assets/bootstrap.min.css" rel="stylesheet">
    <style>
      body { margin-bottom: 144px; }
      header { margin: 72px 0 36px; }
      header h1 { font-size: 54px; }
    </style>
	<link href="../bootstrapLogin/assets/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="chosen.css">
        <script src"http://code.jquery.com/jquery.min.js"></script>
        <script src"chosen.jquery.min.js"></script>
		<script src="js/faturaTodos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
    <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>
  </head>
  <body>

    <div class="container">
      <header>
        <h1>Bootstrap + Chosen</h1>
      </header>



        <div class="col-lg-3">
            <select data-placeholder="Escolha os Ramais:" class="chosen-select" multiple tabindex="4">
              <option value=""></option>
              <option value="United States">United States</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="Afghanistan">Afghanistan</option>
              <option value="Albania">Albania</option>
              <option value="Algeria">Algeria</option>
