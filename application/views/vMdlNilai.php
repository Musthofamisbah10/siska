<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
    
<div class="modal fade" id="modal-nilai">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input Nilai</h4>
      </div>
      <div class="modal-body">
        <div class="control-label col-sm-4 col-xs-6"><b>Jenis : </b><?=['1'=>'Tes Harian','Tes Tengah Semester','Tes Akhir Semester'][$mnilai->jenisid];?></div>
        <div class="control-label col-sm-4 col-xs-6"><b>Mapel : </b><?=$mnilai->mapel;?></div>
        <div class="control-label col-sm-4 col-xs-6"><b>Materi : </b><?=$mnilai->materi;?></div>
        <div class="">
          <table class="table table-striped table-hover table-responsive">
            <tr>
              <th>#</th>
              <th>NIS</th>
              <th>Nama Siswa</th>
              <th>Nilai</th>
            </tr>
            <?php
            $i = 0;
            foreach ($nnilai as $row) {
              $i++; ?>
            <tr style="height:20px;">
              <td><?=$i;?></td>
              <td><?=$row->nis;?></td>
              <td><?=$row->nmsiswa;?></td>
              <td><a href="#" data-name="nilai" class="update" data-type="text" data-pk="<?=$row->id;?>" data-title="Input Nilai"><?=$row->nilai;?></a></td>
              </tr>
            <?php } ?>
          </table>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
//  $.fn.editable.defaults.mode = 'inline';
  $('.update').editable({
    url: '<?=base_url('Nilai/xinputnilai');?>',
    type: "POST",
    tpl: "<input type='text' style='width: 70px'>",
    validate: function(value){
    if($.trim(value) == '') {
      return 'This field is required';
    }
      var regex = /^[0-9]+$/;
      if(!regex.test(value))
    {
      return 'Angka Bos!';
    }
   }
  }).on('shown', function(ev, editable) {
    setTimeout(function() {
        editable.input.$input.select();
    },0);
  });
    
  
</script>