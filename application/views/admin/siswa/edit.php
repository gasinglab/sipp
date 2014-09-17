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
        <center>
          <h1>Edit Siswa</h1></center>
          <?php
foreach($edit->result()as $row){
?>
        	<form action="<?php echo base_url(); ?>index.php/c_adm_siswa/update_siswa/<?php echo $row->nis; ?>" method="post" enctype="multipart/form-data">
        	  <table width="54%" border="0" align="center">
        	    <tr>
        	      <td width="284"><label for="nis"></label>
       	          <input name="nis" type="text" id="nis" placeholder="NIS" value="<?php echo $row->nis; ?>"></td>
      	      </tr>
        	    <tr>
        	      <td><label for="nama"></label>
                  <input type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo $row->nama; ?>"></td>
      	      </tr>
        	    <tr>
                <?php
                	$jurusannya = $row->kd_jurusan;
				?>
        	      <td><label for="nm_jurusan"></label>
        	        <select name="kd_jurusan" id="nm_jurusan">
                    <option>-- Jurusan --</option>
                    <?php foreach($daftar_jurusan->result() as $row2) { ?>
                    <?php
						if($jurusannya==$row2->kd_jurusan) {
							$selected = "selected";
						} else {
							$selected = "";
						}
					?>
                    <option value="<?php echo $row2->kd_jurusan; ?>" <?php echo $selected; ?>><?php echo $row2->nm_jurusan; ?></option>
                    <?php } ?>
   	              </select>
                  </td>
      	      </tr>
        	    <tr>
        	      <td><label for="gender"></label>
                   <?php
                		$gendernya = $row->gender;
					?>
        	        <select name="gender" id="gender">
                    <option>-- Jenis Kelamin --</option>
                    <option value="Laki-laki" <?php if($gendernya=="Laki-laki") { echo "selected"; } ?>>Laki-laki</option>
        	          <option value="Perempuan" <?php if($gendernya=="Perempuan") { echo "selected"; } ?>>Perempuan</option>
                  </select></td>
      	      </tr>
        	    <tr>
        	      <td><label for="alamat"></label>
       	          <textarea name="alamat" id="alamat" cols="45" rows="5" placeholder="Alamat" class="textfix"><?php echo $row->alamat; ?></textarea></td>
      	      </tr>
        	    <tr>
        	      <td><label for="no_telp_wali"></label>
                  <input type="text" name="no_telp_wali" id="no_telp_wali" placeholder="Nomor Telepon Wali" value="<?php echo $row->no_telp_wali; ?>"></td>
      	      </tr>
        	    <tr>
        	      <td>
                  <img src="<?php echo base_url(); ?>uploads/<?php echo $row->foto; ?>" width="80" />
       	          <input type="file" name="foto" id="foto" >
                  </td>
                  <input name="fotonya" type="hidden" value="<?php echo $row->foto; ?>">
      	      </tr>
        	    <tr>
        	      <td align="center"><input type="submit" name="button" id="button" value="simpan" class="button"></td>
       	        </tr>
      	    </table>
        	</form>
            <?php } ?>
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