	<!-- navBar -->
	<div class="full-width navBar">
	<!-- <div class="navLateral-body-logo text-left tittles" style="margin-left: 4%; margin-top: 5px;">
				<h2><b>S E B U C</b></h2>
			</div> -->
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					<li class="btn-Notification" id="notifications">
						<i class="zmdi zmdi-notifications"></i>
						<!-- <i class="zmdi zmdi-notifications-active btn-Notification" id="notifications"></i> -->
						<div class="mdl-tooltip" for="notifications">Notificationes</div>
					</li>
					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Cerrar Sesion</div>
					</li>
					<li class="text-condensedLight noLink" ><small><?php echo $_SESSION['user']; ?></small></li>
					<li class="noLink">
						<figure>
							<img src="includes/images/<?php echo $_SESSION['imagen'];?>" alt="Avatar" class="img-responsive">
						</figure>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- navLateral -->
	<section class="full-width navLateral">
	
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
		<div class="full-width navLateral-body-logo text-center tittles">
				<!-- i class="zmdi zmdi-close btn-menu"></i -->
				<h2><b>S E B U C</b></h2>
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="includes/images/<?php echo $_SESSION['imagen'];?>" alt="Avatar" style="border-radius: 50%;" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
						<b style="color: #fff;"><?php echo $_SESSION['nomUser'];?><br></b>
						
						<small style="color: #fff;">Administrador</small>
					</span>
				</figcaption>
			</figure>
			<!-- <div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; DASHBOARD</span>
			</div> -->
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="/SEBUC_PLANTILLA" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								DASHBOARD
							</div>
                        </a>
					</li>
                    <li class="full-width divider-menu-h"></li>
                    <li class="full-width">
						<a onclick="habitantes()" style="cursor:pointer;" class="full-width link_disabled">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-accounts"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								HABITANTES
							</div>
                        </a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a style="cursor: pointer;" class="full-width btn-subMenu link_disabled">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								TIPOS DE HABITANTES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a onclick="bosses()" style="cursor: pointer;" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										JEFES DE FAMILIA
									</div>
								</a>
							</li>
							<li class="full-width">
								<a onclick="handicapped()" style="cursor: pointer;" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										DIVERSIDAD FUNCIONAL
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<!-- <li class="full-width">
						<a style="cursor: pointer;" class="full-width btn-subMenu link_disabled">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								POLIGONALES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a onclick="hPrincipal()" style="cursor: pointer;" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PRINCIPAL
									</div>
								</a>
							</li>
							<li class="full-width">
								<a onclick="hFJavier()" style="cursor: pointer;" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										FRANCISCO JAVIER
									</div>
								</a>
							</li>
							<li class="full-width">
								<a onclick="hCarabobo()" style="cursor: pointer;" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										CARABOBO
									</div>
								</a>
							</li>
							<li class="full-width">
								<a onclick="hOriental()" style="cursor: pointer;" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										ORIENTAL
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li> -->
					<li class="full-width">
						<a class="full-width btn-subMenu link_disabled">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								SERVICIOS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<!-- <li class="full-width">
								<a href="company.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-balance"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										COMPANY
									</div>
								</a>
							</li> -->
							<li class="full-width">
								<a onclick="rewards()" style="cursor: pointer;" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										ENTREGA DE BENEFICIOS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a onclick="rewardsEspecial()" style="cursor: pointer;" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										JORNADAS ESPECIALES
									</div>
								</a>
							</li>
							<!-- <li class="full-width">
								<a href="payments.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-card"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PAYMENTS
									</div>
								</a>
							</li> -->
							<li class="full-width">
								<a onclick="cartResidence()" style="cursor: pointer;" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-label"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
                                        CARTA DE RESIDENCIA
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu link_disabled">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								CONFIGURACIONES
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a onclick="users()" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Usuarios
									</div>
								</a>
							</li>
							<li class="full-width">
								<a onclick="poligonales()" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Poligonales
									</div>
								</a>
							</li>

							<li class="full-width">
								<a onclick="listRewards()" class="full-width link_disabled">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Beneficios
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</section>
