            <?php 
                function recursive_array_search($needle,$haystack) {
                    foreach($haystack as $key=>$value) {
                        $current_key=$key;
                        if($needle===$value OR (is_array($value) && recursive_array_search($needle,$value) !== false)) {
                            return $current_key;
                        }
                    }
                    return false;
                }
                // recursive_array_search('5', array_column($sub_kriteria, 'index_nilai'));
            ?>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Form Edit Kriteria</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if($kriteria != NULL) foreach ($kriteria as $k) { ?>
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_kriteria/edit_kriteria_form/'.$k['id_kriteria'])?>" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Kriteria :</label>
                                            <div class="col-lg-9">
                                                <input type="hidden" name="id_kriteria" value="<?php echo $k['id_kriteria']; ?>">
                                                <input type="text" name="nama_kriteria" placeholder="Nama Kriteria" class="form-control" value="<?php echo $k['nama_kriteria']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Bobot Kriteria :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="bobot" placeholder="Bobot Kriteria" min="0" max="100" class="form-control" value="<?php echo $k['bobot']; ?>" required>
                                            </div>
                                        </div>
                                        <?php 
                                            if($k['id_kriteria'] > 3) { 
                                                if($sub_kriteria != NULL) {
                                        ?>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Daftar Sub Kriteria :</label>
                                            <div class="col-lg-9">
                                                <table id="myTable" class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Nama Sub Kriteria</th>
                                                        <th style="text-align: center;">Indeks Penilaian</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?php $key = recursive_array_search('1', array_column($sub_kriteria, 'index_nilai')); ?>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control" value="<?php if($sub_kriteria[$key]['index_nilai'] == 1) { echo $sub_kriteria[$key]['nama_subkriteria']; } ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="1">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php $key = recursive_array_search('2', array_column($sub_kriteria, 'index_nilai')); ?>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control" value="<?php if($sub_kriteria[$key]['index_nilai'] == 2) { echo $sub_kriteria[$key]['nama_subkriteria']; } ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="2">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php $key = recursive_array_search('3', array_column($sub_kriteria, 'index_nilai')); ?>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control" value="<?php if($sub_kriteria[$key]['index_nilai'] == 3) { echo $sub_kriteria[$key]['nama_subkriteria']; } ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="3">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php $key = recursive_array_search('4', array_column($sub_kriteria, 'index_nilai')); ?>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control" value="<?php if($sub_kriteria[$key]['index_nilai'] == 4) { echo $sub_kriteria[$key]['nama_subkriteria']; } ?>">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="4">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <?php $key = recursive_array_search('5', array_column($sub_kriteria, 'index_nilai')); ?>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control" value="<?php if($sub_kriteria[$key]['index_nilai'] == 5) { echo $sub_kriteria[$key]['nama_subkriteria']; } ?>">                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="5">
                                                        </td>
                                                    </tr>
                                                    <span id="id_subkriteria"></span>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php }else { ?>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Daftar Sub Kriteria :</label>
                                            <div class="col-lg-9">
                                                <table id="myTable" class="table table-striped table-bordered table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Nama Sub Kriteria</th>
                                                        <th style="text-align: center;">Indeks Penilaian</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="1">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="2">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="3">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="4">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="sub_kriteria[]" placeholder="Sub Kriteria" class="form-control" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="index_nilai[]" placeholder="Index Nilai" class="form-control" value="5">
                                                        </td>
                                                    </tr>
                                                    <span id="id_subkriteria"></span>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php }} ?>
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