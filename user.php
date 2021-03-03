<?php

require_once('db.php'); 
class User 
{
    private $id; 
    public $login; 
    public $password; 
    public $email; 
    public $db; 
    private $id_droits; 
    public $country; 
    public $city; 
    public $postCode; 
    public $street; 
    public $number; 


    public function __construct()
    {
        $this->db = Connect(); 
    }

// ---------------------------------------- INSCRIPTION -------------------------------------- //

    public function register ($login, $email, $password, $confirmPW){

        $error_log = null; 

        $login = htmlspecialchars(trim($login)); 
        $password = htmlspecialchars(trim($password)); 
        $email = htmlspecialchars(trim($email));
        $confirmPW = htmlspecialchars(trim($confirmPW)); 

    // IF LES CHAMPS LOGIN ET PASSWORD ET CONFIRMPW ET EMAIL NE SONT PAS VIDES 
    if (!empty($login) && !empty ($password) && !empty($email) &&!empty($confirmPW)) {
       $logLength = strlen($login);
       $passLength = strlen($password);
       $emailLength = strlen($email);
       $confirmLength = strlen($confirmPW);
            echo"no";
       if (($logLength >=5 ) && ($passLength >=5) && ($emailLength >=5) && ($confirmLength >=5)) {
            $checkLength = $this->db->prepare("SELECT login FROM utilisateurs WHERE login=:login"); 
            $checkLength->bindValue(":login", $login, PDO::PARAM_STR); 
            $checkLength->execute();
            $fetch = $checkLength->fetch(); 
            var_dump($fetch); 
                if (!$fetch) {

                    if ($password == $confirmPW) {
                        $cryptedpass = password_hash($password, PASSWORD_ARGON2I); 
                        $insert = $this->db->prepare("INSERT INTO utilisateurs (login, password, email,id_droits)  VALUES (:login, :cryptedpass,:email, 1)"); 
                        $insert->bindValue (":login", $login, PDO::PARAM_STR); 
                        $insert->bindValue (":cryptedpass", $cryptedpass, PDO::PARAM_STR); 
                        $insert->bindValue (":email", $email, PDO::PARAM_STR); 
                        $insert->execute();
                        header('location:connexion.php'); 
                    }
                else {
                    $error_log = "les mots de passes correspondent pas t'es sah ? "; 
                }
                }
            else {
                $error_log = "ton blaz est déjà pris"; 
            }
        }
        else {
            $error_log = "insère 5 caractères minimum, zin.";
        }
    }
    else {
        $error_log= "remplis les champs, oh truffe!"; 
    }
echo $error_log;
}
//-------------------------------------------------CONNEXION-----------------------------------------------------//

    public function connectUser($login, $password){
        $error_log = null; 
        $connectUser = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $connectUser->bindValue(':login', $login, PDO::PARAM_STR); 
        $connectUser->execute(); 
        $user = $connectUser->fetch(PDO::FETCH_ASSOC); 

    if (!empty($user)){
        if (password_verify($password, $user['password'])) {
            $this->id = $user['id']; 
            $this->login = $user['login']; 
            $this->password = $user['password']; 
            $_SESSION['id_droits'] = $user['id_droits'];
            $_SESSION['utilisateur']=$user; 
            $_SESSION['id'] = $user['id'];
            $_SESSION['utilisateur'] = [
            'id' =>
                $this->id, 
            'login' =>
                $this->login, 
            'password' => 
                $this->password               
            ]; 
            header('location:profil.php');
        } else {
                $error_log = "Login ou mot de passe erronné" ; 
            }
        } else {
            $error_log = "l'identifiant n'existe pas"; 
        }
        echo $error_log;
    }


//-------------------------------------------------UPDATE-----------------------------------------------------//
    function profile($login, $email, $password, $confirmPW, $country, $city, $postCode, $street, $number){
        $error_log = null; 
        $login = htmlspecialchars(trim($login)); 
        $email = htmlspecialchars(trim($email)); 
        $password = htmlspecialchars(trim($password)); 
        $confirmPW = htmlspecialchars(trim($confirmPW)); 
        $country = htmlspecialchars(trim($country)); 
        $city = htmlspecialchars(trim($city)); 
        $postCode = htmlspecialchars(trim($postCode)); 
        $street = htmlspecialchars(trim($street)); 
        $number = htmlspecialchars(trim($number)); 

        if (!empty($login) && !empty($email) && !empty($password) && !empty($confirmPW) && !empty($country) && !empty($city) && !empty($postCode) && !empty($street) && !empty($number)){
           $logLength = strlen($login); 
           $emailLength = strlen($email); 
           $passLength = strlen($password); 
           $confirmLength = strlen($confirmPW); 
           $countryLength = strlen($country);
           $cityLength = strlen($city);
           $streetLength = strlen($street); 

            if (($logLength >=5) && ($emailLength >=5) && ($passLength >=5) && ($confirmLength >=5) && ($countryLength >=3) && ($cityLength >= 3) && ($streetLength >=5)) {
                $myID = $_SESSION['id']; 
                $select = $this->db->prepare("SELECT * FROM utilisateurs WHERE id= :myID"); 
                $select->bindValue(":myID", $_SESSION['utilisateur']['id']); 
                var_dump($_SESSION); 
                $select->execute(); 
                $fetch = $select->fetch(); 
                
                if ($confirmPW == $password) {

                    echo"bosssssssss"; 
                    $cryptedpass = password_hash($password, PASSWORD_ARGON2I); // CRYPTEDDD
                    $update = $this->db->prepare("UPDATE utilisateurs SET login = :login, password = :cryptedpass, email= :mail, Pays = :country, Ville = :city, Code_postal = :postCode, Rue = :street, Numéro= :number WHERE id = :myID");

                    $update->bindValue(":login", $login, PDO::PARAM_STR); 
                    $update->bindValue(":cryptedpass", $cryptedpass, PDO::PARAM_STR); 
                    $update->bindValue(":myID", $_SESSION['utilisateur']['id'], PDO::PARAM_INT); 
                    $update->bindValue(":mail", $email, PDO::PARAM_STR); 
                    $update->bindValue(":country", $country, PDO::PARAM_STR); 
                    $update->bindValue(":city", $city, PDO::PARAM_STR); 
                    $update->bindValue(":street", $street, PDO::PARAM_STR); 
                    $update->bindValue(":postCode", $postCode, PDO::PARAM_STR); 
                    $update->bindValue(":number", $number, PDO::PARAM_INT); 

                    $update->execute();

                }else{
                   $error_log="Confirmation du mot de passe incorrect"; 
                }
            
            }else{
                $error_log="Veuillez insérer un minimum de 5 caractères dans les champs Login, email, mot de passe et confirmation de mot de passe et au moins 3 caractères dans les champs Pays et Ville"; 
            }

        }else{
           $error_log = "Veuillez remplir les champs"; 
        }

    echo $error_log; 
    }
}