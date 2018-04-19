<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="text-dark header-title m-t-0">Data Administrator</h4>
            <p class="text-muted m-b-15 font-13" align="justify">Pada menu top up, data hanya bisa disimpan, tidak dapat dihapus dan diubah. Hal tersebut karena menu ini merupakan menu transaksi/riwayat yang tidak boleh sembarangan dihapus/diubah. Jika terjadi kesalahan dalam pengisian data, mohon segera menghubungi admin.</p>
            <div class="row">
                <div class="col-sm-6">
                    <h5><b>Masukan Nama Lengkap</b></h5>
                    <input type="text" name="namaadmin" class="form-control">
                </div>
                <div class="col-md-6">
                    <h5><b>Masukan Password</b></h5>
                    <input type="text" name="passwordadmin" class="form-control">
                </div>
                <div class="col-md-8">
                    <h5><b>Masukan Alamat</b></h5>
                    <input type="text" name="alamatadmin" class="form-control">
                </div>
                <div class="col-md-4">
                    <h5><b>Masukan Nomor Telepon</b></h5>
                    <input type="text" name="telponadmin" class="form-control">
                </div>
            </div>
            <br><button type="submit" value="Upload" name="submit" class="btn btn-default waves-effect waves-light">
               <span class="btn-label"><i class="fa fa-check"></i>
               </span>Simpan
           </button>
           <button type="button" class="btn btn-danger waves-effect waves-light">
               <span class="btn-label"><i class="fa fa-times"></i>
               </span>Batal
           </button>
        </div>
    </div>
    <div class="col-sm-12">
      <div class="card-box">
          <h4 class="text-dark header-title m-t-0">Daftar Administrator</h4>
          <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Password</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Tercatat</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $query = mysql_query("SELECT * FROM admin");
                        $no = 1;
                        while ($data = mysql_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td style="float:right">
                                  <a class="btn btn-white btn-custom waves-effect" href="edit.php?id=<?php echo $data['idadmin']; ?>"><?php echo $data['namaadmin']; ?></a>
                                  <a class="btn btn-white btn-danger waves-effect" href="delete.php?id=<?php echo $data['idadmin']; ?>"><i class="fa fa-trash-o"></i></a>
                                </td>
                                <td><?php echo $data['password']; ?></td>
                                <td><?php echo $data['alamatadmin']; ?></td>
                                <td><?php echo $data['telponadmin']; ?></td>
                                <td><?php echo $data['tercatatadmin']; ?></td>
                            </tr>
                        <?php 
                            $no++;
                        } 
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>