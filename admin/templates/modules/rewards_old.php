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
				<a href="#tabNewEntrega" class="mdl-tabs__tab is-active">Registrar Entrega</a>
				<a href="#tabListEntregas" class="mdl-tabs__tab">Lista</a>
			</div>
			
			<div class="mdl-tabs__panel" id="tabListEntregas">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Lista de Entregas
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
											<span><?php echo "<b>$i.- </b>" . "<b>" . $entregas['nombres'] . " " . $entregas['apellidos'] . "</b>";?></span>
											<span class="mdl-list__item-sub-title"><b>N° de Pago:</b><?php echo $entregas['nro_pago'];?>   -   <b>Fecha de Entrega: </b> <?php echo $entregas['fecha_entrega'];?></span>
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
									<h6 id="errorDisplay"></h6>
									
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
										<label class="form-label" for="cedulaJefe">Cedula de Jefe de Familia</label>
										<input class="form-control" type="number" onblur="valJefe()" pattern="-?[0-9]*(\.[0-9]+)?" id="cedulaJefe">
									</div>
                                    
                                    <div class="mdl-textfield mdl-js-textfield">
									<label class="form-label" for="beneficio_id">Beneficios</label>
										<select class="form-control" name="beneficio_id" id="beneficio_id">
										<option disabled selected>Seleccione...</option>
											<?php
											
												$sqlRw = "SELECT * FROM tipo_beneficio WHERE estatus = 1;";
												$stmtRw = $conn->prepare($sqlRw);
												$stmtRw->execute();

												$resultRw = $stmtRw->fetchAll(PDO::FETCH_ASSOC);

												foreach($resultRw as $beneficio){
											?>
											
											<option value="<?php echo $beneficio['id'];?>"><?php echo $beneficio['nombre_beneficio'];?></option>

											<?php 
												}
											?>
										</select>
                                    </div>

									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<label class="form-label" for="nroReferencia">Numero de Pago:</label>
										<input class="form-control" type="number" size="6" id="nroReferencia">
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