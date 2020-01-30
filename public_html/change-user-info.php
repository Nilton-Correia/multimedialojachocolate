<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 

require_once "config.php";
 

$email = $phone ="";
$email_err = $phone_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["Email"]))){
        $email_err = "Por favor insira um email.";
    }else{
        $email = trim($_POST["Email"]);
    }

    if(empty(trim($_POST["Telefone"]))){
        $phone_err = "Por favor insira um Telefone.";
    }else{
        $phone = trim($_POST["Telefone"]);
    }
        

    if(empty($email_err) && empty($phone_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET email = ?, phone = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){

            mysqli_stmt_bind_param($stmt, "sii", $param_email, $param_phone, $param_id);
            

            $param_email = $email;
            $param_phone = $phone;
            $param_id = $_SESSION["id"];
            

            if(mysqli_stmt_execute($stmt)){

                header("location: welcome.php");
                exit;
            } else{
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }
        

        mysqli_stmt_close($stmt);
    }
    

    mysqli_close($con);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redefinir senha</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Novos Dados</h2>
        <p>Preencha este formulário para alterar suas informações.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Telefone</label>
                <input type="text" name="Telefone" class="form-control" value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <a class="btn btn-link" href="welcome.php">Cancelar</a>
            </div>
        </form>
    </div>    
</body>
</html>