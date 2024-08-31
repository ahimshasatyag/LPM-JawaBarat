<!-- Tambahkan Bootstrap CSS dan JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<div class="content-wrapper">
  <section class="content">
    <div class=" box box-info">
      <div class="box-header">
        <h4 style="text-align:center; margin-bottom: 30px"><b>DETAIL DATA BANTUAN SOSIAL</b></h4><hr>
      </div>

      <div class="box-body table-responsive">
      <h4><b>Data Bantuan Sosial</b> </h4>

<!-- PopUp untuk Foto KTP -->
<div class="modal fade" id="modalKTP" tabindex="-1" role="dialog" aria-labelledby="modalKTPLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalKTPLabel" style="text-align: center; font-weight:bold;">Foto Kartu Tanda Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
              <img src="<?php echo base_url(); ?>./assets/images/foto/<?php echo $detail->foto_ktp; ?>" alt="Gambar KTP" class="img-fluid" style="width: 500px; cursor:pointer;">
            </div>
        </div>
    </div>
</div>

<!-- PopUp untuk Foto KK -->
<div class="modal fade" id="modalKK" tabindex="-1" role="dialog" aria-labelledby="modalKKLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalKKLabel" style="text-align: center; font-weight:bold;">Foto Kartu Keluarga</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
              <img src="<?php echo base_url(); ?>./assets/images/foto/<?php echo $detail->foto_kk; ?>" alt="Gambar KK" class="img-fluid" style="width: 500px; cursor:pointer;">
            </div>
        </div>
    </div>
</div>
      <!-- Tabel Detail Bantuan Sosial -->
      <table class="table table-striped">
        <tr>
          <th> Nama Lengkap </th>
          <td><?php echo $detail->nama; ?></td>
        </tr>
        <tr>
          <th> NIK </th>
          <td><?php echo $detail->nik; ?></td>
        </tr>
        <tr>
          <th>  Nomor Kartu Keluarga </th>
          <td><?php echo $detail->nomor_kk ?> </td>
        </tr>
      <tr>
        <th> Foto Kartu Tanda Penduduk</th>
        <td>
          <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modalKTP">Gambar KTP</button>
        </td>
      </tr>
      <tr>
        <th> Foto Kartu Keluarga </th>
        <td>
          <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modalKK">Gambar KK</button>
        </td>
      </tr>
      <tr>
        <th> umur </th>
        <td><?php echo $detail->umur; ?></td>
      </tr>
      <tr>
        <th> Jenis Kelamin </th>
        <td><?php echo $detail->jenis_kelamin; ?></td>
      </tr>
      <tr>
        <th> Provinsi</th>
        <td><?php echo $detail->provinsi_id; ?></td>
      </tr>
      <tr>
        <th> Kota/Kabupaten </th>
        <td><?php echo $detail->kota_kabupaten_id; ?></td>
      </tr>
      <tr>
        <th> Kecamatan</th>
        <td><?php echo $detail->kecamatan_id; ?></td>
      </tr>
      <tr>
        <th> Kelurahan</th>
        <td><?php echo $detail->kelurahan_id; ?></td>
      </tr>
      <tr>
        <th> Alamat</th>
        <td><?php echo $detail->alamat; ?></td>
      </tr>
      <tr>
        <th> RT </th>
        <td><?php echo $detail->rt; ?></td>
      </tr>
      <tr>
        <th> RW</th>
        <td><?php echo $detail->rw; ?></td>
      </tr>
      <tr>
        <th> Penghasilan Sebelum Pandemi </th>
        <td><?php echo $detail->penghasilan_sebelum_pandemi; ?></td>
      </tr>
      <tr>
        <th> Penghasilan Setelah Pandemi </th>
        <td><?php echo $detail->penghasilan_setelah_pandemi; ?></td>
      </tr>
      <tr>
        <th> Alasan </th>
        <td><?php echo $detail->alasan; ?></td>
      </tr>
    </tr>
  </table>
</div>
</div>
<button onClick="goBack()".GoBack  class="btn btn-danger"> Kembali</button>
<script>
  function goBack() {
    window.history.back();
  }
</script>
</section>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch Provinsi
        fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                let provinsiSelect = document.getElementById('provinsi_id');
                provinces.forEach(prov => {
                    let option = document.createElement('option');
                    option.value = prov.id;
                    option.text = prov.name;
                    option.setAttribute('data-id', prov.id);
                    provinsiSelect.add(option);
                });
            });

        // Fetch Kab/Kota
        document.getElementById('provinsi_id').addEventListener('change', function () {
            let provId = this.selectedOptions[0].getAttribute('data-id');
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provId}.json`)
                .then(response => response.json())
                .then(regencies => {
                    let kabupatenSelect = document.getElementById('kota_kabupaten_id');
                    kabupatenSelect.innerHTML = '<option>Pilih</option>';
                    regencies.forEach(kab => {
                        let option = document.createElement('option');
                        option.value = kab.id;
                        option.text = kab.name;
                        option.setAttribute('data-id', kab.id);
                        kabupatenSelect.add(option);
                    });
                });
        });

        // Fetch Kecamatan berdasarkan Kab/Kota
        document.getElementById('kota_kabupaten_id').addEventListener('change', function () {
            let kabId = this.selectedOptions[0].getAttribute('data-id');
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabId}.json`)
                .then(response => response.json())
                .then(districts => {
                    let kecamatanSelect = document.getElementById('kecamatan_id');
                    kecamatanSelect.innerHTML = '<option>Pilih</option>';
                    districts.forEach(kec => {
                        let option = document.createElement('option');
                        option.value = kec.id;
                        option.text = kec.name;
                        option.setAttribute('data-id', kec.id);
                        kecamatanSelect.add(option);
                    });
                });
        });

        // Fetch Kelurahan berdasarkan Kecamatan
        document.getElementById('kecamatan_id').addEventListener('change', function () {
            let kecId = this.selectedOptions[0].getAttribute('data-id');
            fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecId}.json`)
                .then(response => response.json())
                .then(villages => {
                    let kelurahanSelect = document.getElementById('kelurahan_id');
                    kelurahanSelect.innerHTML = '<option>Pilih</option>';
                    villages.forEach(kel => {
                        let option = document.createElement('option');
                        option.value = kel.id;
                        option.text = kel.name;
                        option.setAttribute('data-id', kel.id);
                        kelurahanSelect.add(option);
                    });
                });
        });
    });
</script>