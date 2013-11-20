<HTML>
    <HEAD>
        <meta charset="UTF-8">
    </HEAD>
    <BODY>
<?php
require 'model/sql.php';
echo 'd';
$sql = new sql;
if (isset($_POST['submit'])){
    echo $sql->update($_POST);
}


$result = $sql->select_site('');
$form = '
    <form action = "testForm.php" method = "POST">
        name: <input type = "text" name ="name" value ="'.$result['name'].'"><br>
        link: <input type = "text" name ="link" value ="'.$result['link'].'"><br>
        content: <input type = "text" name ="content" value ="'.$result['content'].'"><br>
        <input type = "submit" name = "submit">
    </form>';
echo $form;
?>
    </BODY>
</HTML>


