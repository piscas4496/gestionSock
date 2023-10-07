<style type="text/css">
#lo{
width: 100px;
height: 65px;	
}
</style>
<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<h1>Stock manager</h1>
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
            <div class="nav-lavel">Navigation</div>
				<ul id="accordion-menu">					
					<li>
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-bar-chart-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="fournisseur.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Fournisseur</span>
						</a>
					</li>				
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-shopping-cart"></span><span class="mtext">Entrée en stock</span>
						</a>
						<ul class="submenu">
							<li><a href="produit.php">Produit</a></li>
							<li><a href="approvision.php">Approvisionnement</a></li>
							<!-- <li><a href="stock.php">Stock</a></li>																			 -->
						</ul>
					</li>
					<li>
						<a href="client.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Clients</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-shopping-basket"></span><span class="mtext">Sortie Stock</span>
						</a>
						<ul class="submenu">
							<li><a href="sortie.php">Sortie</a></li>							
							<li><a href="perte.php">Perte Produit</a></li>																			
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-list3"></span><span class="mtext">Commandes</span>
						</a>
						<ul class="submenu">
							<li><a href="commandeclient.php">Commandes Clients</a></li>
							<li><a href="noscommandes.php">Nos Commandes</a></li>																					
						</ul>
					</li>
                    <li>
						<a href="rapport.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">Rapports</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-settings"></span><span class="mtext">Parametre</span>
						</a>
						<ul class="submenu">
							<li><a href="personnel.php">Personnel</a></li>
							<li><a href="user.php">Utilisateurs</a></li>
							<li><a href="alerte.php">Stock Alerte</a></li>																			
						</ul>
					</li>													
				</ul>
			</div>
		</div>
	</div>