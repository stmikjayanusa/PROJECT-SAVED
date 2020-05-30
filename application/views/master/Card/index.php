
<div class="row">
  <!-- <div class="col-xs-2"></div> -->
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
				<button class="btn bg-olive btntambah"><i class="icon-plus3"></i> Tambah Data</button>
			</div>
			<div class="box-body table-responsive">
				<?php echo $this->session->flashdata('pesan'); ?>
        <table class="table table-bordered table-striped datatabeldua">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th class="text-center">Kode</th>
              <th class="text-center">Tipe</th>
              <th class="text-center">Nomor</th>
              <th class="text-center">Room</th>
              <th class="text-center">State</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <?php $n=0; foreach ($data as $r ): $n+=1; ?>
              <tr>
                  <td class="text-center"><?= $n."."; ?></td>
                  <td class="text-center"><?= $r['kode']; ?></td>
                  <td class="text-center"><?= $r['card_type']; ?></td>
                  <td class="text-center"><?= $r['card_number']; ?></td>
                  <td class="text-center"><?= $r['Card_Room']; ?></td>
                 <td width="130px" class="text-center">
                    <?php if ($r['card_state'] == '1') { ?>
                      <a href="<?php echo site_url('Master/Card/status/'.$r['kode']) ?>" class="btn btn-primary btn-xs">Aktif</a>
                    <?php } else { ?>
                      <a href="<?php echo site_url('Master/Card/status/'.$r['kode']) ?>" class="btn btn-danger btn-xs">Tidak Aktif</a>
                    <?php } ?>
                  </td>
                      <td class="text-center" width="60px">
                    <a href="javascript:void(0)" onclick="edit('<?= $r['kode'] ?>')"><i class="icon-pencil7 text-green" data-toggle="tooltip" data-original-title="Edit Data"></i></a>
                    <a href="<?php echo site_url('Master/Card/destroy/' . $r['kode']) ?>" onclick="return confirm('Yakin akan hapus data ini ?');"><i class="icon-trash text-red" data-toggle="tooltip" data-original-title="Hapus Data"></i></a>
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
      url: "<?= site_url('Master/Card/create') ?>",
      success: function(data) {
        $('#tampil_modal').html(data);
        $('#modal_tambah').modal('show');
      }
    });
  });

  function edit(kode) {
    $.ajax({
      type: "post",
      url: "<?= site_url('Master/Card/edit') ?>",
      data: "&kode=" + kode,
      cache: false,
      success: function(response) {
        $('#tampil_modal').html(response);
        $('#modal_edit').modal('show');
      }
    });
  }
</script>
