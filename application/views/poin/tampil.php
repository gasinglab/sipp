<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="<?php echo $this->config->item('author'); ?>">
<title><?php echo $this->config->item('nama_app'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vendor/jquery.js"></script>
</head>
<body>
	<!-- S:BOX UTAMA -->
    <div class="row">
    	<!-- S:HEADER -->
    	<div class="large-12 columns">
        	<?php $this->load->view('header'); ?>
        </div>
        <!-- E:HEADER -->
        <!-- S:NAVIGASI -->
        <div class="large-12 columns">
        	<?php $this->load->view('menu'); ?>
        </div>
        <!-- E:NAVIGASI -->
        <!-- S:BOX TENGAH -->
        
        <div class="large-12 columns">
        <form action="<?php echo base_url(); ?>index.php/c_siswa/cari" method="post" class="cari">
            	<input name="q" type="text" placeholder="Masukkan NIS atau Nama Siswa" autocomplete="off" >
            </form>
              <table width="100%" border="1">
                <tr>
                  <th>Tanggal</th>
                  <th>Pelanggaran</th>
                  <th>Poin</th>
                  <th colspan="2">Aksi</th>
                </tr>
                <?php foreach($text->result() as $row) { ?>
                <?php
					$nis = $row->nis;
					$perintah = mysql_query("SELECT sum(poin) AS jml_poin FROM view_poin WHERE nis='$nis'");
					$hasil	= mysql_fetch_object($perintah);
				?>
                <tr>
                	<?php
						$tgl = date_create($row->tgl_pelanggaran);
						$tglnya = date_format($tgl,"d/m/Y");
					?>
                  <td><?php echo $tglnya; ?></td>
                  <td><?php echo $row->nama_pelanggaran; ?></td>
                  <td><?php echo $row->poin; ?></td>
                  <td align="center"><a href="<?php echo base_url(); ?>index.php/c_poin/hapus/<?php echo $row->nis; ?>/<?php echo $row->kd_poin; ?>">Hapus</a></td>
                </tr>
                <?php } ?>
              </table>
        </div>
        <!-- E:BOX TENGAH -->
        <!-- S:FOOTER -->
        <div class="large-12 columns">
        	<?php $this->load->view('footer'); ?>
        </div>
        <!-- E:FOOTER -->
    </div>
    <!-- E:BOX UTAMA -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.alert.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation/foundation.orbit.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation/foundation.tab.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation/foundation.dropdown.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation/foundation.clearing.js"></script>
<script type="text/javascript">
	$(document).foundation();
</script>
</body>
</html>