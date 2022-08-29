<?php
    session_start();
    /* $ime = '';
    $prezime='';
    $email = '';
    $lozinka = ''; */
    $loginLozinka='';
    $loginEmail='';
    $userEmail = 0;
    $userPass = 0;
    $userLog = [];
    $korisnik ='';
    if (!isset($_SESSION['users'])){
        $_SESSION['users']=[];
        $_SESSION['user']=[];
    }
    
    
    if (isset($_POST['register'])){
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $lozinka = $_POST['lozinka'];
        
        
        if(empty($_SESSION['users'])){ 
        $_SESSION['users'][]= array('ime'=>$ime, 'prezime'=>$prezime, 'email'=>$email, 'lozinka'=>$lozinka);
        
        } 
        //$userEmail = array_search($email,$_SESSION['users']); 
            /* if ($userEmail === false) {
                header ("Location: register.php");
            } else {
                $_SESSION['users'][]= array('ime'=>$ime, 'prezime'=>$prezime, 'email'=>$email, 'lozinka'=>$lozinka);
            } */
        
       
        /* if (empty($_SESSION['user'])){
            $_SESSION['user'] = array('email'=>$email, 'lozinka'=>$lozinka);
            $userLog = $_SESSION['users'][$userEmail];
        }else{
            header("Location: register.php");
        } */
        
    }
    /* if (isset($_POST['login'])){
        $loginLozinka = $_POST['lozinka'];
        $loginEmail = $_POST['email'];
        $_SESSION['user'] = array('email'=>$loginEmail, 'lozinka'=>$loginLozinka);
        $userEmail = array_search($loginEmail,$_SESSION['user']);
        $userPass = array_search($loginLozinka, $_SESSION['user']);
        if ($userEmail === false && $userPass === false) {
            header ("Location: login.php");
        }else {
            $userLog = $_SESSION['users'][$userEmail];
            $korisnik = $userLog['ime'];
        }
    } */
    
?>
    <html>
        <body>
            <div style ="border-bottom: solid black 1px;">
                <header >
                   <?php
                        //if(empty($userLog)){ 
                        echo " <a href='login.php'  style = 'float= left; left: 20px;'>LOGIN</a>
                                <a href='register.php' style='position: absolute; right: 20px; '>REGISTER</a>";
                        //}
                    ?>
                </header>
            </div>

                <?php //if (!empty($userLog)){ 
                    echo "<h1 style='text-align: center';>Dobrodosao /* $korisnik */ </h1>
                
                    <div style='align-items: center;display: flex;justify-content: center;'> ";
                    foreach ($_SESSION["users"] as $key => $value) {
                        
                       foreach($value as $vred){
                           echo "$vred<br>";
                       }
                    }   
                    echo "</div>";
                //}
                ?>

        </body>
        <footer style="text-align:center; position:fixed; bottom:20; left:50%;">
                    <?php echo "Sva prava zadrzana ".date('Y');?>
        </footer>
    </html>

    



