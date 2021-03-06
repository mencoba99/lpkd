<?php
$this->load->view('admin/template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />

<?php
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>
<style>
/*.trash{padding:2px; border:1px solid red; margin-left:10px; background-color:red; color:#fff}*/
td{padding:5px}
</style>
<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3 id="myModalLabel">Delete Confirmation</h3>

            </div>
            <div class="modal-body">
                <p class="error-text"><h4><i class="fa fa-warning modal-icon"></i>Yakin ingin menghapus data ini???...</h4>
                    <!-- <br>This cannot be undone. -->
                    </p>
            </div>
            <div class="modal-footer">
               <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Cancel</button> <a href="#" class="btn btn-danger"  id="modalDelete" >Delete</a>

            </div>
        </div>
    </div>
</div>
<div class="modal small fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                 <h3 id="myModalLabel">Confirmation</h3>

            </div>
            <form method="post" id="modalPrint" target ="_blank">
            <div class="modal-body">
                <p class="error-text"><h5></i>Nama Ketua Tim Penguji</h5>
                    <!-- <br>This cannot be undone. -->
                    <input type="text" name="ketTim" placeholder="Name..." class="form-control1">
                </p>
                <p class="error-text"><h5></i>No Induk Petugas</h5>
                    <!-- <br>This cannot be undone. -->
                    <input type="text" name="nip" placeholder="No Induk Petugas..." class="form-control1">
                </p>
            </div>
            <div class="modal-footer">
               <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Cancel</button> <button class="btn btn-danger">Print</button>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         
        <!-- <small>Dosen</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jabatan Fungsional</li>
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Data Dupak <?php print $this->session->userdata('nama'); ?></h3> 
                    <!-- <div class="box-tools pull-right"><form action="<?php echo site_url('auth/inDosen') ?>" method="post">
                        <div class="box-footer clearfix no-border">
                            <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                        </div></form>
                    </div> -->
                    <div class="box-footer clearfix">
                        <!-- <form action="<?php echo site_url('auth/inDosen') ?>" method="post"> -->
                            <!-- <a href="#" class="btn btn-sm btn-info btn-flat pull-left"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Print Pengajaran Saya&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a> -->
                        <!-- </form> -->
                            
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="<?php echo site_url('auth/dupak'); ?>" method="post">
                        <table border="0" width="100%" >
                            <tr>
                                <th width="30%" height="20px"><input type="search" name="cari" placeholder="Search Keyword..." class="form-control1" width="200%"></th>
                                <th width="1%"></th>
                                <th width="32%"><button class="btn btn-default pull-left" name="q"><i class="fa fa-search"></i> Search</button></th>
                                <th>
                                    <a href="<?php echo site_url('auth/dupakAdmin') ?>" class="btn btn-sm btn-default btn-flat pull-right"><b><i class="fa fa-file"></i> Lihat Semua Data Dupak</b></a>
                                </th>
                            </tr>
                        </table>
                    <table class="table table-bordered table-hover table-striped">
                        <thead align="center">
                            <tr>
                                <td colspan="3" align="center" width="100px"><b></b></td>
                                <td align="center" width="200px"><b>Nama</b></td>
                                <td align="center" width="200px"><b>Pend Yang Diperhitungkan</b></td>
                                <td align="center" width="200px"><b>Jabatan Akademik</b></td>
                                <td align="center" width="150px"><b>Pangkat</b></td>
                                <td align="center" width="80px"><b>Masa Gol Lama</b></td>
                                <td align="center" width="80px"><b>Masa Gol Baru</b></td>
                                <td align="center"><b>Kode Bidang</b></td>
                                <td align="center" width="150px"><b>Nama Bidang</b></td>
                                <td align="center" width="80px"><b>Kredit Sekarang</b></td>
                                <td align="center" width="80px"><b>Yang Diusulkan</b></td>
                                <!-- <td align="center" width="50px"><b>Hapus</b></td> -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($model['rows'] as $row) {
                        ?>
                            <tr>
                                <td align="center">
                                    <div class="tools">
                                        <a title="Edit" class="fa fa-edit" href="<?php echo site_url('auth/editDupak/'); echo $row->id; ?>"></a>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="tools">
                                        <!-- <a title="Hapus" class="fa fa-trash-o" href="deleteDupak/<?php echo $row->id; ?>"></a> -->
                                        <a href="#myModal" class="trash" data-id="<?php echo $row->id; ?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                                <td align="center">
                                    <!-- <div class="tools"> -->
                                        <!-- <a title="Cetak" class="fa fa-file-pdf-o" data-id="<?php echo $row->idDosen; ?>" href="#myModal1" role="button" data-toggle="modal"></a> -->
                                        <!-- <a href="#myModal1" class="print" data-id="<?php echo $row->id; ?>" role="button" data-toggle="modal"><i class="fa fa-file-pdf-o"></i></a> -->
                                    <!-- </div> -->
                                    <div class="btn-group">
                                        <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-pdf-o"></i></button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#myModal1" class="print" data-id="<?php echo $row->id; ?>" role="button" data-toggle="modal">Dupak</a></li>
                                            <li><a href="<?php echo site_url('auth/cetakDupak1/'); echo $row->id; ?>" target="_blank">PTS</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td><?php echo $row->nama; ?></td>
                                <td><?php echo $row->pendDiperhitungkan; ?></td>
                                <td><?php echo $row->jabAkademik;?> &nbsp;/&nbsp; <?php echo $row->TMTAkademik; ?></td>
                                <td><?php echo $row->pangkat; ?> &nbsp;/&nbsp; <?php echo $row->TMTPangkat; ?></td>
                                <td><?php echo $row->masaGolLama; ?></td>
                                <td><?php echo $row->masaGolBaru; ?> &nbsp;/&nbsp; <?php echo $row->TMTGolBaru; ?></td>
                                <td><?php echo $row->kodeBidang; ?></td>
                                <td><?php echo $row->namaBidang; ?></td>
                                <td><?php echo $row->kreditSekarang; ?></td>
                                <td><?php echo $row->kreditDiusulkan; ?></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    // Tampilkan link-link paginationnya
                    echo $model['pagination'];
                    ?>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
    </div><!-- /.row (main row) -->

</section><!-- /.content -->


<?php
$this->load->view('admin/template/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
$('.trash').click(function(){
    var id=$(this).data('id');
    $('#modalDelete').attr('href','<?php echo site_url('auth/deleteDupak/');?>'+id);
})
$('.print').click(function(){
    var id=$(this).data('id');
    $('#modalPrint').attr('action','<?php echo site_url('auth/cetakDupak/');?>'+id);
})
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.min.js') ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('admin/template/foot');
?>