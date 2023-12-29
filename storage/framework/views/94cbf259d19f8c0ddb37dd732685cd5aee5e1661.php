<?php $__env->startSection('content'); ?>

           <style> 
                                             
              #frame { 
                  width: 2000px; 
                  height: 550px; 
                  resize: both; 
              } 
           </style>

<div class="section game-section">
    <div class="container">
        <div class="game">
			<div class="game-component">
				<div class="game-block">
					<div class="game-area__wrap">
						<div class="game-area">
							<div class="progress-wrap">
								<div class="progress-item left">

								
								</div>
							</div>
							<div class="top-corners"></div>
							<div class="bottom-corners"></div>
							<div class="game-area-content">
								<div class="dice">
									<div class="game-bar">

										<div class="bet-component">
											<div class="bet-form">
												<div class="two-cols">
													<div class="two-cols">
														<div class="form-row">
															<label>
																<div class="form-row">
																	<div class="form-field">


																	</div>
																</div>
															</label>
														</div>
														<iframe  height ="100%" width="100%" 
               style="border:0px solid black;" 
             src="https://demogamesfree.pragmaticplay.net/gs2c/openGame.do?gameSymbol=vs20olympgate&websiteUrl=https%3A%2F%2Fdemogamesfree.pragmaticplay.net&jurisdiction=99&lobby_url=https%3A%2F%2Fwww.pragmaticplay.com%2Fen%2F"  id="frame" ></iframe>
														<div class="form-row">
															<label>
																
																<div class="form-field">
																	<div class="input-valid">

																		<div class="valid"></div>
																	</div>

																</div>
															</label>
														</div>
													</div>
													<div class="form-row">
														<div class="form-row">
															<label class="nvuti-exp">

															</label>
														</div>
														<div class="two-cols">
															<div class="form-row">

															</div>
															<div class="form-row">

															</div>
														</div>
													</div>
												</div>
												<div class="game-dice"><span class="result"></span></div>
											</div>
											<div class="bet-footer">

											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="game-history__wrap">
					<div class="hash">
						
					</div>
				</div>
				<?php if(auth()->guard()->guest()): ?>
				
				<?php endif; ?>
			</div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/html/resources/views/pages/dice2.blade.php */ ?>