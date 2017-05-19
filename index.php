
<html>
    <head>      
        <title>Fazenda</title>
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