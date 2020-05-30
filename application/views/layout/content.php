<style>
	.alert-dark {
		border-color: transparent;
		background: 0 0;
		background-size: 20px 20px;
	}

	.alert-success.alert-dark {
		background-color: #78bd5d !important;
		background-image: linear-gradient(45deg, rgba(255, 255, 255, .04) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .04) 50%, rgba(255, 255, 255, .04) 75%, transparent 75%, transparent);
	}

	.alert .close {
		opacity: .4;
		color: inherit;
		text-shadow: none;
	}

	.text-muted {
		font-weight: 400;
		font-size: 12px;
	}

	.product-info.tugas {
		margin-left: 0px;
	}

	.info-warning {
		color: #fff;
		border-color: #dc9c41;
		background: #f4ab43;
	}

	.info-gagal {
		color: #fff;
		border-color: #dc451f;
		background: #eb613e;
	}
</style>
<?php $urls = $this->uri->segment(2) ?>
<div class="row">
<!-- 		<div class="alert alert-success alert-dark m-b-1">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Hei <?= user() ?></strong>, Selamat Datang Kembali.
		</div> -->
	<div class="col-md-12">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Level User Login <i class="fa fa-angle-double-right"></i> <?= $urls == null ? 'admin' : $urls ?></h3>
			</div>
			<div class="box-body">
			</div>
		</div>
	</div>
</div>
