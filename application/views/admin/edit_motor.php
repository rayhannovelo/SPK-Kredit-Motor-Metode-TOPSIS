            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if($motor != NULL) foreach ($motor as $value) { ?>
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_motor/edit_motor_form/'.$value['id_motor']); ?>" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Kecamatan :</label>
                                            <div class="col-lg-9">
                                                <select name="merk" class="form-control">
                                                    <option>-- Pilih Merk --</option>
                                                    <option value="Yamaha" <?php echo $value['merk'] == 'Yamaha' ? 'selected' : ''; ?>>Yamaha</option>
                                                    <option value="Honda" <?php echo $value['merk'] == 'Honda' ? 'selected' : ''; ?>>Honda</option>
                                                    <option value="Yamaha" <?php echo $value['merk'] == 'Suzuki' ? 'selected' : ''; ?>>Suzuki</option>
                                                    <option value="Kawasaki" <?php echo $value['merk'] == 'Kawasaki' ? 'selected' : ''; ?>>Kawasaki</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Tipe :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="tipe" placeholder="Tipe Motor" class="form-control" value="<?php echo $value['tipe']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Warna :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="warna" placeholder="Warna Motor" class="form-control" value="<?php echo $value['warna']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Harga :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="harga" placeholder="Ditulis tanpa titik" class="form-control" value="<?php echo $value['harga']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Harga DP :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="harga_dp" placeholder="Ditulis tanpa titik" class="form-control" value="<?php echo $value['harga_dp']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-8 col-lg-4">
                                                <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                                <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>