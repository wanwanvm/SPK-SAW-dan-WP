<!--Counter Inbox-->

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SAPA-DATABASE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url() . 'theme/images/logo-dark.png' ?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/css/font-awesome.min.css' ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/AdminLTE.min.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.css' ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/datepicker/datepicker3.css' ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.css' ?>" />

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php
    $this->load->view('panitia/v_header');
    ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php
    $this->load->view('panitia/v_samping');
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          DATABASE
          <small></small>PERHITUNGAN DENGAN METODE (SAW)
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Metode SAW</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box">
                <div class="box-header">
                  <b> TABEL BOBOT</b>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table border="1" cellpadding="1" cellspacing="1" bordercolor="#000000" class="table table-striped" id="example1" style="font-size:12px;">
                      <thead>

                        <tr>
                          <th width="10" style="width:10px;">#</th>

                          <th width="32">Kd Kreteria</th>
                          <th width="80">Nama Kreteria</th>
                          <th width="80">Bobot</th>
                          <th width="80">Jenis Kreteria</th>
                          <th width="80">Normalisasi Bobot</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // $id_atribut = $i['id_atribut'];
                        $hapusisibobot = $this->db->query("TRUNCATE tb_normalisasi_bobot");
                        //--------------------------------
                        $hasil = $totbobot->row();
                        $totalbobot = $hasil->totalbobot;
                        $no = 0;
                        foreach ($data->result_array() as $i) :
                          $no++;


                          //$id_panitia=$i['id_panitia'];
                          //$nama_panitia=$i['nama_panitia'];
                          $id_kreteria = $i['id_kreteria'];
                          $kd_kreteria = $i['kd_kreteria'];
                          $nm_kreteria = $i['nm_kreteria'];
                          $nm_kasus = $i['nm_kasus'];
                          $jns_kreteria = $i['jns_kreteria'];
                          $bobot = $i['bobot'];
                          $norbobot = $bobot / $totalbobot;
                          // $id_atribut = $c['id_atribut'];
                          $qqq = $this->db->query("REPLACE INTO tb_normalisasi_bobot(id_kreteria,nilainorbobot) 
                          VALUES ('$id_kreteria','$norbobot')");
                        ?>
                          <tr>
                            <td height="22">
                              <div align="center"><?php echo $no; ?></div>
                            </td>

                            <td><?php echo "$kd_kreteria"; ?></td>
                            <td><?php echo $nm_kreteria; ?></td>
                            <td><?php echo $bobot; ?></td>
                            <td><?php echo $jns_kreteria; ?></td>
                            <td><?php echo $norbobot; ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box">
                <div class="box-header">
                  <b>TABEL ATRIBUT KRETERIA</b>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table border="1" cellpadding="1" cellspacing="1" bordercolor="#000000" class="table table-striped" id="example2" style="font-size:12px;">

                      <thead>

                        <tr>
                          <th width="10" style="width:10px;">#</th>
                          <th width="80">Nama Kasus</th>
                          <th width="32">Nama Kreteria</th>
                          <th width="80">Nama alternatif</th>
                          <th width="80">Nilai Atribut</th>
                          <th width="80">Satuan</th>






                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_atribut->result_array() as $i) :
                          $no++;


                          //$id_panitia=$i['id_panitia'];
                          //$nama_panitia=$i['nama_panitia'];
                          $nm_kasus = $i['nm_kasus'];
                          $id_kreteria = $i['id_kreteria'];
                          $nm_alternatif = $i['nm_alternatif'];
                          $nm_kreteria = $i['nm_kreteria'];
                          $nilai = $i['nilai_atribut'];
                          $satuan = $i['satuan'];
                          // $nilai = $i['nilai_atribut'];

                          //$link_view=$i['link_view'];
                          // $status=$i['status'];
                          //$tahun_prestasi=$i['tahun'];
                          //$cek=$i['cek'];
                          //$ket_cek=$i['ket_cek'];

                        ?>
                          <tr>
                            <td height="22">
                              <div align="center"><?php echo $no; ?></div>
                            </td>
                            <td><?php echo "$nm_kasus"; ?></td>
                            <td><?php echo "$nm_kreteria"; ?></td>
                            <td><?php echo $nm_alternatif; ?></td>
                            <td><?php echo $nilai; ?></td>
                            <td><?php echo $satuan; ?></td>

                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box">
                <div class="box-header">
                  <b> TABEL NORMALISASI ATRIBUT </b>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table border="1" cellpadding="1" cellspacing="1" bordercolor="#000000" class="table table-striped" id="example3" style="font-size:12px;">

                      <thead>

                        <tr>
                          <th width="10" style="width:10px;">#</th>
                          <th width="80">Nama Kasus</th>

                          <th width="32">Nama Kreteria</th>
                          <th width="80">Nama alternatif</th>
                          <th width="80">Nilai Atribut</th>
                          <th width="80">Satuan</th>
                          <th width="80">Jenis kreteria</th>
                          <th width="80">Pembagi</th>
                          <th width="80">Normalisasi</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        // $id_atribut = $i['id_atribut'];
                        $hapusisi = $this->db->query("TRUNCATE tb_nomalisasi_artribut");
                        //--------------------------------
                        $no = 0;
                        foreach ($data_atribut->result_array() as $i) :
                          $no++;
                          $id_atribut = $i['id_atribut'];
                          $id_kreteria = $i['id_kreteria'];
                          $id_alternatif = $i['id_alternatif'];
                          //memasukan pembagi
                          $q = $this->db->query("SELECT tb_atribut.id_atribut,kriteria.id_kreteria,kriteria.nm_kreteria, 
                          if(kriteria.jns_kreteria='benefit', MAX(tb_atribut.nilai_atribut),
                          MIN(tb_atribut.nilai_atribut)) as pembagi,kriteria.jns_kreteria FROM tb_kasus,kriteria,tb_atribut 
                          WHERE tb_atribut.id_kreteria=kriteria.id_kreteria and kriteria.id_kasus=tb_kasus.id_kasus 
                          and kriteria.id_kreteria='$id_kreteria' GROUP BY tb_atribut.id_kreteria ");
                          $c = $q->row_array();
                          $pembagi = $c['pembagi'];
                          $id_kreteriax = $c['id_kreteria'];
                          $jns_kreteria = $c['jns_kreteria'];

                          //$id_panitia=$i['id_panitia'];
                          //$nama_panitia=$i['nama_panitia'];
                          $nm_kasus = $i['nm_kasus'];

                          $nm_alternatif = $i['nm_alternatif'];
                          $nm_kreteria = $i['nm_kreteria'];
                          $nilai = $i['nilai_atribut'];
                          $satuan = $i['satuan'];
                          // Nilai Normalisasi
                          if ($jns_kreteria == 'benefit') {
                            //isi di bagi dengan pembagi
                            $noratribut = $nilai / $pembagi;
                          } else {
                            //pembagi di bagi nilai
                            $noratribut = $pembagi / $nilai;
                          }

                          // $id_atribut = $c['id_atribut'];
                          $qqq = $this->db->query("REPLACE INTO tb_nomalisasi_artribut(id_alternatif,id_kreteria,id_atribut,nilainormalisasi) VALUES 
                          ('$id_alternatif','$id_kreteria','$id_atribut','$noratribut')");
                        ?>
                          <tr>
                            <td height="22">
                              <div align="center"><?php echo $no; ?></div>
                            </td>
                            <td><?php echo "$nm_kasus"; ?></td>

                            <td><?php echo "$nm_kreteria"; ?></td>
                            <td><?php echo $nm_alternatif; ?></td>
                            <td><?php echo $nilai; ?></td>
                            <td><?php echo $satuan; ?></td>
                            <td><?php echo "$jns_kreteria"; ?></td>
                            <td><?php echo "$pembagi"; ?></td>
                            <td><?php echo "$noratribut"; ?></td>


                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->

      <?php
      // $id_atribut = $i['id_atribut'];
      $hapusisi = $this->db->query("TRUNCATE tb_hitungsaw");
      //--------------------------------
      $no = 0;

      $no = 0;
      foreach ($data_hitungsaw->result_array() as $ii) :
        $no++;
        $nilai_hitung = $ii['NILAI'];
        $id_kreteria = $ii['id_kreteria'];
        $id_alternatif = $ii['id_alternatif'];

        $qqq = $this->db->query("REPLACE INTO tb_hitungsaw(id_alternatif,id_kreteria,nilai_hitung) VALUES 
                          ('$id_alternatif','$id_kreteria','$nilai_hitung')");




      ?>

      <?php endforeach; ?>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-6">
            <div class="box">

              <div class="box">
                <div class="box-header">
                  <b>TABEL HASIL PERANGKINGAN <input type="button" value="Proses" onClick="document.location.reload(true)"></b>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table border="1" cellpadding="1" cellspacing="1" bordercolor="#000000" class="table table-striped" id="example4" style="font-size:12px;">

                      <thead>

                        <tr>
                          <th width="10" style="width:10px;">
                            <center>No</center>
                          </th>
                          <th width="10">Nama Alternatif</th>
                          <th width="10">Hasil</th>


                        </tr>
                      </thead>
                      <tbody>
                        <?php


                        $no = 0;
                        foreach ($data_hasilsaw->result_array() as $iii) :
                          $no++;
                          $nilai_hasil = $iii['HITUNG'];
                          $nm_alternatifx = $iii['nm_alternatif'];






                        ?>
                          <tr>
                            <td height="22">
                              <div align="center"><?php echo $no; ?></div>
                            </td>
                            <td><?php echo "$nm_alternatifx"; ?></td>
                            <td><?php echo "$nilai_hasil"; ?></td>



                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2022 <a href="">MTI-UNPAM</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">x</h4>

                  <p>x</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading" xe</h4>

                    <p>x</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading"></h4>

                  <p></p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->







  <!-- jQuery 2.2.3 -->
  <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/datepicker/bootstrap-datepicker.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/timepicker/bootstrap-timepicker.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/plugins/daterangepicker/daterangepicker.js' ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable();
      $('#example3').DataTable();
      $('#example4').DataTable();



      $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $('#datepicker2').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $('.datepicker3').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $('.datepicker4').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      });
      $(".timepicker").timepicker({
        showInputs: true
      });

    });
  </script>
  <?php if ($this->session->flashdata('msg') == 'error') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Error',
        text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
        showHideTransition: 'slide',
        icon: 'error',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#FF4859'
      });
    </script>

  <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Pengumuman Berhasil disimpan ke database.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'info') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Info',
        text: "Pengumuman berhasil di update",
        showHideTransition: 'slide',
        icon: 'info',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#00C9E6'
      });
    </script>
  <?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Pengumuman Berhasil dihapus.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
  <?php else : ?>

  <?php endif; ?>
</body>

</html>