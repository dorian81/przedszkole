<?php
require_once 'sql.php';
session_start();

if (isset($_GET['action'])&&$_GET['action'] == 'logout'){
    session_destroy();
}

$sql = new sql();

$admins_count = mysql_num_rows($sql->select_admins());

$form = '<html>
            <head>
                <meta charset="UTF-8">
                <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
                <script type="text/javascript" src="assets/script.js"></script>
            </head>
            <body><center>';

if ($admins_count == 0){
    require 'admins.php';
    $form .= adm_new().'</center></body></html>';
    echo $form;
}else{
    if (isset($_POST['login'])&&isset($_POST['pass'])){
        $result = $sql->check_login($_POST['login'],$_POST['pass']);
        if (mysql_num_rows($result) > 0){
            $row = mysql_fetch_assoc($result);
            $_SESSION['id'] = session_id();
            $_SESSION['imie'] = $row['imie'];
            $_SESSION['nazwisko'] = $row['nazwisko'];
            header('location:index.php');
        }else{
            $form .= 'Podany login lub hasło są nieprawidłowe!';
        }
    }
    $form .= '
            <form action="login.php" method="POST">
                <table border="0" cellspacing="2" cellpadding="2">
                    <tr><td>Login:</td><td><input type="text" name="login"></td></tr>
                    <tr><td>Hasło:</td><td><input type="password" name="pass"></td></tr>
                </table>
                <input type="submit" value="Zaloguj">
            </form>
          </center>
          </body>
          </html>';
    echo $form;
}