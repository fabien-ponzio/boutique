<?php

class User 
{
    private $id_utilisateurs; 
    public $login; 
    public $password; 
    public $email; 
    public $db; 
    private $droits; 
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
                    $error_log = "Les mots de passes ne correspondent pas"; 
                }
                }
            else {
                $error_log = "Le login est déjà utilisée par quelqu'un d'autre"; 
            }
        }
        else {
            $error_log = "Veuillez insérer au minimum 5 caractères dans les champs";
        }
    }
    else {
        $error_log= "Veuillez remplir les champs"; 
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

            $this->id_utilisateurs = $user['id_utilisateurs']; 
            $this->login = $user['login']; 
            $this->password = $user['password']; 
            $this->droits = $user['droits'];

            $_SESSION['utilisateur'] = [
            'id_utilisateurs' =>
                $this->id_utilisateurs, 
            'login' =>
                $this->login, 
            'password' => 
                $this->password, 
            'droits'=>
                $this->droits,

            ]; 
            header('location:infoUser.php');
        } else {
                $error_log = "Login ou mot de passe erronné" ; 
            }
        } else {
            $error_log = "l'identifiant n'existe pas"; 
        }
        echo $error_log;
    }


//-------------------------------------------------UPDATE-----------------------------------------------------//
    function profile($login, $email, $password, $confirmPW, $country, $city, $postCode, $street, $number, $name, $surname){
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
        $name = htmlspecialchars(trim($name)); 
        $surname = htmlspecialchars(trim($surname)); 


        if (!empty($login) && !empty($email) && !empty($password) && !empty($confirmPW) && !empty($country) && !empty($city) && !empty($postCode) && !empty($street) && !empty($number)&& !empty($name)&& !empty($surname)){
           $logLength = strlen($login); 
           $emailLength = strlen($email); 
           $passLength = strlen($password); 
           $confirmLength = strlen($confirmPW); 
           $countryLength = strlen($country);
           $cityLength = strlen($city);
           $streetLength = strlen($street);
           $nameLength = strlen($name); 
           $surnameLength = strlen($surname); 
 

            if (($logLength >=5) && ($emailLength >=5) && ($passLength >=5) && ($confirmLength >=5) && ($countryLength >=3) && ($cityLength >= 3) && ($streetLength >=5) && ($nameLength >=5) && ($surnameLength >=5) ) {
                $myID = $_SESSION['utilisateur']['id_utilisateurs']; 
                $select = $this->db->prepare("SELECT * FROM utilisateurs WHERE id_utilisateurs= :myID"); 
                $select->bindValue(":myID", $_SESSION['utilisateur']['id_utilisateurs']); 
                var_dump($_SESSION); 
                $select->execute(); 
                $fetch = $select->fetch(); 
                
                if ($confirmPW == $password) {

                    echo"bosssssssss"; 
                    $cryptedpass = password_hash($password, PASSWORD_ARGON2I); // CRYPTEDDD
                    $update = $this->db->prepare("UPDATE utilisateurs SET login = :login, password = :cryptedpass, email= :mail, pays = :country, ville = :city, code_postal = :postCode, rue = :street, numero= :number, nom = :name, prenom = :surname WHERE id_utilisateurs = :myID");

                    $update->bindValue(":login", $login, PDO::PARAM_STR); 
                    $update->bindValue(":cryptedpass", $cryptedpass, PDO::PARAM_STR); 
                    $update->bindValue(":myID", $_SESSION['utilisateur']['id_utilisateurs'], PDO::PARAM_INT); 
                    $update->bindValue(":mail", $email, PDO::PARAM_STR); 
                    $update->bindValue(":country", $country, PDO::PARAM_STR); 
                    $update->bindValue(":city", $city, PDO::PARAM_STR); 
                    $update->bindValue(":street", $street, PDO::PARAM_STR); 
                    $update->bindValue(":postCode", $postCode, PDO::PARAM_STR); 
                    $update->bindValue(":number", $number, PDO::PARAM_INT);
                    $update->bindValue(":name", $name, PDO::PARAM_STR); 
                    $update->bindValue(":surname", $surname, PDO::PARAM_STR); 
 

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
    public function InfoUser($id_user){
            $getinfo = $this->db->prepare("SELECT * FROM utilisateurs WHERE id_utilisateurs = $id_user"); 
            $getinfo->execute(); 
            $fetch = $getinfo->fetchAll(PDO::FETCH_ASSOC); 
            return $fetch; 
        
    }
// ------------------------------------------------------- DECONNEXION ----------------------------------------- // 
    public function Disconnect(){
        session_unset(); 
        session_destroy(); 
    }

}
