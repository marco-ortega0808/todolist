<?php
    $email = $_GET['emaill'];
    $aleatorio = mt_rand();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require ('PHPMailer/src/Exception.php');
    require ('PHPMailer/src/PHPMailer.php');
    require ('PHPMailer/src/SMTP.php');

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                  
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'marcoantoniot089@gmail.com';
        $mail->Password   = 'marco9908P';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('marcoantoniot089@gmail.com', 'WebApp');
        $mail->addAddress($email);
        $mail->addReplyTo('marcoantoniot089@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Valida tu correo';
        $mail->Body = 'Tu Codigo de acceso es: <br>'.$aleatorio ;

        $mail->send();

    }
        catch(Exception $e){
        print "error {$mail->ErrorInfo}";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist Web App</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light row">
      <div class="container-fluid">
        <div class="col-3 ">
          <img src="img/logo.png" class="img-fluid" alt="">
        </div>        
        </div>
      </div>
    </nav>
<header>

    <div class="row">
        <div class="container">
            <div class="col-md-12">
                
                <div class="text-center">    
                    <h1 class="text-success mt-3 mb-3 text-decoration">
                        My todo WebApp
                    </h1>
                    <h6 class="text-secondary">Te enviamos un codigo de verificación a tu correo</h6>
                    <form action="r-password.php" method="POST">
                        <input type="text" class="form-control" placeholder="Codigo" name="valida">
                        <input type="password" name="pasword" class="form-control" placeholder="Nueva contrseña">
                        <input type="text" style="display: none;" name="code" value="<?php echo $aleatorio?>"> 
                        <input type="text" style="display: none;" name="correo" value="<?php echo $email?>"> 
                        <button type="submit" class="btn btn-primary mt-3" name="agregaRegistro">Restablecer</button>
                    </form>
                    
                </div>
    
            </div>
    
        </div>
    
    </div>

</body>
</html>