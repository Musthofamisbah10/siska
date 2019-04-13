<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=base_url('assets/adminlte/img/avatar5.png');?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=$this->session->userdata('identity');?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="<?=base_url();?>"><i class="fa fa-dashboard text-orange"></i> <span>Dashboard</span></a></li>      
      <li><a href="<?=base_url('Presensi');?>"><i class="fa fa-calendar-o text-orange"></i> <span>Presensi Siswa</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-star text-orange"></i> <span>Nilai Siswa</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?=base_url('Nilai/index/1');?>"><i class="fa fa-chevron-circle-right"></i> <span>Nilai Harian</span></a></li>
          <li><a href="<?=base_url('Nilai/index/2');?>"><i class="fa fa-chevron-circle-right"></i> <span>Nilai TTS</span></a></li>
          <li><a href="<?=base_url('Nilai/index/3');?>"><i class="fa fa-chevron-circle-right"></i> <span>Nilai TAS</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-excel-o text-orange"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>Presensi Siswa</span></a></li>
          <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>Nilai Harian</span></a></li>
          <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>Nilai TTS</span></a></li>
          <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>Nilai TAS</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gears text-orange"></i> <span>Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?=base_url('RefKelas');?>"><i class="fa fa-chevron-circle-right"></i> Data Kelas</a></li>
          <li><a href="<?=base_url('RefMapel');?>"><i class="fa fa-chevron-circle-right"></i> Data MaPel</a></li>
          <li><a href="<?=base_url('RefGuru');?>"><i class="fa fa-chevron-circle-right"></i> Data Guru</a></li>
          <li><a href="<?=base_url('RefSiswa');?>"><i class="fa fa-chevron-circle-right"></i> Data Siswa</a></li>
          <li><a href="<?=base_url('RefMap');?>"><i class="fa fa-chevron-circle-right"></i> Guru-Kelas-MaPel</a></li>
          <li><a href="<?=base_url('RefUser');?>"><i class="fa fa-chevron-circle-right"></i> Data User</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
