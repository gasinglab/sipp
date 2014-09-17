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
        	<?php $this->load->view('menu_admin'); ?>
        </div>
        <!-- E:NAVIGASI -->
        <!-- S:BOX TENGAH -->
        
        <div class="large-12 columns">
        <center><h1>Tambah Siswa</h1></center>
        	<form action="<?php echo base_url(); ?>index.php/c_adm_siswa/do_upload" method="post" enctype="multipart/form-data">
        	  <table width="54%" border="0" align="center">
        	    <tr>
        	      <td width="284"><label for="nis"></label>
       	          <input name="nis" type="text" id="nis" placeholder="NIS"></td>
      	      </tr>
        	    <tr>
        	      <td><label for="nama"></label>
                  <input type="text" name="nama" id="nama" placeholder="Nama"></td>
      	      </tr>
        	    <tr>
        	      <td><label for="nm_jurusan"></label>
        	        <select name="kd_jurusan" id="nm_jurusan">
                    <option>-- Jurusan --</option>
                    <?php foreach($daftar_jurusan->result() as $row) { ?>
                    <option value="<?php echo $row->kd_jurusan; ?>"><?php echo $row->nm_jurusan; ?></option>
                    <?php } ?>
   	              </select>
                  </td>
      	      </tr>
        	    <tr>
        	      <td><label for="gender"></label>
        	        <select name="gender" id="gender">
                    <option>-- Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
        	          <option value="Perempuan">Perempuan</option>
                  </select></td>
      	      </tr>
        	    <tr>
        	      <td><label for="alamat"></label>
       	          <textarea name="alamat" id="alamat" cols="45" rows="5" placeholder="Alamat" class="textfix"></textarea></td>
      	      </tr>
        	    <tr>
        	      <td><label for="no_telp_wali"></label>
                  <input type="text" name="no_telp_wali" id="no_telp_wali" placeholder="Nomor Telepon Wali"></td>
      	      </tr>
        	    <tr>
        	      <td><label for="foto">Foto</label>
       	          <input type="file" name="foto" id="foto" >        	        
       	          <label for="textfield4"></label></td>
      	      </tr>
        	    <tr>
        	      <td align="center"><input type="submit" name="button" id="button" value="simpan" class="button"></td>
       	        </tr>
      	    </table>
        	</form>
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