<?php
	foreach($bio->result() as $row) {
		$nama_siswa = $row->nama;
		$gender = $row->gender;
		$jurusan = $row->nm_jurusan;
		$alamat = $row->alamat;
		$foto = $row->foto;
	}
	$perintah = mysql_query("SELECT sum(poin) AS jml_poin FROM view_poin WHERE nis='$nis'");
					$hasil	= mysql_fetch_object($perintah);
?>
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
        	<!-- S:BOX BIO SISWA -->
            <div class="large-6 columns">
            <table width="100%" border="0">
  <tr>
    <td width="100" height="100"><img src="<?php echo base_url(); ?>uploads/<?php echo $foto; ?>" width="100" /></td>
    <td width="334" align="center" valign="middle"><table width="100%" cellpadding="1" cellspacing="1">
      <tr>
        <th width="127" align="left">NIS</th>
        <th width="9" align="left">:</th>
        <td><?php echo $nis; ?></td>
      </tr>
      <tr>
        <th align="left">Nama</th>
        <th align="left">:</th>
        <td width="189"><?php echo $nama_siswa; ?></td>
      </tr>
      <tr>
        <th  align="left">Jurusan</th>
        <th  align="left">:</th>
        <td><?php echo $jurusan; ?></td>
      </tr>
      <tr>
        <th  align="left">Jumlah Poin</th>
        <th  align="left">:</th>
        <td><?php echo $hasil->jml_poin; ?></td>
      </tr>
    </table></td>
  </tr>
</table>

          </div>
            <!-- E:BIO SISWA -->
            <!-- S:BOX FORM -->
            <div class="large-6 columns">
            <?php
            //INPUT ID NOTA
            foreach($kodepoin->result() as $row)
            {
                $id=$row->last;
            }
            // baca nomor urut transaksi dari id transaksi terakhir
            $lastKodePoin = substr($id,3,5);
            // nomor urut ditambah 1
            $nextKodePoin = $lastKodePoin + 1; 
            // membuat format nomor transaksi berikutnya
            $nextKodePoin = 'PO-'.sprintf('%05s', $nextKodePoin);
    ?>
                <form action="<?php echo base_url(); ?>index.php/c_poin/input" method="post">
                        <input name="kode_poin" type="hidden" value="<?php echo $nextKodePoin; ?>" size="10" class="baca-ajah" readonly>
                        <input name="nis" type="hidden" value="<?php echo $nis; ?>" size="10" class="baca-ajah" readonly>
                  <div class="large-12 columns">
                        <select name="pelanggaran">
                          <option>-- Pilih Pelanggaran --</option>
                          <?php foreach($daftar_pelanggaran->result() as $row) { ?>
                          <option value="<?php echo $row->kd_pelanggaran; ?>"><?php echo $row->nama_pelanggaran; ?> (<?php echo $row->poin; ?> poin)</option>
                          <?php } ?>
                        </select>
                    </div>
                    
                    <div class="large-12 columns">
                    <br/><br/>
                     <center> <input name="Submit" type="submit" value="Simpan" class="button"></center>
                    </div>
                </form>
            </div>
      </div>
            <!-- E:BOX FORM -->
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