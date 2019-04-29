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
    Dashboard
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"><i class="active"></i> Lap. Presensi</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Laporan Presensi</h3>
    </div>
    <div class="box-body">
      <?=form_open($action, ['class'=>'form-horizontal']);?>
      <div class="col-md-6">
        <div class="form-group">
          <label for="start" class="control-label col-sm-1">Tgl</label>
          <div class="col-sm-5">
            <input type="date" name="start" id="start" class="form-control input-sm" value="<?=$start;?>"> 
          </div>
          <label for="end" class="control-label col-sm-1">s/d</label>
          <div class="col-sm-5">
            <input type="date" name="end" id="end" class="form-control input-sm" value="<?=$end;?>">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="kelas" class="control-label col-sm-2">Kelas</label>
          <div class="col-sm-6">
            <?php
            $options = NULL;
            $options[''] = 'Ruang Kelas';
            foreach ($refkelas as $row) {
              $options[$row->id] = $row->kelas.' - '.$row->ruang;
            }
            echo form_dropdown('kelas',$options,'',['id'=>'kelas','class'=>'form-control cariin input-sm']);
            ?>
          </div>
          <div class="col-sm-4">
            <button type="submit" name="tampil" id="tampil" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Tampil</button>
          </div>
        </div>
      </div>
      <?=form_close(); ?>
      <div class="clearfix"></div>
      <div class="table-responsive">
        <table id="tbpres" class="table table-striped table-hover dtable">
          <thead>
            <tr>
              <th>#</th>
              <th>TGL</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Status</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
  
</section>
<!-- /.content -->

<script>
  
  $(document).ready(function() {
    $(function () {
      $('.dtable').DataTable();
    });
  })
</script>