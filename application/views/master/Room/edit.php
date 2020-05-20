<div class="modal fade" id="modal_edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Update Data</h4>
			</div>
			<?= form_open('Master/Room/update', ['id' => 'edit', 'class' => 'form_edit'], ['kode' => $data['id_room']]) ?>
			<div class="modal-body">
				<div class="form-group">
					<label>ID Room</label>
					<input type="text" name="idroom" class="form-control" placeholder="Contoh ID : RM-101" disabled value="<?= $data['id_room'] ?>">
					<span class="error idroom text-red"></span>
				</div>
				<div class="form-group">
					<label>Nama Room</label>
					<input type="text" name="name" class="form-control" placeholder="Contoh ID : Konrad Zuse" value="<?= $data['name_room'] ?>">
					<span class="error name text-red"></span>
				</div>
				<div class="form-group">
					<label>Owner</label>
					<input type="text" name="owner" class="form-control" placeholder="Contoh ID : Badu" value="<?= $data['owner'] ?>">
					<span class="error owner text-red"></span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btnUpdate"><i class="icon-floppy-disk"></i> Simpan</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<script>
	$(document).on('submit', '.form_edit', function(e) {
		$.ajax({
			type: "post",
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: "json",
			cache: false,
			beforeSend: function() {
				$('.btnUpdate').attr('disabled', 'disabled');
				$('.btnUpdate').html('<i class="fa fa-spin fa-spinner"></i> Sedang di Proses');
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
				$('.btnUpdate').removeAttr('disabled');
				$('.btnUpdate').html('<i class="icon-floppy-disk"></i> Simpan');
			}
		});
		return false;
	});
</script>
