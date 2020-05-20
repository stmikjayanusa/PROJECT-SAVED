<?php $urls = $this->uri->segment(1) ?>
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
	<ul class="nav navbar-nav">
		<li class="<?= $urls == "welcome" ? "active" : null ?>"><a href="<?= site_url('welcome') ?>"><i class="icon-home4"></i> Home</a></li>
		<?php //if ($urls == null) {
		?>
		<li class="dropdown <?= $urls == "List_Card" || $urls == "List_Guest"  ? "active" : null ?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-gears"></i> 
				Option's 
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
				<li class="<?= $urls == "List_Guest" ? "active" : null ?>">
					<a href="<?= site_url('List_Guest') ?>">
						<i class="fa fa-users"></i> 
							List Guest
					</a>
				</li>
				<li class="<?= $urls == "List_Card" ? "active" : null ?>">
					<a href="<?= site_url('List_Card') ?>">
						<i class="glyphicon glyphicon-credit-card"></i> 
							&nbsp;&nbsp;List Card
					</a>
				</li>
				<li class="<?= $urls == "Room" ? "active" : null ?>">
					<a href="<?= site_url('Room') ?>"><i class="fa fa-university"></i>
							&nbsp;&nbsp;Room
					</a>
				</li>
			</ul>
		</li>


		
	</ul>
</div>
