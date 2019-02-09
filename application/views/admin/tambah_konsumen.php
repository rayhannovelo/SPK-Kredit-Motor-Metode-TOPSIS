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
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_konsumen/tambah_konsumen_form/')?>" method="post">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <h2 class="text-center"><strong>Data Konsumen</strong></h2>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Pembelian :</label>
                                            <div class="col-lg-9">
                                                <select name="id_motor" class="form-control">
                                                    <option value="<?php echo $motor[0]['id_motor']; ?>">-- Pilih Kendaraan --</option>
                                                    <?php foreach ($motor as $value) { ?>
                                                    <option value="<?php echo $value['id_motor'] ?>"><?php echo $value['merk'].' - '.$value['tipe']. ' - '.$value['warna']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Konsumen :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="nama_konsumen" placeholder="Nama Konsumen" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Alamat :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="alamat" placeholder="Alamat" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Jenis Kelamin :</label>
                                            <div class="col-lg-9">
                                                <label class="checkbox-inline"> 
                                                    <input name="jenis_kelamin" value="Laki-laki" type="radio"> Laki-laki 
                                                </label> 
                                                <label class="checkbox-inline"> 
                                                    <input name="jenis_kelamin" value="Perempuan"  type="radio"> Perempuan 
                                                </label> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Tanggal Lahir :</label>
                                            <div class="col-lg-9">
                                                <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Agama :</label>
                                            <div class="col-lg-9">
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Islam" type="radio"> Islam 
                                                </label> 
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Kristen Protestan" type="radio"> Kristen Protestan 
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Katolik" type="radio"> Katolik 
                                                </label> 
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Hindu" type="radio"> Hindu
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Buddha" type="radio"> Buddha 
                                                </label> 
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Kong Hu Cu" type="radio"> Kong Hu Cu 
                                                </label>  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Pekerjaan :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="pekerjaan" placeholder="Pekerjaan" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <h2 class="text-center"><strong>Data Penilaian</strong></h2>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">KEPRIBADIAN :</label>
                                            <div class="col-lg-9">
                                                <input name="nilai_kriteria[0]" value="0" type="hidden">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Sifat Ketika Diinterview :</label>
                                            <div class="col-lg-9">
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[0]"  value="10" type="radio"> Baik
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[0]"  value="5" type="radio"> Tidak Baik
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Penyampaian Konsumen :</label>
                                            <div class="col-lg-9">
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[1]"  value="10" type="radio"> Baik
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[1]"  value="5" type="radio"> Tidak Baik
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Hasil Verifikasi Lingkungan :</label>
                                            <div class="col-lg-9">
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[2]"  value="10" type="radio"> Baik
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[2]"  value="5" type="radio"> Tidak Baik
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">KEMAMPUAN :</label>
                                            <div class="col-lg-9">
                                                <input name="nilai_kriteria[1]" value="0" type="hidden">
                                                <input name="nilai_kriteria[2]" value="0" type="hidden">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Pendapatan Konsumen :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="pendapatan_konsumen" placeholder="Pendapatan Konsumen" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Pendapatan Pasangan :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="pendapatan_pasangan" placeholder="Pendapatan Konsumen" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Pengeluaran / Tanggungan :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="pengeluaran_tanggungan" placeholder="Pendapatan Konsumen" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Angsuran Perbulan :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="angsurang_perbulan" placeholder="Pendapatan Konsumen" class="form-control" required>
                                            </div>
                                        </div>
                                        <?php foreach ($kriteria as $key1 => $value1) { ?>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label"><?php echo $value1['nama_kriteria'] ?>:</label>
                                            <div class="col-lg-9">
                                                <?php 
                                                    foreach ($sub_kriteria as $key2 => $value2) {
                                                    if($value1['id_kriteria'] == $value2['id_kriteria']) { 
                                                ?>
                                                <label class="checkbox-inline"> 
                                                    <input name="nilai_kriteria[<?php echo $value1['id_kriteria'] - 1; ?>]"  value="<?php echo $value2['index_nilai']; ?>" type="radio"> <?php echo $value2['nama_subkriteria']; ?>
                                                </label>
                                                <?php } }  ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <hr>
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