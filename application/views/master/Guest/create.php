<div class="modal fade" id="modal_tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data Guest</h4>
			</div>
			<?= form_open('Master/Guest/store', ['class' => 'form_create']) ?>
			<div class="modal-body">
				<div class="form-group">
					<label>ID Guest</label>
					<input type="text" name="idguest" class="form-control" placeholder="Contoh ID : 1305022802980001">
					<span class="error idguest text-red"></span>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="name" class="form-control" placeholder="Contoh Nama : Badu">
					<span class="error name text-red"></span>
				</div>
				<div class="form-group ">
					<label>Guest CRAD</label>
					<select class="form-control" name="gcard" id="level">
						<option value="">-- Pilih Level --</option>
						<?php foreach ($card as $key ) { ?>
							<option value="<?= $key['kode'] ?>"><?= $key['card_type'].$key['card_number'] ?></option>
						<?php } ?>
					</select>
					<span class="error level text-red"></span>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="address" class="form-control"></textarea>
					<span class="error address text-red"></span>
				</div>
				<div class="form-group">
					<label>Nomor Phonsel</label>
					<input type="text" name="phone" class="form-control" placeholder="Contoh HP : 083182647716">
					<span class="error phone text-red"></span>
				</div>
				<div class="form-group">
					<label>E-mail</label>
					<input type="text" name="email" class="form-control" placeholder="Contoh Nama : Badu@mail.com">
					<span class="error email text-red"></span>
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
					window.location.href = "<?= site_url('List_Guest') ?>";
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
