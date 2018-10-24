<?php

if (isset($_POST['token'])) {
  $for = 'paulofalkaniere@gmail.com';
  $post = extract($_POST);
  $name = $_POST['name'];
  $email = $_POST['email'];
  $content = $_POST['content'];
  $subject = "Contato Via Site";

  $mensagem = "<strong>Nome:  </strong>".$name;
  $mensagem .= "<br><strong>Email: </strong>".$email;
  $mensagem .= "<br><strong>Mensagem: </strong>".$_POST['content'];

//5 – agora inserimos as codificações corretas e  tudo mais.
  $headers =  "Content-Type:text/html; charset=UTF-8\n";
  $headers .= "From:  dominio.com.br<sistema@dominio.com.br>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Sender:  <sistema@dominio.com.br>\n"; //email do servidor //que enviou
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path:  <sistema@dominio.com.br>\n"; //caso a msg //seja respondida vai para  este email.
  $headers .= "MIME-Version: 1.0\n";
  try {
    mail($for, $subject, $mensagem, $headers);  //função que faz o envio do email.
    $response_array['status'] = 'success';
  } catch (\Exception $e) {
    $response_array['status'] = 'error';
    $response_array['message'] = $e->getMessage();
  }



} else{
  $response_array['status'] = 'error';
}


echo json_encode($response_array);
 ?>
