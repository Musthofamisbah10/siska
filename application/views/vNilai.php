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
    Nilai <?=$txtjenis;?>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Nilai <?=$txtjenis;?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Form Nilai</h3>
    </div>
    <?=form_open($action,'class="form-horizontal"'); ?>
    <div class="box-body">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="kelas" class="col-sm-2 control-label">Kelas</label>
          <div class="col-sm-9">
            <?php
            $option = NULL;
            $option[''] = 'Pilih Kelas Ruang';
            foreach($refkelas as $row) {
              $option[$row->id] = $row->kelas.' - '.$row->ruang;
            }
            echo form_dropdown('kelas',$option,'',['id'=>'kelas','class'=>'form-control input-sm','required'=>'required']); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="mapel" class="col-sm-2 control-label">Mapel</label>
          <div class="col-sm-9">
            <?php
            $option = NULL;
            $option[''] = 'Pilih Mata Pelajaran';
            foreach($refmapel as $row) {
              $option[$row->id] = $row->mapel;
            }
            echo form_dropdown('mapel',$option,'',['id'=>'mapel','class'=>'form-control input-sm','required'=>'required']); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="tgl" class="col-sm-2 control-label">Tanggal</label>
          <div class="col-sm-6">
            <input type="date" name="tgl" id="tgl" class="form-control input-sm" required="required">
          </div>
        </div>        
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="materi" class="col-sm-2 control-label">Materi</label>
          <div class="col-sm-10">
            <input type="text" name="materi" id="materi" class="form-control input-sm" required="required">
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="id" id="id" value="false">
    <input type="hidden" name="jenis" id="jenis" value="<?=$jenis;?>">
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
      <h3 class="box-title">Data Nilai <?=$txtjenis;?></h3>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table id="dtable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Kelas</th>
              <th>Mata Pelajaran</th>
              <th>Tanggal</th>
              <th>Materi</th>
              <th>Avg</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($nilai as $row) { ?>
            <tr>
              <td><?=$row->id;?></td>
              <td><?=$row->kelas;?></td>
              <td><?=$row->mapel;?></td>
              <td><?=$row->tgl;?></td>
              <td><?=$row->materi;?></td>
              <td><?=$row->avg;?></td>
              <td class="text-nowrap">
                <button class="btn btn-info btn-xs" onclick="inputnilai(<?=$row->id;?>)"><i class="fa fa-star-o"> Nilai</i></button>
                <button class="btn btn-warning btn-xs" onclick="editdata(<?=$row->id;?>);"><i class="fa fa-edit"></i> Edit</button>
                <a href="<?=base_url().'Nilai/delete/'.$row->id.'/'.$jenis;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data ini ?')"><i class="fa fa-trash-o"></i> Hapus</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
<div id="mdlnilai"></div>

<script>
  $('.carpil').select2();  
  
  function editdata(id) {
    console.log(id);
    $.ajax({
      url : "<?php echo base_url('Nilai/xedit/')?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('#id').val(data.id);
        $('#kelas').val(data.kelasid).change().focus();
        $('#mapel').val(data.mapelid).change;
        $('#tgl').val(data.tgl);
        $('#materi').val(data.materi);
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
    $('#edit').val(false);
    $('#id').val(false);
    $('#btnsimpan').html('<i class="fa fa-save"></i> Simpan').removeClass('btn-warning').addClass('btn-primary');
  })  
  
  function inputnilai(id) {
    if (id) {
      $.ajax({
        url : "<?php echo base_url('Nilai/xmodalnilai/')?>"+id,
        type : "GET",
        datType : "HTML",
        success : function(data) {
          $('#mdlnilai').html(data);
          $('#modal-nilai').modal({
            backdrop: 'static',
            keyboard: false
          });
        },
        error : function (jqXHR, textStatus, errorThrown) {
          alert("<?=$this->lang->line('getdata_err');?>");
        }
      })
    } else {
      alert("<?=$this->lang->line('getdata_err');?>");
    }
  }
  
</script>