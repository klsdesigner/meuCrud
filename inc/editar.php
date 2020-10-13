<div class="container">
    <h1 class="mt-4 mb-4 text-center">Alterar Contato</h1>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <?php
            $id = $url[1];

            $read = new Read;
            $read->ExeRead("agenda", "WHERE id = :id", "id={$id}");
            
            foreach ($read->getResult() as $value) {
                extract($value);
            }


            $Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);            
            if ($Data):               

                $update = new Agenda;
                $update->ExeUpdate($id, $Data);
                if ($update->getResult()) :
                    //Redireciona
                    header("Location: " .BASE);
                else :
                    KLErro("Ops, não foi possivel realizar o cadastro!", KL_ERROR);
                endif;
            endif;
            
            ?>
            <form action="" method="POST" name="frm" id="frm">
                <div class="form-group">
                    <label for="name">Nome completo</label>
                    <input type="text" class="form-control" id="name" placeholder="Nome do Contato" name="name" value="<?php if($name): echo $name; endif; ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Endereço de email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail do Contato" value="<?php if($email): echo $email; endif; ?>" required>
                </div>
                <div class="form-group">
                    <label for="fone">Telefone</label>
                    <input type="text" class="form-control" id="fone" name="Telefone" placeholder="Telefone" value="<?php if($telefone): echo $telefone; endif; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <button type="reset" onclick="history.go(-1)" class="btn btn-warning">voltar</button>
            </form>

        </div>

    </div>
</div>