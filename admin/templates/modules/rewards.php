<!-- <section class="full-width pageContent"> -->
            <!-- <section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-accounts"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
				</p>
			</div>
		</section> -->
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewEntrega" class="mdl-tabs__tab is-active">NEW</a>
				<a href="#tabListEntregas" class="mdl-tabs__tab">LIST</a>
			</div>
			
			<div class="mdl-tabs__panel" id="tabListEntregas">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								List Clients
							</div>
							<div class="full-width panel-content">
								<form action="#">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchClient">
											<i class="zmdi zmdi-search"></i>
										</label>
										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchClient">
											<label class="mdl-textfield__label"></label>
										</div>
									</div>
								</form>
								<div class="mdl-list">

								<?php
								
									include('../../includes/conn.php');

									$sql = "SELECT * FROM entrega_beneficio AS e INNER JOIN habitantes AS h WHERE e.id_jefe_familia = h.id";

									$stmt = $conn->prepare($sql);
									$stmt->execute();
									$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

									$i=1;

									foreach ($result as $entregas) {
								?>

									
									<div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-account mdl-list__item-avatar"></i>
											<span><?php $i . $entregas['nombres'] . " " . $entregas['apellidos'];?></span>
											<span class="mdl-list__item-sub-title"><b>N° de Pago:</b><?php $entregas['nro_pago'];?>  <b>Fecha de Entrega: </b> <?php $entregas['fecha_entrega'];?></span>
										</span>
										<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
									</div>
									<li class="full-width divider-menu-h"></li>

								<?php 

								$i++;
									}
								
								?>
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewEntrega">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Registrar Entrega
							</div>
							<div class="full-width panel-content">
								<form>
									<h5 class="text-condensedLight">Datos de Entrega</h5>
									
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" onblur="valJefe()" pattern="-?[0-9]*(\.[0-9]+)?" id="cedulaJefe">
										<label class="mdl-textfield__label" for="cedulaJefe">Cedula de Jefe de Familia</label>
										<span class="mdl-textfield__error">Número invalido</span>
									</div>
                                    
									<div class="mdl-textfield mdl-js-textfield">
									<label>Fecha de Entrega</label>
										<input type="date" id="fechaEntrega" class="mdl-textfield__input">
									</div>
                                    <div class="mdl-textfield mdl-js-textfield">
									<label class="form-label" for="beneficio_id">Beneficios</label>
										<select class="form-control" name="beneficio_id" id="beneficio_id">
											<option disabled selected>Seleccione...</option>
											<option value="1">Bolsa</option>
											<option value="2">Proteina</option>
											<option value="3">Cilindro de Gas</option>
										</select>
                                    </div>

									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="nroReferencia">
										<label class="mdl-textfield__label" for="nroReferencia">Numero de Pago:</label>
										<span class="mdl-textfield__error">Número invalido</span>
									</div>
									<p class="text-center">
									<button class="btn btn-primary" onclick="regReward()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Registrar</button>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>