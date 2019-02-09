            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('daftar_motor/tambah_motor')?>'"><i class="fa fa-plus"></i> Tambah Motor</button>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
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
                                            <td>Merk</td>
                                            <td>Tipe</td>
                                            <td>Warna</td>
                                            <td>Harga</td>
                                            <td>Harga DP</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($daftar_motor != NULL) foreach($daftar_motor as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $key+1; ?></td>
                                            <td><?php echo $value['merk']; ?></td>
                                            <td><?php echo $value['tipe']; ?></td>
                                            <td><?php echo $value['warna']; ?></td>
                                            <td><?php echo 'Rp. '.number_format($value['harga'], 2, ',', '.'); ?></td>
                                            <td><?php echo 'Rp. '.number_format($value['harga_dp'], 2, ',', '.'); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('daftar_motor/edit_motor/'.$value['id_motor'])?>'" type="button"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger dim" onclick="if (confirm('Data Motor akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_motor/hapus_motor/'.$value['id_motor'])?>'" type="button"><i class="fa fa-trash"></i></button>
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