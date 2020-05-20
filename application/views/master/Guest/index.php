
<div class="row">
  <!-- <div class="col-xs-2"></div> -->
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<button class="btn bg-olive btntambah"><i class="icon-plus3"></i> Tambah Data</button>
			</div>
			<div class="box-body table-responsive">
				<?php echo $this->session->flashdata('pesan'); ?>
        <table class="table table-bordered table-striped data-tabel">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">ID GUEST</th>
              <th class="text-center">Name</th>
              <th class="text-center">IDCARD</th>
              <th class="text-center">Address</th>
              <th class="text-center">Phone Number</th>
              <th class="text-center">E-Mail</th>
              <th class="text-center">State</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <?php $n=0; foreach ($data as $r ): $n+=1; ?>
                <tr>
                  <td class="text-center"><?= $n."."; ?></td>
                  <td class="text-left"><?= $r['id_guest']; ?></td>
                  <td class="text-center"><?= $r['name']; ?></td>
                  <td class="text-center"><?= $r['card_type']."-".$r['card_number'] ?></td>
                  <td class="text-center"><?= $r['address']; ?></td>
                  <td class="text-center"><?= $r['phone']; ?></td>
                  <td class="text-center"><?= $r['email']; ?>
                    

                  </td>
                  <td width="130px" class="text-center">
                  <?php if ($r['status'] == '1') { ?>
                    <a href="<?php echo site_url('Master/Guest/status/'.$r['id_guest']) ?>" class="btn btn-primary btn-xs">Aktif</a>
                  <?php } else { ?>
                    <a href="<?php echo site_url('Master/Guest/status/' . $r['id_guest']) ?>" class="btn btn-danger btn-xs">Tidak Aktif</a>
                  <?php } ?>
                </td>
                <td class="text-center" width="60px">
                  <a href="javascript:void(0)" onclick="edit('<?= $r['id_guest'] ?>')"><i class="icon-pencil7 text-green" data-toggle="tooltip" data-original-title="Edit Data"></i></a>
                  <a href="<?php echo site_url('Master/Guest/destroy/' . $r['id_guest']) ?>" onclick="return confirm('Yakin akan hapus data ini ?');"><i class="icon-trash text-red" data-toggle="tooltip" data-original-title="Hapus Data"></i></a>
                  </a>
                </td>
                </tr>
          <?php endforeach; ?>
        </table>
			</div>
		</div>
	</div>
</div>


<div id="tampil_modal"></div>
<script>

    $(document).on('click', '.btntambah', function(e) {
    $.ajax({
      url: "<?= site_url('Master/Guest/create') ?>",
      success: function(data) {
        $('#tampil_modal').html(data);
        $('#modal_tambah').modal('show');
      }
    });
  });

  function edit(kode) {
    $.ajax({
      type: "post",
      url: "<?= site_url('Master/Guest/edit') ?>",
      data: "&kode=" + kode,
      cache: false,
      success: function(response) {
        $('#tampil_modal').html(response);
        $('#modal_edit').modal('show');
      }
    });
  }
</script>
