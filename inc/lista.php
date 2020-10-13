<?php
$read = new Read;
$read->ExeRead("agenda");

$dataDel = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($dataDel) {
    $del = new Agenda;
    $del->ExeDelete($dataDel['id']);
    if ($del->getResult()) :
        //$del->getErro();
        //Redireciona
        header("Location: " .BASE);
    else :
        KLErro("Ops, não foi possivel Deletar o cadastro!", KL_ERROR);
    endif;
} else {
    # code...
}


?>
<div class="container">

    <h1 class="mt-4 mb-4 text-center">Listagem de Contatos</h1>

    <a href="novo" class="btn btn-primary mb-4">Novo Contato</a>

    <table class="table table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col" class="text-center">Ação</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($read->getResult() as $lista) {
            ?>
                <tr>
                    <th scope="row"><?php echo $lista['id']; ?></th>
                    <td><?php echo $lista['name']; ?></td>
                    <td><?php echo $lista['email']; ?></td>
                    <td><?php echo $lista['telefone'] ?></td>
                    <td width="7%" class="text-right">
                        <a href="editar/<?php echo $lista['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                        <!-- <a href="deletar/<?php //echo $lista['id']
                                                ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletar">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>


    <div id="deletar" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deletar Contato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <p>Deseja realmente deletar este contato <?php echo $lista['name']; ?>?</p>
                        <input type="hidden" name="id" value="<?php echo $lista['id'] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Deletar contato</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>