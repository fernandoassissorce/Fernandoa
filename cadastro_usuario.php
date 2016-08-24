<?php include("topo.php"); ?>

<?php  Login(); ?>
<!-- aqui começa o miolo -->
<div class="container">
    <div class="row">

        <div class="clearfix visible-xs-block">Celular XS</div>
        <div class="clearfix visible-sm-block">Tablet SM</div>
        <div class="clearfix visible-md-block">Computador MD</div>
        <div class="clearfix visible-lg-block">Computador MD</div>

        <div class="col-md-12">
            <h1 class="page-header">Cadastro
                <small> de Usuário</small>
            </h1>
        </div>

        <div class="col-md-12">

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Nome</label>
                    <input name="nome" type="text" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control" placeholder="Email">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Senha</label>
                    <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label>Foto</label>
                    <input name="foto" type="file" class="form-control" placeholder="Foto">
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary">Enviar</button>
                    <input type="reset" class="btn btn-warning" value="Limpar">
                </div>

            </form>
        </div>

        <table class="table table-striped table-bordered">
        <tr>
            <th>Ação</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
        </tr>
            <?php
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if (isset($nome) && isset($email)) {
                $sql = "INSERT INTO usuarios (id, nome, email, senha)
                VALUES (NULL, '{$nome}', '{$email}', '{$senha}');";
               // echo $sql;
                executa_sql($sql);
            }

$consulta = executa_sql('SELECT * FROM usuarios ORDER BY id DESC');

        while ($usuarios = mysql_fetch_assoc($consulta))
        {
            $id = $usuarios['id'];
            $nome = $usuarios['nome'];
            $email = $usuarios['email'];
            $senha = $usuarios['senha'];

        echo  "<tr>
            <td>
            <a href='delete_usuario.php?id={$id}'>Delete</a>
            /

            <a href='editar_usuario.php?id={$id}'>Editar</a>

            </td>
            <td>{$nome}</td>
            <td>{$email}</td>
            <td>{$senha}</td>
            </tr>";
        }
             ?>

        </table>

    </div>
    <hr>
</div>
<!-- aqui fecha o miolo -->


<?php include("rodape.php"); ?>