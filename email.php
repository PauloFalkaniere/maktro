
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';

$for = 'vendas@maktrodiesel.com.br';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

if (isset($_POST['token'])) {

    $post = extract($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $mensagem = "<strong>Nome:  </strong>".$name;
    $mensagem .= "<br><strong>Email:  </strong>".$email;
    $mensagem .= "<br><strong>Mensagem: </strong>".$content;

  try {

     //Server settings
     // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
     $mail->isSMTP();
     $mail->Host = 'mail.maktrodiesel.com.br ';
     $mail->Port = 587;
     $mail->SMTPAuth = true;
     $mail->Username = 'contatosite@maktrodiesel.com.br';
     $mail->Password = '_Cb0_hx.6cE*';          // SMTP password
     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

     //Recipients
     $mail->setFrom($for, 'Site');
     $mail->addAddress($for, 'Vendas Maktro');
     //Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'Contato Via Site';
     $mail->Body    = $mensagem;

     $mail->send();

     $response_array['status'] = 'success';
  } catch (Exception $e) {

    $response_array['status'] = 'error';
    $response_array['message'] = $mail->ErrorInfo;
  }
} else{
  $response_array['status'] = 'error';
  $response_array['message'] = 'Token and POST are missing';

}

  echo json_encode($response_array);
 ?>
