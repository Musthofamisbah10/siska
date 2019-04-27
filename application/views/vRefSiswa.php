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
    Data Referensi Siswa
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Setting</li>
    <li class="active">Ref. Guru</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Form Siswa</h3>
    </div>
    <?=form_open($action,'class="form-horizontal"'); ?>
    <div class="box-body">
      <div class="col-sm-5">
        <div class="form-group">
          <label for="nis" class="col-sm-3 control-label">NIS</label>
          <div class="col-sm-9">
            <input type="text" name="nis" id="nis" class="form-control input-sm" placeholder="NIS">
          </div>
        </div>
      </div>
      <div class="col-sm-7">
        <div class="form-group">
          <label for="nmsiswa" class="col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" name="nmsiswa" id="nmsiswa" class="form-control input-sm" placeholder="Nama Siswa">
          </div>
        </div>        
      </div>
      <div class="col-sm-5 col-xs-6">
        <div class="form-group">
          <label for="tgllahir" class="col-sm-3 control-label">Tgl.Lahir</label>
          <div class="col-sm-9">
            <input type="date" name="tgllahir" id="tgllahir" class="form-control input-sm">
          </div>
        </div>
      </div>
      <div class="col-sm-7 col-md-4 col-xs-6">
        <div class="form-group">
          <label for="kelasid" class="col-sm-2 col-md-3 control-label">RuKel</label>
          <div class="col-sm-9">
            <?php
            $option = NULL;
            $option[''] = 'Pilih Ruang';
            foreach($refkelas as $row) {
              $option[$row->id] = $row->kelas.' - '.$row->ruang;
            }
            echo form_dropdown('kelasid',$option,'',['id'=>'kelasid','class'=>'form-control input-sm']); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-5 col-md-3 col-xs-6">
        <div class="form-group">
          <label for="status" class="col-sm-3 control-label">Status</label>
          <div class="col-sm-9">
            <select name="status" id="status" class="form-control input-sm">
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
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Tgl. Lahir</th>
            <th>Kelas</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($refsiswa as $row) { ?>
          <tr>
            <td><?=$row->nis;?></td>
            <td><?=$row->nmsiswa;?></td>
            <td><?=$row->tgllahir;?></td>
            <td><?=$row->kelas.' - '.$row->ruang;?></td>
            <td class="<?=($row->status) ? 'text-success':'text-danger';?>"><?=[0=>'Tidak Aktif','Aktif'][$row->status];?></td>
            <td>
              <button class="btn btn-warning btn-xs" onclick="editdata(<?=$row->nis;?>);"><i class="fa fa-edit"></i> Edit</button>
              <a href="<?=base_url().'RefSiswa/delete/'.$row->nis;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
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
      url : "<?php echo base_url('RefSiswa/xedit/')?>" + nip,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('#nis').val(data.nis);
        $('#nmsiswa').val(data.nmsiswa);
        $('#tgllahir').val(data.tgllahir);
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