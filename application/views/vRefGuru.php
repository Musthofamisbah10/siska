<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Referensi Guru
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li> Setting</li>
    <li class="active">Ref. Guru</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Form Guru</h3>
    </div>
    <?=form_open($action,'class="form-horizontal"'); ?>
    <div class="box-body">
      <div class="col-sm-5">
        <div class="form-group">
          <label for="nip" class="col-sm-2 control-label">NIP</label>
          <div class="col-sm-9">
            <input type="text" name="nip" id="nip" class="form-control input-sm" placeholder="NIP" required>
          </div>
        </div>
        <div class="form-group">
          <label for="kelasid" class="col-sm-2 control-label">Wali</label>
          <div class="col-sm-9">
            <?php
            $option = NULL;
            $option[''] = 'Pilih Ruang Kelas';
            foreach($refkelas as $row) {
              $option[$row->id] = $row->kelas.' - '.$row->ruang;
            }
            echo form_dropdown('kelasid',$option,'',['id'=>'kelasid','class'=>'form-control input-sm']); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-7">
        <div class="form-group">
          <label for="nmguru" class="col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" name="nmguru" id="nmguru" class="form-control input-sm" placeholder="Nama Guru" required>
          </div>
        </div>
        <div class="form-group">
          <label for="status" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-4">
            <select name="status" class="form-control input-sm">
              <option value="0">Tidak Aktif</option>
              <option value="1" selected>Aktif</option>
            </select>
          </div>
        </div>
      </div>
    </div>
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
      <h3 class="box-title">Data Guru</h3>
    </div>
    <div class="box-body">
      <table id="dtable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>NIP</th>
            <th>Nama Guru</th>
            <th>Wali Kelas</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($refguru as $row) { ?>
          <tr>
            <td><?=$row->nip;?></td>
            <td><?=$row->nmguru;?></td>
            <td><?=$row->kelas.' - '.$row->ruang;?></td>
            <td><?=[0=>'Tidak Aktif','Aktif'][$row->status];?></td>
            <td>
              <button class="btn btn-warning btn-xs" onclick="editdata(<?=$row->nip;?>);"><i class="fa fa-edit"></i> Edit</button>
              <a href="<?=base_url().'RefGuru/delete/'.$row->nip;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
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
  function editdata(nip) {
    $.ajax({
      url : "<?php echo base_url('RefGuru/xedit/')?>" + nip,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('#nip').val(data.nip);
        $('#nmguru').val(data.nmguru);
        $('#kelasid').val(data.kelasid).change();
        $('#status').val(data.status).change();
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
    $('#kelasid').val('');
    $('#edit').val(false);
    $('#btnsimpan').html('<i class="fa fa-save"></i> Simpan').removeClass('btn-warning').addClass('btn-primary');
  })  
  
</script>