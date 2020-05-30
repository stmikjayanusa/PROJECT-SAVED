<div class="modal fade" id="modal_edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Update Data</h4>
			</div>
			<?= form_open('Master/Guest/update', ['id' => 'edit', 'class' => 'form_edit'], ['kode' => $data['id_guest']]) ?>
<!-- 			<div class="modal-body">
				<div class="form-group">
					<input type="text" name="nama" class="form-control" placeholder="Contoh Tahun Ajaran : 2018/2019" value="<?= $data['nama_tahun'] ?>">
					<span class="error nama text-red"></span>
				</div>
			</div> -->
			<div class="modal-body">
				<div class="form-group">
					<label>ID Guest</label>
					<input type="text" name="idguest" disabled class="form-control" placeholder="Contoh ID : 1305022802980001" value="<?= $data['id_guest'] ?>">
					<span class="error idguest text-red"></span>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="name" class="form-control" placeholder="Contoh Nama : Badu" value="<?= $data['name'] ?>">
					<span class="error name text-red"></span>
				</div>
				<div class="form-group ">
					<label>Guest Card</label>
					<select class="form-control" name="gcard" id="level">
						<option value="">-- Pilih Level --</option>
						<?php foreach ($card as $key ) { ?>
							<option <?= $data['guest_card'] == $key['kode'] ? "selected" : "" ?> value="<?= $key['kode'] ?>"><?= $key['card_type'].$key['card_number'] ?></option>
						<?php } ?>
					</select>
					<span class="error level text-red"></span>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="address" class="form-control"><?= $data['address'] ?></textarea>
					<span class="error address text-red"></span>
				</div>
				<div class="form-group">
					<label>Nomor Phonsel</label>
					<input type="text" name="phone" class="form-control" placeholder="Contoh HP : 083182647716" value="<?= $data['phone'] ?>">
					<span class="error phone text-red"></span>
				</div>
				<div class="form-group">
					<label>E-mail</label>
					<input type="text" name="email" class="form-control" placeholder="Contoh Nama : Badu@mail.com" value="<?= $data['email'] ?>">
					<span class="error email text-red"></span>
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
					window.location.href = "<?= site_url('List_Guest') ?>";
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
