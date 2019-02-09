            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5><?php echo $title; ?></h5>
                            </div>
                            <div class="ibox-content">
                                <!-- <pre><?php print_r($nilai); ?></pre> -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php 
                                            if($daftar_konsumen != NULL) foreach ($daftar_konsumen as $key10 => $k) { 
                                        ?>
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_konsumen/edit_konsumen_form/'.$id_konsumen)?>" method="post">
                                        <?php 
                                            foreach ($kriteria as $value123) {
                                                foreach ($nilai as $value456) {
                                                    if($value123['id_kriteria'] == $value456['id_kriteria']) {
                                                        echo '<input type="hidden" name="id_evaluasi1[]" value="'.$value456['id_evaluasi'].'"> ';
                                                        echo '<input type="hidden" name="id_kriteria1[]" value="'.$value456['id_kriteria'].'"> ';
                                                    }
                                                }
                                            }
                                        ?>
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
                                                    <option>-- Pilih Kendaraan --</option>
                                                    <?php foreach ($motor as $value) { ?>
                                                    <option value="<?php echo $value['id_motor'] ?>" <?php echo $k['id_motor'] == $value['id_motor'] ? 'selected' : ''; ?>><?php echo $value['merk'].' - '.$value['tipe']. ' - '.$value['warna']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Konsumen :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="nama_konsumen" placeholder="Nama Konsumen" class="form-control" value="<?php echo $k['nama_konsumen'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Alamat :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="alamat" placeholder="Alamat" class="form-control" value="<?php echo $k['alamat'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Jenis Kelamin :</label>
                                            <div class="col-lg-9">
                                                <label class="checkbox-inline"> 
                                                    <input name="jenis_kelamin" value="Laki-laki" type="radio" <?php echo $k['jenis_kelamin'] == 'Laki-laki' ? 'checked' : ''; ?>> Laki-laki 
                                                </label> 
                                                <label class="checkbox-inline"> 
                                                    <input name="jenis_kelamin" value="Perempuan"  type="radio" <?php echo $k['jenis_kelamin'] == 'Perempuan' ? 'checked' : ''; ?>> Perempuan 
                                                </label> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Tanggal Lahir :</label>
                                            <div class="col-lg-9">
                                                <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" value="<?php echo $k['tanggal_lahir'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Agama :</label>
                                            <div class="col-lg-9">
                                                <label class="checkbox-inline"> 
                                                    <input name="agama" value="Islam" type="radio" <?php echo $k['agama'] == 'Islam' ? 'checked' : ''; ?>> Islam 
                                                </label> 
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Kristen Protestan" type="radio" <?php echo $k['agama'] == 'Kristen Protestan' ? 'checked' : ''; ?>> Kristen Protestan 
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Katolik" type="radio" <?php echo $k['agama'] == 'Katolik' ? 'checked' : ''; ?>> Katolik 
                                                </label> 
                                                <label class="checkbox-inline"> 
                                                    <input name="agama" value="Hindu" type="radio" <?php echo $k['agama'] == 'Hindu' ? 'checked' : ''; ?>> Hindu
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Buddha" type="radio" <?php echo $k['agama'] == 'Buddha' ? 'checked' : ''; ?>> Buddha 
                                                </label> 
                                                <label class="checkbox-inline"> 
                                                    <input name="agama"  value="Kong Hu Cu" type="radio" <?php echo $k['agama'] == 'Kong Hu Cu' ? 'checked' : ''; ?>> Kong Hu Cu 
                                                </label>  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Pekerjaan :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="pekerjaan" placeholder="Pekerjaan" class="form-control" value="<?php echo $k['pekerjaan'] ?>" required>
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
                                                    <input type="hidden" name="id_subnilai" value="<?php echo $subnilai[0]['id_subnilai'] ?>"> 
                                                    <input type="hidden" name="id_evaluasi" value="<?php echo $subnilai[0]['id_evaluasi'] ?>"> 
                                                    <input name="subnilai_kriteria[0]" value="10" type="radio" <?php echo $subnilai[0]['subnilai'] == '10' ? 'checked' : ''; ?>> Baik
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[0]"  value="5" type="radio" <?php echo $subnilai[0]['subnilai'] == '5' ? 'checked' : ''; ?>> Tidak Baik
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Penyampaian Konsumen :</label>
                                            <div class="col-lg-9">
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[1]"  value="10" type="radio" <?php echo $subnilai[1]['subnilai'] == '10' ? 'checked' : ''; ?>> Baik
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[1]"  value="5" type="radio" <?php echo $subnilai[1]['subnilai'] == '5' ? 'checked' : ''; ?>> Tidak Baik
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Hasil Verifikasi Lingkungan :</label>
                                            <div class="col-lg-9">
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[2]"  value="10" type="radio" <?php echo $subnilai[2]['subnilai'] == '10' ? 'checked' : ''; ?>> Baik
                                                </label>
                                                <label class="checkbox-inline"> 
                                                    <input name="subnilai_kriteria[2]"  value="5" type="radio" <?php echo $subnilai[2]['subnilai'] == '5' ? 'checked' : ''; ?>> Tidak Baik
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
                                                <input type="number" name="pendapatan_konsumen" placeholder="Pendapatan Konsumen" class="form-control" value="<?php echo $k['pendapatan_konsumen'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Pendapatan Pasangan :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="pendapatan_pasangan" placeholder="Pendapatan Konsumen" class="form-control" value="<?php echo $k['pendapatan_pasangan'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Pengeluaran / Tanggungan :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="pengeluaran_tanggungan" placeholder="Pendapatan Konsumen" class="form-control" value="<?php echo $k['pengeluaran_tanggungan'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">*Angsuran Perbulan :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="angsurang_perbulan" placeholder="Pendapatan Konsumen" class="form-control" value="<?php echo $k['angsurang_perbulan'] ?>" required>
                                            </div>
                                        </div>
                                        <?php foreach ($kriteria as $key1 => $value1) { ?>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label"><?php echo $value1['nama_kriteria'] ?>:</label>
                                            <div class="col-lg-9">
                                                <?php 
                                                    foreach ($sub_kriteria as $key2 => $value2) {
                                                        foreach ($nilai as $key3 => $value3) {
                                                    if($value1['id_kriteria'] == $value2['id_kriteria'] && $value3['id_kriteria'] == $value2['id_kriteria']) { 
                                                ?>
                                                <label class="checkbox-inline"> 
                                                    <input name="nilai_kriteria[<?php echo $value1['id_kriteria'] - 1; ?>]"  value="<?php echo $value2['index_nilai']; ?>" type="radio" <?php echo $value3['nilai'] == $value2['index_nilai'] ? 'checked' : ''; ?>> <?php echo $value2['nama_subkriteria']; ?>
                                                </label>
                                                <?php } }}  ?>
                                            </div>
                                        </div>
                                        <?php } ?>
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