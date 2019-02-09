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
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_kriteria/tambah_kriteria_form/')?>" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Kriteria :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="nama_kriteria" placeholder="Nama Kriteria" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Bobot Kriteria :</label>
                                            <div class="col-lg-9">
                                                <input type="number" name="bobot" placeholder="Bobot Kriteria" class="form-control" min="0" max="100" required>
                                            </div>
                                        </div>
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