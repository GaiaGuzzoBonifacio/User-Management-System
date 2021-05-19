<?php 
use sarassoroberto\usm\entity\User;
use sarassoroberto\usm\model\UserModel;
use sarassoroberto\usm\validator\bootstrap\ValidationFormHelper;
use sarassoroberto\usm\validator\UserValidation;

require "./__autoload.php";

/** $action rappresentà l'indirizzo a cui verranno inviati i dati del form */
$action = './login_user.php';
$submit = 'Accedi';

if($_SERVER['REQUEST_METHOD']==='GET'){
    
    /** Il form viene compilato "vuoto" */
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault();
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault();     
}

if ($_SERVER['REQUEST_METHOD']==='POST') {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
       $msg = 'Inserisci email e password %s';
    }else {
        $query = "
            SELECT email, password
            FROM user
            WHERE email = :email
        ";

        $check = $pdo->prepare($query);
        $check->bindParam(':email', $email, PDO::PARAM_STR);
        $check->execute();

        $user = $check->fetch(PDO::FETCH_ASSOC);

        if(!$user || password_verify($password, $user['password']) === false) {
            $msg = 'Credenziali utente errate %s';
        }else {
            header('location: ./list_users.php');
        }
    }
    
}

include 'src/view/login_user_view.php';
?>