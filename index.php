<?php
    require('conf/db.php');
    $db= new Banco();
    $db->connect();
    switch($_SERVER['REQUEST_METHOD']) {
        case 'POST':
             if($_POST['nome']!='' && $_POST['sobrenome']!='' && $_POST['data']!=''){
                if($_POST['id'] != ''){
                    $sql = "UPDATE pessoa SET nome='$_POST[nome]',sobrenome='$_POST[sobrenome]',data='$_POST[data]'
                     WHERE id=$_POST[id]";
                    } else {
                     $sql = "INSERT INTO pessoa (nome, sobrenome, data)
                      VALUES ('$_POST[nome]','$_POST[sobrenome]','$_POST[data]')";
                    }
        $db->db->query($sql);
        }        
        
        case 'GET':            
            if(isset($_GET['ex'])) {
              if ($_GET['ex'] != '') {
                 $sql = "DELETE FROM pessoa where id='$_GET[ex]'";
                $db->db->query($sql);
              }
           } else if(isset($_GET['ed'])){
               if ($_GET['ed'] != '') {
                 $sql = "SELECT * FROM pessoa where id='$_GET[ed]'";
                $dados = $db->db->prepare($sql);
                   $dados->execute();
                $dados = $dados->fetch();
             }
           }
           break;
    }           
    $sql="SELECT * FROM pessoa";
    $result = $db->db->query($sql);
?>

<html>
    <head>      
        <title>Cadastro Pessoas</title>
    </head>
    <body>
        <h1>Cadastro de Pessoas</h1>    
        <div class="cadastro">    
                <form method="POST" action="index.php">
                    <input type="hidden" id="id" name="id" value="<?= @$dados['id'] ?>">
                    <p><label for="nome">Nome</label>
                    <input value="<?= @$dados['nome'] ?>" type="text" name="nome" required=" " id="nome" autocomplete="off"> <!--autocomplete="false"-->
                </p>
                    <p><label for="sobrenome">Sobrenome</label>
                        <input value="<?php echo @$dados['sobrenome'] ?>" type="text" name="sobrenome" required=" " id="sobrenome" autocomplete="off">                            
                    </p>
                    <p><label for="data"> Nascimentos</label>
                        <input value="<?php echo @$dados['data'] ?>" type="date" name="data" required=" " id="data" autocomplete="off">
                    </p>
                    <input type="submit" value="Salvar"> 
                    <input type="reset" value="Apagar">
                </form>       
        </div>    
        <div class="pessoa">
            <h2> Pessoas Cadastradas</h2>            
            <?php
                    foreach ($result as $linha){
                        echo "---------------------------------------------------------------------------- <br>";                            
                        echo $linha['nome'].'  '.
                        $linha['sobrenome'].' | Nascimento: '.
                        $linha['data'].
                        ' <a href="pessoa.php?ex='.
                        $linha['id'].'">Excluir</a>'.' | '.
                        ' <a href="pessoa.php?ed='.
                        $linha['id'].'">Editar</a>'.
                        '<br>';
                        echo "---------------------------------------------------------------------------- <br>";
                        
                    }
                ?>        
        </div>
    </body>
</html>