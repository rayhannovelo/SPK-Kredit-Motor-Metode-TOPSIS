            <?php 
                function rangking($v, $hasil, $jumlah_peserta) {
                    rsort($v);

                    for ($i = 0; $i < count($v); $i++) {
                        if($v[$i] == $hasil) {
                            return $i + 1;
                        }
                    }
                }
            ?>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar Rangking</h5>
                            </div>
                            <div class="ibox-content" style="background-color: white">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if($jumlah_konsumen > 1) { ?>
                                        <center>
                                            <button onclick="myFunction()" class="btn btn-md btn-primary">Detail Perhitungan</button>
                                        </center>
                                        <div id="hide" style="display: none;">
                                            <h2 align="center">Tabel Nilai Alternatif di Setiap Kriteria</h2>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <td colspan="2">Kepentingan / Bobot</td>
                                                        <?php 
                                                            foreach($daftar_kriteria as $key => $k) { 
                                                                echo '<td>'.$k['bobot'].'</td>';
                                                            } 
                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <td>Kode Alternatif</td>
                                                        <td>Alternatif</td>
                                                        <?php 
                                                            foreach($daftar_kriteria as $key => $k) {
                                                                echo '<td>'.$k['nama_kriteria'].'</td>';
                                                            } 
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($daftar_konsumen as $key1 => $p) { 
                                                    ?>
                                                    <tr>
                                                        <td><?php echo 'AP'.($key1 + 1) ?></td>
                                                        <td><?php echo $p['nama_konsumen']; ?></td>
                                                        <?php foreach($daftar_kriteria as $key2 => $nk) { echo '<td>'.$nilai[$key1][$key2].'</td>'; } ?>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                                </table>
                                            </div>

                                            <?php 
                                                $temp = 0;

                                                for($i = 0; $i < $jumlah_kriteria; $i++) {  // 7
                                                    for ($j = 0; $j < $jumlah_konsumen; $j++) {  // 3
                                                        $temp = $temp + pow($nilai[$j][$i], 2);
                                                    }
                                                    $pembagi[] = sqrt($temp);
                                                    $temp = 0;
                                                }
                                            ?>

                                            <h2 align="center">Tabel Matriks Ternomalisasi</h2>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <td>Pembagi</td>
                                                        <?php 
                                                            if($daftar_kriteria != NULL) foreach($daftar_kriteria as $key => $k) {
                                                                echo '<td>'.$pembagi[$key].'</td>';
                                                            } 
                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <td>Alternatif</td>
                                                        <?php 
                                                            if($daftar_kriteria != NULL) foreach($daftar_kriteria as $key => $k) {
                                                                echo '<td>C'.($key + 1).'</td>';
                                                            } 
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($daftar_konsumen as $key => $p) { 
                                                        foreach($nilai_kriteria as $key1 => $nk) { 
                                                        if($p['id_konsumen'] == $nk['id_konsumen']) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo 'AP'.($key + 1) ?></td>
                                                        <?php 
                                                            for($i = 0; $i < $jumlah_kriteria; $i++) { 
                                                                $ternomalisasi[$key][] = $nilai[$key][$i] / $pembagi[$i];

                                                                echo '<td>'.number_format($ternomalisasi[$key][$i], 3, '.', ',').'</td>';
                                                            } 
                                                        ?>
                                                    </tr>
                                                    <?php }}} ?>
                                                </tbody>
                                                </table>
                                            </div>

                                            <h2 align="center">Tabel Matriks Ternomalisasi Terbobot</h2>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <td>Alternatif</td>
                                                        <?php 
                                                            foreach($daftar_kriteria as $key => $k) {
                                                                echo '<td>C'.($key + 1).'</td>';
                                                            } 
                                                        ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($daftar_konsumen as $key => $p) { 
                                                        foreach($nilai_kriteria as $key1 => $nk) { 
                                                        if($p['id_konsumen'] == $nk['id_konsumen'] ) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo 'AP'.($key + 1) ?></td>
                                                        <?php 
                                                            for($i = 0; $i < $jumlah_kriteria; $i++) { 
                                                                $ternomalisasi_terbobot[$key][] = $ternomalisasi[$key][$i] * $daftar_kriteria[$i]['bobot'];

                                                                echo '<td>'.number_format($ternomalisasi_terbobot[$key][$i], 3, '.', ',').'</td>';
                                                            } 
                                                        ?>
                                                    </tr>
                                                    <?php }}} ?>
                                                </tbody>
                                                </table>
                                            </div>

                                            <?php 
                                                $temp_positif = 0;
                                                $temp_negatif = 99999;

                                                for($i = 0; $i < $jumlah_kriteria; $i++) { 
                                                    for ($j = 0; $j < $jumlah_konsumen; $j++) {
                                                        if($temp_positif < $ternomalisasi_terbobot[$j][$i]){
                                                            $temp_positif = $ternomalisasi_terbobot[$j][$i];
                                                        }
                                                        if($temp_negatif > $ternomalisasi_terbobot[$j][$i]){
                                                            $temp_negatif = $ternomalisasi_terbobot[$j][$i];
                                                        }
                                                    }
                                                    $a_positif[] = $temp_positif;
                                                    $a_negatif[] = $temp_negatif;
                                                    $temp_positif = 0;
                                                    $temp_negatif = 99999;
                                                }
                                            ?>

                                            <h2 align="center">Tabel Solusi Ideal Positif (Y<sup>+</sup>) dan Solusi Ideal Negatif(Y<sup>-</sup>)</h2>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                                <tbody>
                                                    <?php for ($i = 1; $i <= 2; $i++) { ?>
                                                    <tr>
                                                        <td><?php echo $i == 1 ? 'Solusi Ideal Positif (Y<sup>+</sup>)' : 'Solusi Ideal Negatif(Y<sup>-</sup>)' ?></td>
                                                        <?php 
                                                            for ($j = 0; $j < $jumlah_kriteria; $j++) { 
                                                                echo $i == 1 ? '<td>'.number_format($a_positif[$j], 3, '.', ',').'</td>' : '<td>'.number_format($a_negatif[$j], 3, '.', ',').'</td>'; 
                                                            }
                                                        ?>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                                </table>
                                            </div>

                                            <?php 
                                                $temp_positif = 0;
                                                $temp_negatif = 0;

                                                for($i = 0; $i < $jumlah_konsumen; $i++) { 
                                                    for ($j = 0; $j < $jumlah_kriteria; $j++) { 
                                                        $temp_positif = $temp_positif + (pow(($a_positif[$j] - $ternomalisasi_terbobot[$i][$j]), 2));
                                                        $temp_negatif = $temp_negatif + (pow(($a_negatif[$j] - $ternomalisasi_terbobot[$i][$j]), 2));
                                                    }
                                                    $d_positif[] = sqrt($temp_positif);
                                                    $d_negatif[] = sqrt($temp_negatif);
                                                    $temp_positif = 0;
                                                    $temp_negatif = 0;
                                                }

                                                for($i = 0; $i < $jumlah_konsumen; $i++) { 
                                                    $v[] = $d_negatif[$i] / ($d_negatif[$i] + $d_positif[$i]);
                                                }
                                            ?>
                                        </div>
                                        <br>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover topsis">
                                            <thead>
                                                <tr>
                                                    <td>Nama Konsumen</td>
                                                    <td>V</td>
                                                    <td>Rangking</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach($daftar_konsumen as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $value['nama_konsumen']; ?></td>
                                                    <td><?php echo number_format($v[$key], 3, '.', ','); ?></td>
                                                    <td>
                                                        <?php 
                                                            $rangking = rangking($v, $v[$key], $jumlah_konsumen);

                                                            if($rangking <= 5) {
                                                                echo '<strong>'.$rangking.'</strong>';
                                                            }else {
                                                                echo $rangking;
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                        <?php }else { echo '<div class="alert alert-warning text-center">Pastikan Jumlah Konsumen Aktif Lebih Dari Satu!</div>';} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                 function myFunction() {
                    var x = document.getElementById("hide");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                } 
            </script>
