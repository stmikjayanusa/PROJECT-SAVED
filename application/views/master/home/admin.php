<div class="row ">
        <div class="col-lg-2 col-xs-6">
		</div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua gu">
            <div class="inner">
              <h3>Guest</h3>

              <p>20/120 User use the room</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?= site_url('List_Guest') ?>" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i>
          </div>
            </a>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>ID CARD</h3>

              <p>20/75 Available</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-credit-card"></i>
            </div>
            <a href="<?= site_url('List_Card') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>Room </h3>

              <p>1/10 use</p>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
            <a href="<?= site_url('Room') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->




</div>



<div id="tampil_modal"></div>
<script>
	$(document).on('click', '.btntambah', function(e) {
		$.ajax({
			url: "<?= site_url('master/tahunajaran/create') ?>",
			success: function(data) {
				$('#tampil_modal').html(data);
				$('#modal_tambah').modal('show');
			}
		});
	});

	function edit(kode) {
		$.ajax({
			type: "post",
			url: "<?= site_url('master/tahunajaran/edit') ?>",
			data: "&kode=" + kode,
			cache: false,
			success: function(response) {
				$('#tampil_modal').html(response);
				$('#modal_edit').modal('show');
			}
		});
	}
</script>
