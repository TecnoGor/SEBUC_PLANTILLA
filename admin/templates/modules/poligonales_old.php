<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabListaPoligonal" class="mdl-tabs__tab is-active">Lista</a>
				<a href="#tabNuevaPoligonal" class="mdl-tabs__tab">Nueva</a>
			</div>
			
			<div class="mdl-tabs__panel" id="tabListaPoligonal">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								Lista Poligonales
							</div>
							<div class="full-width panel-content">
								<form action="#">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchAdmin">
											<i class="zmdi zmdi-search"></i>
										</label>
										<div class="mdl-textfield__expandable-holder">
											<input class="mdl-textfield__input" type="text" id="searchAdmin">
											<label class="mdl-textfield__label"></label>
										</div>
									</div>
								</form> 

                                <div class="mdl-list">
                                    <?php

                                        include('../../includes/conn.php');

                                        $sql = "SELECT * FROM poligonal AS p INNER JOIN comunidad AS c WHERE p.id_comunidad = c.id_comunidad";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();

                                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        $i = 1;

                                        foreach($result as $poligonal){

                                    ?>
                        
                                    <div class="mdl-list__item mdl-list__item--two-line">
										<span class="mdl-list__item-primary-content">
											<i class="zmdi zmdi-account mdl-list__item-avatar"></i>
											<span><?php echo $i . ". " . $poligonal['nombre'];?></span>
											<span class="mdl-list__item-sub-title"><?php echo $poligonal['nombreComunidad'];?></span>
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
            <div class="mdl-tabs__panel is-active" id="tabNewClient">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nueva Poligonal 
							</div>
							<div class="full-width panel-content">
								<form>
									<h5 class="text-condensedLight">Datos de la Poligonal</h5>
									
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" id="namePoligonalReg">
										<label class="mdl-textfield__label" for="namePoligonalReg">Nombre</label>
										<span class="mdl-textfield__error">Nombre de la Poligonal</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <label class="form-label" for="comunidad">Comunidad</label>
                                        <select class="form-control" name="comunidad" id="comunidad">
                                            <option disabled selected>Seleccione...</option>
                                            <?php
                                                
                                                $sqlAddPoligonal = "SELECT * FROM comunidad";
                                                $stmtAdd = $conn->prepare($sqlAddPoligonal);
                                                $stmtAdd->execute();

                                                $resultAdd = $stmtAdd->fetchAll(PDO::FETCH_ASSOC);

                                                foreach($resultAdd as $comunidad) {
                                                                    
                                            ?>

                                            <option value="<?php echo $comunidad['id'];?>"><?php echo $comunidad['nombreComunidad'];?></option>
                                            
                                            <?php

                                                }
                                            
                                            ?>
                                        </select>
									</div>
									<p class="text-center">
                                    <button class="btn btn-primary" onclick="regPoligonal()" type="button"><i class="bi bi-check-circle-fill me-3"></i>Registrar</button>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>