<div class="container">
    <h1 class="mt-4 mb-4 text-center">Adicionar Contatos</h1>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <?php
            $Data = filter_input_array(INPUT_POST, FILTER_DEFAULT);            
            if (isset($Data)):
                $create = new Agenda;
                $create->ExeCreate($Data);
                if ($create->getResult()) :
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
                    <input type="text" class="form-control" id="name" placeholder="Nome do Contato" name="name" required autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Endereço de email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-mail do Contato" required>
                </div>
                <div class="form-group">
                    <label for="fone">Telefone</label>
                    <input type="text" class="form-control" id="fone" name="Telefone" placeholder="Telefone" required>
                </div>

                <button type="submit" class="btn btn-primary">Finalizar</button>
            </form>

        </div>

    </div>
</div>