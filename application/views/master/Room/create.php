<div class="modal fade" id="modal_tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data Guest</h4>
			</div>
			<?= form_open('Master/Room/store', ['class' => 'form_create']) ?>
			<div class="modal-body">
				<div class="form-group">
					<label>ID Room</label>
					<input type="text" name="idroom" class="form-control" placeholder="Contoh ID : RM-101" value="<?= "RM-".$idcount ?>">
					<span class="error idroom text-red"></span>
				</div>
				<div class="form-group">
					<label>Nama Room</label>
					<input type="text" name="name" class="form-control" placeholder="Contoh ID : Konrad Zuse" value="">
					<span class="error name text-red"></span>
				</div>
				<div class="form-group">
					<label>Owner</label>
					<input type="text" name="owner" class="form-control" placeholder="Contoh ID : Badu" value="">
					<span class="error owner text-red"></span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btnStore"><i class="icon-floppy-disk"></i> Simpan</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<script>
	$(document).on('submit', '.form_create', function(e) {
		$.ajax({
			type: "post",
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			beforeSend: function() {
				$('.btnStore').attr('disabled', 'disabled');
				$('.btnStore').html('<i class="fa fa-spin fa-spinner"></i> Sedang di Proses');
			},
			success: function(response) {
				$('.error').html('');
				if (response.status == false) {
					$.each(response.pesan, function(i, m) {
						$('.' + i).text(m);
					});
				} else {
					window.location.href = "<?= site_url('Room') ?>";
				}
			},
			complete: function() {
				$('.btnStore').removeAttr('disabled');
				$('.btnStore').html('<i class="icon-floppy-disk"></i> Simpan');
			}
		});
		return false;
	});
</script>
