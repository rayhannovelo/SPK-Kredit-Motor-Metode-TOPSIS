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
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_motor/tambah_motor_form/')?>" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Merk :</label>
                                            <div class="col-lg-9">
                                                <select name="merk" class="form-control">
                                                    <option>-- Pilih Merk --</option>
                                                    <option value="Honda">Honda</option>
                                                    <option value="Yamaha">Yamaha</option>
                                                    <option value="Suzuki">Suzuki</option>
                                                    <option value="Kawasaki">Kawasaki</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Tipe :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="tipe" placeholder="Tipe Motor" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Warna :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="warna" placeholder="Warna Motor" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Harga :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="harga" placeholder="Ditulis tanpa titik" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Harga DP :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="harga_dp" placeholder="Ditulis tanpa titik" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-8 col-lg-4">
                                                <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                                <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>