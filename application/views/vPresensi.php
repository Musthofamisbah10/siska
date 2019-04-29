<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script src="<?=base_url('assets/vendors/select2/dist/js/select2.full.min.js');?>" type="text/javascript"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Presensi Siswa
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Presensi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Form Presensi Siswa</h3>
    </div>
    <?=form_open($action,'class="form-horizontal"'); ?>
    <div class="box-body">
      <div class="col-sm-4">
        <div class="form-group">
          <label for="tgl" class="col-sm-4 control-label">Tanggal</label>
          <div class="col-sm-8">
            <input type="date" name="tgl" id="tgl" class="form-control input-sm" value="<?=date('Y-m-d');?>" required>
          </div>
        </div>
        <div class="form-group">
          <label for="status" class="col-sm-4 control-label">Status</label>
          <div class="col-sm-8">
            <?php
            $options = NULL;
            $options = [''=>'Status','1'=>'Alpha','2'=>'Ijin','3'=>'Sakit'];
            echo form_dropdown('status', $options,'', ['id'=>'status','class'=>'form-control input-sm','required'=>'required']);
            ?>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="form-group">
          <label for="nis" class="col-sm-2 control-label">Siswa</label>
          <div class="col-sm-9">
            <?php
            $option = NULL;
            $option[''] = 'Siswa';
            foreach($refsiswa as $row) {
              $option[$row->nis] = $row->nmsiswa;
            }
            echo form_dropdown('nis',$option,'',['id'=>'nis','class'=>'form-control input-sm carpil','required'=>'required']); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="ket" class="col-sm-2 control-label">Ket.</label>
          <div class="col-sm-10">
            <input type="text" name="ket" id="ket" class="form-control input-sm" placeholder="Keterangan">
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="id" id="id" value="false">
    <input type="hidden" name="edit" id="edit" value="false">
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="form-group">
        <div class="text-center">
          <button type="submit" name="btnsimpan" id="btnsimpan" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
          <button type="reset" name="btnreset" id="btnreset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i> Reset</button>
        </div>
      </div>
    </div>
    <!-- /.box-footer-->
    <?=form_close(); ?>
  </div>
  <!-- /.box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Data Presensi</h3>
    </div>
    <div class="box-body">
      <table id="dtable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($tpresensi as $row) { ?>
          <tr>
            <td><?=$row->nis;?></td>
            <td><?=$row->nmsiswa;?></td>
            <td><?=$row->kelas;?></td>
            <td><?=$row->tgl;?></td>
            <td><?=[1=>'Alpa','Ijin','Sakit'][$row->status];?></td>
            <td><?=$row->ket;?></td>
            <td>
              <button class="btn btn-warning btn-xs" onclick="editdata(<?=$row->id;?>);"><i class="fa fa-edit"></i> Edit</button>
              <a href="<?=base_url().'presensi/delete/'.$row->id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- /.content -->

<script>
  
  $('.carpil').select2();  
  
  function editdata(id) {
    $.ajax({
      url : "<?php echo base_url('Presensi/xedit/')?>"+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('#tgl').val(data.tgl);
        $('#nis').val(data.nis).change();
        $('#status').val(data.status).change();
        $('#ket').val(data.ket);
        $('#id').val(data.id);
        $('#edit').val(true);
        $('#btnsimpan').html('<i class="fa fa-check-square-o"></i> Update').removeClass('btn-primary').addClass('btn-warning');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert("<?=$this->lang->line('getdata_err');?>");
      }
    }); 
  }
  
  $('#btnreset').click(function() {
    $('#nis').val('').change();
    $('#id').val(false);
    $('#edit').val(false);
    $('#btnsimpan').html('<i class="fa fa-save"></i> Simpan').removeClass('btn-warning').addClass('btn-primary');
  })  
  
</script>