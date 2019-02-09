            <div class="wrapper wrapper-content  animated fadeInRight">
                <?php // if($this->session->userdata('level') == 1) { ?>
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('daftar_konsumen/tambah_konsumen')?>'"><i class="fa fa-plus"></i> Tambah Konsumen</button>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <?php //  } ?>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5><?php echo $title ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover" align="center">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Konsumen</td>
                                            <td width="200px">Pembelian</td>
                                            <td>Alamat</td>
                                            <td>Jenis Kelamin</td>
                                            <td>Tanggal Lahir</td>
                                            <td>Agama</td>
                                            <td>Pekerjaan</td>
                                            <td>Tanggal Pembelian</td>
                                            <?php if($this->session->userdata('level') != 1) { ?>
                                            <td>Status SPK</td>
                                            <?php } ?>
                                            <td width="700px">Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($daftar_konsumen != NULL) foreach($daftar_konsumen as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['nama_konsumen']; ?></td>
                                            <td><?php echo $value['merk'].' - '.$value['tipe']. ' - '.$value['warna']; ?></td>
                                            <td><?php echo $value['alamat']; ?></td>
                                            <td><?php echo $value['jenis_kelamin']; ?></td>
                                            <td><?php echo $value['tanggal_lahir']; ?></td>
                                            <td><?php echo $value['agama']; ?></td>
                                            <td><?php echo $value['pekerjaan']; ?></td>
                                            <td><?php echo $value['tanggal_pembelian']; ?></td>
                                            <?php if($this->session->userdata('level') != 1) { ?>
                                            <td>
                                                <?php if($value['status'] == 1) { ?>
                                                    <span class="text-success">Aktif</span>
                                                    <?php }else { ?>
                                                    <span class="text-warning">Nonaktif </span> 
                                                <?php } ?>
                                            </td>
                                            <?php } ?>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('daftar_konsumen/edit_konsumen/'.$value['id_konsumen'])?>'" type="button"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data Konsumen akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_konsumen/hapus_konsumen/'.$value['id_konsumen'])?>'" type="button"><i class="fa fa-trash"></i></button>
                                                    <?php  
                                                        if($this->session->userdata('level') != 1) { 
                                                            if($value['status'] == 0) { 
                                                    ?>
                                                    <button class="btn btn-primary dim" onclick="if (confirm('Data Konsumen akan diaktifkan dalam perhitungan SPK, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_konsumen/ubah_status/'.$value['id_konsumen'].'/1')?>'" type="button"><i class="fa fa-wrench"></i> Aktifkan</button>
                                                    <?php }else { ?>
                                                    <button class="btn btn-warning dim" onclick="if (confirm('Data Konsumen akan dinonaktifkan dalam perhitungan SPK, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_konsumen/ubah_status/'.$value['id_konsumen'].'/0')?>'" type="button"><i class="fa fa-wrench"></i> Nonaktifkan</button>   
                                                    <?php }} ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>