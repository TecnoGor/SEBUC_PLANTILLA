	<?php
		include('templates/header.php');
		require_once('templates/modules/modals/modalEditHabitante.php');
		require_once('templates/modules/modals/modalRegHabitante.php');
		require_once('templates/modules/modals/modalRegUser.php');
		require_once('templates/modules/modals/modalEditUser.php');
		require_once('templates/modules/modals/modalRegEntrega.php');
		require_once('templates/modules/modals/modalRegEntregaEspecial.php');
		require_once('templates/modules/modals/modalRegReward.php');
		require_once('templates/modules/modals/modalEditBeneficio.php');
		require_once('templates/modules/modals/modalRegPoligonal.php');
		require_once('templates/modules/modals/modalEditPoligonal.php');
	?>
	
	<!-- pageContent -->
	<section id="pageContentId" class="full-width pageContent">
		<section id="tilesResponsive" class="full-width text-center" style="padding: 40px 0;">
			<h3 class="text-center tittles">RESPONSIVE TILES</h3>

			<?php
			
			require('templates/modules/countEtiquetas.php');
			
			?>
			
			<!-- <article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						9<br>
						<small>Categories</small>
					</span>
				</div>
				<i class="zmdi zmdi-label tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						121<br>
						<small>Products</small>
					</span>
				</div>
				<i class="zmdi zmdi-washing-machine tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
					<span class="text-condensedLight">
						47<br>
						<small>Sales</small>
					</span>
				</div>
				<i class="zmdi zmdi-shopping-cart tile-icon"></i>
			</article> -->
		</section>
		<section id="homeInfo" class="full-width" style="margin: 30px 0;">

			<div class="container">

				<div class="row">
					<div class="col-md-7 m-3 rounded bg-light bg-gradient">
						<?php include('templates/modules/charts/chartII.php');?>
					</div>

					<div class="col-md-4 m-2 rounded bg-light bg-gradient">
						<?php include('templates/modules/charts/chartI.php');?>
					</div>
				</div>
				
			</div>
			<!-- <h3 class="text-center tittles">RESPONSIVE TIMELINE</h3>
			<div id="timeline-c" class="timeline-c">
				<div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-info">
	                    <i class="zmdi zmdi-twitter"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>05-04-2016</span>
	                </div>
	            </div>
				<div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-success">
	                    <i class="zmdi zmdi-whatsapp"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>06-04-2016</span>
	                </div>
	            </div>
	            <div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-primary">
	                    <i class="zmdi zmdi-facebook"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>07-04-2016</span>
	                </div>
	            </div>
	            <div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-danger">
	                    <i class="zmdi zmdi-youtube"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>08-04-2016</span>
	                </div>
	            </div>
			</div> -->
		</section>
		
		<div id="templates">

			

		</div>
	</section>

	

	<?php
		include('templates/footer.php');
	?>