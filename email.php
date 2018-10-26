
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$for = 'paulofalkaniere@gmail.com';
$for = 'vendas@maktrodiesel.com.br';
//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

// if (isset($_POST['token'])) {

    // $post = extract($_POST);
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $content = $_POST['content'];
    // $mensagem = "<strong>Nome:  </strong>".$name;
    // $mensagem = "<br><strong>Email:  </strong>".$email;
    // $mensagem .= "<br><strong>Mensagem: </strong>".$content;


        $name = "paulo";
        $email = "paulofalkaniere";
        $content = "aaaaaaaaaaaaaaaaaaaaaa";
        $mensagem = "<strong>Nome:  </strong>".$name;
        $mensagem = "<br><strong>Email:  </strong>".$email;
        $mensagem .= "<br><strong>Mensagem: </strong>".$content;

  try {

     //Server settings
     $mail->SMTPDebug = 2;                                 // Enable verbose debug output
     $mail->isSMTP();                                      // Set mailer to use SMTP
     $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
     $mail->SMTPAuth = true;                               // Enable SMTP authentication
     $mail->Username = 'user@example.com';                 // SMTP username
     $mail->Password = 'secret';                           // SMTP password
     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
     $mail->Port = 587;                                    // TCP port to connect to

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
//
// } else{
//   $response_array['status'] = 'error';
// }


echo json_encode($response_array);



 ?>
