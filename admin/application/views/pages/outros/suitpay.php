<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h1 class="h2">Configurações Gateway de Pagamento (Suitpay)</h1>
      </div> 
      <div class="container mt-3">
      <?php if ($this->session->flashdata('msg')): ?> 

      <div class="alert alert-<?= $this->session->flashdata('tipo'); ?> text-center"" role="alert">
        <?= $this->session->flashdata('msg'); ?>
      </div>

      <?php endif; ?>

     
      <form method="post" action="<?php echo site_url('GatewayPagamento/save/suitpay'); ?>">
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="<?php echo $config[0]->url ?>">
            </div>
            <div class="mb-3">
                <label for="client_id" class="form-label">Client ID</label>
                <textarea class="form-control" id="client_id" name="client_id" rows="3"><?php echo $config[0]->client_id ?></textarea>
            </div>
            <div class="mb-3">
                <label for="client_secret" class="form-label">Client Secret</label>
                <textarea class="form-control" id="client_secret" name="client_secret" rows="3"><?php echo $config[0]->client_secret ?></textarea>
            </div>

            <div class="mb-3">
                <label for="ativo" class="form-label">Status</label>
            <?php if ($isEzzyBank == true): ?> 
                <input type="text" class="form-control" placeholder="Desative a gateway Ezzebank para habilitar essa gateway">
            <?php else: ?>
                <select class="form-select" aria-label="Default select example" name="ativo" id="ativo">
                    <option value="<?php echo $config[0]->ativo ?>" selected>Selecionar </option>
                    <option value="1">Ativado</option>
                    <option value="0">Desativado</option>
                </select>
            <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

</main>
