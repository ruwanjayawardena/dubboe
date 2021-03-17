<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand hvr-backward" href="#" onclick="navigateDashboard();">
        <span class="logoText text-uppercase">
			<?php
			if ($_SESSION['usr_cat_id'] == 1) {
				//super admin
				echo "Super Admin Dashboard";
			} else if ($_SESSION['usr_cat_id'] == 2) {
				//customer - defined user category
				echo "Admin Dashboard";
			}
			?>
        </span>     
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#" onclick="navigateDashboard();"><i class="fas fa-home fa-lg"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../"><i class="fas fa-glob"></i> Visit Website </a>
            </li>
        </ul>
        <span class="navbar-text mr-right">
            <i class="fas fa-user-circle fa-inverse fa-lg"></i> Welcome, <?php echo $_SESSION['usr_first_name']; ?>
            <button class="btn btn-outline-light logout">Log out</button>
        </span>
    </div>
</nav>

