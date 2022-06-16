<?php
/* @var $cliente User */
/* @var $fatura Fatura */
/* @var $produtos Produto[] */
?>

<section class="mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Selecione um Produto para uma nova Linha de Fatura</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form>
                        <div class="row" style="margin-left: 1%">
                            <div class="col">
                                <label for="pesquisa">Pesquisar</label>
                                <input type="text" name="pesquisa" id="pesquisa" class="form-control" value="<?= $_GET["pesquisa"] ?>"/>
                            </div>
                            <div class="col pt-1">
                                <br>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                <input type="submit" class="btn btn-primary" name="limpar" value="Limpar">
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Referência</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descricao</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Preco</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($produtos as $produto){
                                ?>
                                <tr>
                                    <td class="px-5"><?= $produto->referencia ?></td>
                                    <td><?= $produto->descricao ?></td>
                                    <td><?= $produto->preco ?>€</td>
                                    <td><?= $produto->stock ?></td>
                                    <td class="align-middle text-end">
                                        <form method="post" action="<?= Url::toRoute('Faturas', 'EmitirQuartaFase') ?>">
                                            <input type="hidden" name="produtoId" value="<?= $produto->id ?>">
                                            <input type="hidden" name="clienteId" value="<?= $cliente->id ?>">
                                            <input type="hidden" name="faturaId" value="<?= $fatura->id ?>">
                                            <span>
                                                <input type="submit" class="btn btn-link text-warning text-gradient px-3 mb-0" value="Selecionar">
                                            </span>
                                        </form>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
