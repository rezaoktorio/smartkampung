<div class="row">
    <div class="col-sm-5">
      <div class="card-box">
          <h4 class="text-dark">Pilih file excel yang akan upload.</h4>
          <p align="justify" style="padding:3% 3% 3% 3% " class="thumbnail">Sebelum melakukan update data , pastikan dahulu apakah data rekapitulasi tersebut sudah ter-upload atau belum, agar tidak terjadi error/duplikasi data.
          Hal tersebut juga akan berpengaruh pada menu visualisasi. Jika sudah terisi data, silahkan hapus terlebih dahulu dengan menekan tombol 
          <a class="btn btn-white btn-danger waves-effect" href="delete.php?id=<?php echo $data['idadmin']; ?>"><i class="fa fa-trash-o"></i> Hapus</a>
          <div class="row">
            <form method="post" enctype="multipart/form-data" action="import_jalan.php">
                <div class="col-sm-12">
                    <div class="col-sm-5">
                        <input name="fileexcel" type="file">
                    </div>
                    <div class="col-sm-5">
                        <button class="btn" style="background-color:#4ECDC4" name="upload" type="submit" value="Import"><span class="glyphicon glyphicon-upload" style="margin-right:5%"></span>Upload</button>
                    </div>
                    <div class="col-sm-12">
                        <br>* file yang akan di-upload harus berekstensi .xls (Excel 2003-2007).
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
    <div class="col-sm-7" style="overflow:scroll; height:374px;">
      <div class="card-box">
          <h4 class="text-dark">Panduan upload file Excel</h4>
          <div class="row">
            <div class="col-sm-12">
                <li>Pertama, pilih file excel yang akan di-upload.</li><br>
                <img class="img-responsive " style="width:90%" src="../../assets/images/upload/1.png"><br>

                <li>Kedua, pastikan file yang dimaksud sudah terdeteksi, kemudian tekan tombol upload.</li><br>
                <img class="img-responsive " style="width:90%" src="../../assets/images/upload/2.png"><br>

                <li>Terakhir, jika file sesuai dengan ketentuan format maka proses akan sukses. </li><br>
                <img class="img-responsive " style="width:90%" src="../../assets/images/upload/3.png"><br>

                <li>Untuk format file excel yang sesuai, dapat dilihat pada contoh <a href="rekapitulasi.xls" target="_">disini</a>.</li><br>
            </div>
        </div>
      </div>
    </div>
</div>