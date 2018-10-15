<?php

  include ("config.php");

  $data = @$_POST;
  if(!empty($data)){
    $name = $data["name"];
    $email = $data["email"];
    $message = $data["message"];
    $subject = "Mensagem de apoio";

    $email_message = "FROM: [".$name." <".$email.">] :  \n\n".$message;
    $postData = array(
      'source' => $source,
      'to' => $email_to,
      'replyto' => "'".$name."' <".$email.">",
      'subject' => $subject,
      'message' => $email_message,
      'priority' => 70,
      'auth' => $secret 
    );
    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($postData)
      )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($api, false, $context);
    // p_r($result);
  } else {
    die;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>apoie.paulovelho.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
  <link href='css/bootstrap.min.css' rel='stylesheet'>
  <link href='css/bootstrap-responsive.min.css' rel='stylesheet'>
  <link href='css/style.css' rel='stylesheet'>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons 
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="assets/ico/favicon.png"-->

</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">
  <div id="fb-root"></div>

  <div class="jumbotron masthead">
    <div class="container">
      <h1>Obrigado</h1>
      <img src="img/zebras_w.png" alt="Paulo Velho" title="Paulo Velho"/>
      <p>Obrigado pelo seu apoio!<br/> =)</p>
    </div>
  </div>

  <!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script type='text/javascript' src='js/jquery.min.js'></script>
  <script type='text/javascript' src='js/bootstrap/bootstrap.min.js'></script>
  <script type='text/javascript' src='js/scripts.js'></script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

  </body>
</html>
