<style type="text/css">
   .card{border-radius: 8px}
   .afiliado b {font-size: 20px; color: #fff; margin-bottom: 10px; display: block;}
   .afiliado p {font-size: 30px;color: #fff;margin-top: 20px; display: block; font-weight: bold;}
   .card-comissoes{background: rgb(48, 202, 26);}
   .card-pagamentos{background: rgba(80, 126, 185)}
   .table {width: 100%;margin-bottom: 1rem;color: #212529;background: #1d1d1d; border-radius: 8px; overflow: hidden; }
   .table td, .table th {   padding: .75rem;   vertical-align: top;   border-top: 1px solid #292928; color: #fff; font-weight: 600; }
   .table th{background: #292928; color: #fff; font-weight: bold; text-transform: uppercase;}
</style>
<div class="main-content">
   <div class="container-medium mb-24">
      <div class="row">
         <div class="col-md-12 mb-24-2">
            <h3 class="white">Bem-vindo de volta<br><small>Seu status e análises estão aqui</small></h3>
         </div>
      </div>

      <div class="row mb-24-2 afiliado">
         <div class="col-md-4">
            <div class="card card-saldo">
               <div class="card-body d-flex" style="gap: 25%">
                  <div>
                     <b>Saldo</b>
                     <p>R$<?=number_format($saldo_afiliado, 2, ',', '.')?></p>
                  </div>
                  <div>
                     <button type="button" class="btn-small btn-color-1 w-button" data-toggle="modal" data-target="#saqueAfiliado">SACAR</button>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-4">
            <div class="card card-comissoes">
               <div class="card-body">
                  <b>Comissões</b>
                  <p>R$<?=number_format($saldo_afiliado, 2, ',', '.')?></p>
               </div>
            </div>
         </div>

         <div class="col-md-4">
            <div class="card card-pagamentos">
               <div class="card-body">
                  <b>Pagamentos</b>
                  <p>R$0,00</p>
               </div>
            </div>
         </div>
      </div>

      <div class="row afiliado">
         <div class="col-md-12 mb-24-2">
            <div class="card">
               <div class="card-body">
                  <b>Link de Afiliado</b>
                  <div class="form-rocket w-form">
                     <div class="content-select-field mt-24" >
                        <?php if ($usuario[0]->usuario !== null): ?>
                           <div class="eng-select-field full" style=" margin-right: 10px;">
                              <input style="padding-left: 10px;" type="text" class="input w-input" maxlength="256" id="afiliadotext" name="name-2" data-name="Name 2" placeholder="Carregando..." value="<?= base_url(); ?>?ref=<?php echo $usuario[0]->usuario ?>" >
                           </div>
                           <a href="#" class="btn-small w-inline-block" onclick="copyTextToClipboard('#afiliadotext')">
                              <div>Copiar</div>
                           </a>
                        <?php else: ?>
                           <div class="gray-4 mt-16">Finalize sua cadastro para obter o link!</div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="row afiliado">
         <div class="col-md-12 mb-24-2">
            <div class="card">
               <div class="card-body">
                  <b class="mb-4">Minhas Indicações</b>
                  <?php if ($indicacoes) : ?>
                  <table class="table">
                     <tr>
                        <th style="border-top: 0;">Afiliado</th>
                        <th style="border-top: 0;">Data</th>
                        <th style="border-top: 0;">Comissão</th>
                     </tr>

                     <?php foreach ($indicacoes as $indicacao): ?>
                     <tr>
                        <td><?=$indicacao->afiliado?></td>
                        <td><?=date('d/m/Y H:i:m', strtotime($indicacao->data_hora))?></td>
                        <td>R$<?=number_format($indicacao->valor, 2, ',', '.')?></td>
                     </tr>
                     <?php endforeach; ?>
                  </table>
                  <?php else: ?>

                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
<div class="modal fade" id="saqueAfiliado" tabindex="-1" aria-labelledby="modalSaqueLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="card windows">
      <h3 class="white">Realize o seu saque</h3>
      <div class="gray-3 mb-24">Faça o saque agora e aproveite seus lucros!</div>
      <div class="form w-form">
         <form method="post" action="<?= base_url(); ?>payment/saqueAfiliado" id="sacarAfiliado" name="sacar">
            <div class="gray-3">Quantia</div>
            <div class="eng-text-field"><input type="number" max="<?=$saldo_afiliado?>" class="input no-padding w-input" maxlength="256" name="value" placeholder="Inisira um valor" id="value" required=""></div>
            <div class="eng-text-field mt-2">
               <select id="type" name="type" class="input no-padding select w-select">
                  <option value="">Tipo de Chave</option>
                  <option value="CPF">CPF</option>
                  <option value="EMAIL">E-mail</option>
                  <option value="TELEFONE">Telefone</option>
                  <option value="CHAVE_ALEATORIA">Chave aleatória</option>
               </select>
            </div>
            <div class="eng-text-field mt-2">
               <input type="text" class="input no-padding w-input" maxlength="256" name="key" placeholder="Chave PIX" withdrawal-pix-key="" id="key" required="">
               <div class="eng-icon-field-img"><img alt="" loading="lazy" src="https://assets-global.website-files.com/6483631a773f6af2b4edabab/6483631a773f6af2b4edabb3_pix-icon.svg" class="icon-field-img-2"></div>
            </div>
            <div class="ang-alert">
               <div class="options-form">
                  <div>Saques permitidos apenas para contas bancárias de sua titularidade</div>
               </div>
            </div>
         </form>
      </div>
      <button type="submit" class="mt-16 btn-small btn-color-1 w-inline-block" form="sacarAfiliado">
         <div class="content-btn">
            <div>Sacar</div>
         </div>
      </button>
      <div fs-scrolldisable-element="enable" class="eng-close-windows" data-dismiss="modal">
         <div class="content-btn">
            <div class="icon-16"></div>
         </div>
      </div>
   </div>
    </div>
  </div>
</div>