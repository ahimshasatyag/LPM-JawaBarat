<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b>EDIT DATA BANTUAN SOSIAL</b></h4>
                <hr>
            </div>

            <div class="box-body">

                <?php
                if ($this->session->flashdata('sukses')) {
                    ?>
                <div class="callout callout-success">
                    <p style="font-size:14px">
                        <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
                    </p>
                </div>
                <?php
                }
                ?>
                <form action="<?php echo base_url('penduduk/proses_edit'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?php echo $penduduk->nama; ?>" class="form-control"
                            readonly />
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" name="nik" value="<?php echo $penduduk->nik; ?>" class="form-control"
                            required />
                    </div>

                    <div class="form-group">
                        <label>Nomor Kartu Keluarga</label>
                        <input type="number" name="nomor_kk" value="<?php echo $penduduk->nomor_kk; ?>" class="form-control"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Foto Kartu Tanda Penduduk</label>
                        <input type="file" name="foto_ktp" size="20" value="<?php echo $penduduk->foto_ktp; ?>" class="form-control"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Foto Kartu Keluarga</label>
                        <input type="file" name="foto_kk" size="20" value="<?php echo $penduduk->foto_kk; ?>" class="form-control"
                            required />
                    </div>
            
                    
                    <div class="form-group">
                        <label>Umur</label>
                        <input type="number" name="umur" value="<?php echo $penduduk->umur; ?>" class="form-control"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" value="<?php echo $penduduk->jenis_kelamin; ?>" class="form-control"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                            <select id="provinsi_id" name="provinsi_id" class="form-control" required>
                                option>Pilih</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Kota/Kabupaten</label>
                            <select id="kota_kabupaten_id" name="kota_kabupaten_id" class="form-control" required>
                                <option>Pilih</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                            <select id="kecamatan_id" name="kecamatan_id" class="form-control" required>
                                <option>Pilih</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Kelurahan</label>
                            <select id="kelurahan_id" name="kelurahan_id" class="form-control" required>
                                <option>Pilih</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control"
                            rows="2"><?php echo $penduduk->alamat; ?> </textarea>
                    </div>
                    <div class="form-group">
                        <label>RT</label>
                        <input type="text" name="rt" value="<?php echo $penduduk->rt; ?>" class="form-control"
                            required />
                    </div>
                    <div class="form-group">
                        <label>RW</label>
                        <input type="text" name="rw" value="<?php echo $penduduk->rw; ?>" class="form-control"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Penghasilan Sebelum Pandemi</label>
                        <input type="number" name="penghasilan_sebelum_pandemi" value="<?php echo $penduduk->penghasilan_sebelum_pandemi; ?>" class="form-control"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Penghasilan Setelah Pandemi</label>
                        <input type="number" name="penghasilan_setelah_pandemi" value="<?php echo $penduduk->penghasilan_setelah_pandemi; ?>" class="form-control"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Alasan</label>
                        <input type="text" name="alasan" value="<?php echo $penduduk->alasan; ?>" class="form-control"
                            required />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Simpan</button>
                        <a href="<?php echo base_url('penduduk/tampil'); ?>" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
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