<div class="main-content home">
   <div class="container-medium">
      <section id="best" class="main_slots-wrapper">
         <div class="eng-title mb-8">
            <div class="left-title">
               <h4 class="txt-yellow"><i class="fa-solid fa-fire fa-lg"></i></h4>
               <h4 class="white"><?=$nome_provedor?></h4>
            </div>
         </div>
         <div class="w-dyn-list">
            <div fs-cmsfilter-duration="50" fs-cmsload-mode="infinite" class="eng-slots-int _6 w-dyn-items" fs-cmsfilter-tagformat="category" fs-cmsfilter-element="list" role="list" fs-cmssort-element="list" fs-cmsload-element="list" fs-cmsfilter-showquery="true">

            <?php foreach ($jogos as $p): ?>
               <div role="listitem" class="item-game w-dyn-item">
                  <a href="<?php echo base_url('games/ver/'.$p->provider.'/'.$p->game_code); ?>" class="link-game w-inline-block" data-ix="hover-play-game">
                     <img loading="eager" img-slot-game="" src="<?php echo $p->banner; ?>" alt="" class="slot-game">
                     <div fs-cmsfilter-field="name" fs-cmssort-field="name" class="name-game"><?php echo $p->game_name; ?></div>
                     <div fs-cmsfilter-field="name" fs-cmssort-field="name" class="name-game"><?php echo $p->provider; ?></div>
                     <div class="eng-light-effetct w-condition-invisible" data-ix="light-effect-slot"><img src="https://assets.website-files.com/6483631a773f6af2b4edabab/64c2a7770457de14173a580e_reflect.webp" loading="eager" sizes="(max-width: 479px) 9vw, (max-width: 767px) 18.3671875px, (max-width: 991px) 2vw, (max-width: 1279px) 18.3671875px, 1vw" srcset="https://assets.website-files.com/6483631a773f6af2b4edabab/64c2a7770457de14173a580e_reflect-p-500.png 500w, https://assets.website-files.com/6483631a773f6af2b4edabab/64c2a7770457de14173a580e_reflect-p-800.png 800w, https://assets.website-files.com/6483631a773f6af2b4edabab/64c2a7770457de14173a580e_reflect.webp 1148w" alt="" class="reflect-slot" style="transform-style: preserve-3d; opacity: 0; transform: translateX(-150%) translateY(0px) translateZ(0px);"></div>
                     <div class="light-effect-slot w-condition-invisible"></div>
                     <div class="light-effect-slot-blur w-condition-invisible"></div>
                  </a>
               </div>

             <?php endforeach; ?>
               
            </div>
            <div role="navigation" aria-label="List" class="w-pagination-wrapper pagination"></div>
         </div>
      </section>
   </div>
