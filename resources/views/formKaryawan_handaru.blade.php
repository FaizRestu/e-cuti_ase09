<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Karyawan</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


    </head>
    <body ng-app="halo">
        <div ng-controller="TopbarController">
            <button class="btn btn-primary" ng-click="logout()">
                Logout
            </button>
        </div>

        
        <h1>Daftar Karyawan</h1>


            Nama : <input ng-model="nama">
            <br> Selamat pagi, {{nama}}


            <div ng-controller="EmailController">
                <br> Masukkan email Anda : <input type="text" ng-model="email">
                <button ng-click="tambahEmail()">Simpan</button>
                <br>

                <ul ng-repeat="e in daftarEmail">
                    <li>{{e}} | <button ng-click="hapusEmail(e)">hapus</button></li>
                </ul>
            </div>
            <hr>
            <div ng-controller="KaryawanController">
                <button class="btn btn-primary" ng-click="updateTabelKaryawan()">
                    Refresh Tabel
                </button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Tambah Data
                </button>


                <div ng-hide="daftarKaryawan.totalElements && daftarKaryawan.totalElements > 0">
                    Data tidak ada
                </div>

                <div ng-show="daftarKaryawan.totalElements && daftarKaryawan.totalElements > 0">
                    <table class="table table-condesed table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="k in daftarKaryawan.content">
                                <td>{{k.nip}}</td>
                                <td>{{k.nama}}</td>
                                <td>{{k.tanggalLahir}}</td>
                                <td>
                                    <button class="btn btn-sm" data-toggle="modal" data-target="#myModal" ng-click="editKaryawan(k)">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        edit
                                    </button>
                                    <button class="btn btn-sm" ng-click="hapusKaryawan(k)">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Karyawan</h4>
                            </div>
                            <div class="modal-body">

                                <form class="form-horizontal" name="form">
                                    <div class="form-group">
                                        <label for="inputNip" class="col-sm-2 control-label">NIP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputNip" name="inputNip"
                                                   placeholder="Nomor Induk Pegawai"
                                                   ng-model="karyawan.nip"
                                                   required="true">
                                            <span class="help-block" ng-show="form.inputNip.$error.required">
                                                NIP harus diisi
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group" ng-class="error('inputNama')">
                                        <label for="inputNama" class="col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputNama" name="inputNama"
                                                   placeholder="Nama Karyawan"
                                                   ng-model="karyawan.nama"
                                                   required="true">
                                            <span class="help-block" ng-show="form.inputNama.$error.required">
                                                Nama harus diisi
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTanggal" class="col-sm-2 control-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputTanggal" name="inputTanggal"
                                                   placeholder="yyyy-MM-dd"
                                                   ng-model="karyawan.tanggalLahir"
                                                   required="true">
                                            <span class="help-block" ng-show="form.inputTanggal.$error.required">
                                                Tanggal lahir harus diisi
                                            </span>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" 

                                        data-dismiss="modal" 
                                        ng-click="simpanKaryawan()" ng-disabled="form.$invalid">Save changes</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>


        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular-cookies.min.js"></script>
        <script src="js/halo.js"></script>
    </body>
</html>