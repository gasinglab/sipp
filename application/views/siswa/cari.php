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
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th colspan="2">Poin</th>
                </tr>
                <?php foreach($q->result() as $row) { ?>
                <?php
					$nis = $row->nis;
					$perintah = mysql_query("SELECT sum(poin) AS jml_poin FROM view_poin WHERE nis='$nis'");
					$hasil	= mysql_fetch_object($perintah);
				?>
                <tr>
                  <td><?php echo $row->nis; ?></td>
                  <td><a href="<?php echo base_url(); ?>index.php/c_siswa/detail/<?php echo $row->nis; ?>"><?php echo $row->nama; ?></a></td>
                  <td><?php echo $row->nm_jurusan; ?></td>
                  <td align="center"><?php echo $hasil->jml_poin; ?></td>
                  <td align="center"><a href="<?php echo base_url(); ?>index.php/c_poin/tambah/<?php echo $row->nis; ?>"><img src="<?php echo base_url(); ?>assets/img/tambah.png"></a>&nbsp;<a href="<?php echo base_url(); ?>index.php/c_poin/tampil/<?php echo $row->nis; ?>"><img src="<?php echo base_url(); ?>assets/img/list.png"></a></td>
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