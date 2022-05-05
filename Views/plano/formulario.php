<?php
/* @var $route */
?>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?= Url::toRoute("Plano", "Index") ?>" class="nav-link px-2 link-dark">Home</a></li>
        <li><a href="<?= Url::toRoute("Plano", "Plano") ?>" class="nav-link px-2 link-secondary">Plano</a></li>
    </ul>

    <div class="col-md-3 text-end">
        <a href="<?= Url::toRoute("Auth", "Index") ?>" class="btn btn-outline-primary me-2">Logout (<?= $_SESSION["user"] ?>)</a>
    </div>
</header>
<br>

<section class="text-center">
    <h1>Plano Pagamentos</h1>
</section>

<br>

<section>
    <div class="row justify-content-center text-left">
        <div class="col-3">
            <form method="post">
                <label for="credito">Crédito</label>
                <br>
                <input class="form-control" name="credito" id="credito" type="number">
                <br>
                <label for="numPrest">Nº Prestações</label>
                <br>
                <input class="form-control" name="numPrest" id="numPrest" type="number">
                <br>
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" value="Calcular">
                </div>
            </form>
        </div>
    </div>
</section>