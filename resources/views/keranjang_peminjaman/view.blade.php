@extends('layouts.layout')
@section('content')
<title>Keranjang Data Peminjaman</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">
<link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
<script src="{{ url('assets/js/app.js') }}"></script>

<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-dark">Keranjang Data Peminjaman</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
    <button class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
      <br>
      <br>
      <table id="dataTable" class="table table-bordered" cellspacing="0">
          <thead>
            <tr>
                  <th>No</th>
                  <th>Nama Peminjam</th>
                  <th>Status Peminjam</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Keterangan</th>
                  <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($peminjaman as $i => $u)
            <tr class="data-row">
                  <td>{{++$i}}</td>
                  <td>{{$u->nama_peminjam}}</td>
                  <td>{{$u->status}}</td>
                  <td>{{$u->nama_barang}}</td>
                  <td>{{$u->jumlah_pinjam}}</td>
                  <td>{{$u->tanggal_pinjam}}</td>
                  <td>{{$u->tanggal_kembali}}</td>
                  <td>{{$u->keterangan}}</td>
              <td>
                <div class="row">

                      <a href="/keranjang_peminjaman/edit/{{ $u->id_peminjaman }}" class="btn btn-primary btn-sm ml-2">Edit</a>
                      <a href="javascript:void(0)" id="hapus" data-id="{{ $u->id_peminjaman }}" class="btn btn-danger btn-sm ml-2">Hapus</a>


                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
  <div class="text-center">
  <a href="/inputpeminjaman" class="btn btn-dark">Masukan Semua Data</a>
  </div>
  <br>
   <font><b>*Mohon untuk langsung klik masukkan semua data untuk memasukan ke dalam data peminjaman</b></font>
</div>

<div id="tambah" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Masukan Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="/keranjang_peminjaman/store" method="post">
            @csrf
          <div class="form-group">
              <label for="">Nama Peminjaman</label>
              <input type="text" name="nama_peminjaman" class="form-control"  required>
          </div>
          <div class="form-group d-flex flex-column">
            <label for="">Status Peminjaman</label>
            <select class="form-control" name="status" id="statusPinjam">
              <option selected disabled>----- Pilih Status -----</option>
              <option value="Siswa">Siswa</option>
              <option value="Guru">Guru</option>
            </select>

            <div class="kelas hide" id="kelas">
              <label class="mt-4" for="">Kelas</label>
              <select class="form-control" name="kelasSiswa" id="kelasSiswa">
                <option selected disabled>----- Pilih Kelas -----</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
                <option value="XIII">XIII</option>
              </select>
            </div>
            <div class="jurusanXX hide" id="jurusanX">
              <label class="mt-4" for="">Jurusan</label>
              <select class="form-control " name="jurusan" id="jurusan">
                <option selected disabled>----- Pilih Jurusan -----</option>
                @foreach ($jurusanX as $j)
                  <option value="{{ $j->jurusan }}">{{ $j->jurusan }}</option>
                @endforeach
              </select>
            </div>
            <div class="jurusanX hide" id="jurusanXX">
              <label class="mt-4" for="">Jurusan</label>
              <select class="form-control " name="jurusan" id="jurusan">
                <option selected disabled>----- Pilih Jurusan -----</option>
                @foreach ($jurusanXX as $j)
                  <option value="{{ $j->jurusan }}">{{ $j->jurusan }}</option>
                @endforeach
              </select>
            </div>
            <div class="jurusanToi hide" id="jurusanToi">
                <label class="mt-4" for="">Jurusan</label>
                <select class="form-control " name="jurusan" id="jurusan">
                  <option selected disabled>----- Pilih Jurusan -----</option>
                  @foreach ($toi as $t)
                    <option value="{{ $j->jurusan }}">{{ $t->jurusan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="jurusanId hide" id="jurusanId">
                <label class="mt-4" for="">ID Jurusan</label>
                <select class="form-control " name="jurusanId" id="jurusanId">
                  <option selected disabled>----- Pilih ID Jurusan -----</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>

            <div class="jurusanGuru hide" id="jurusanGuru">
              <label class="mt-4" for="jurusan">Jurusan</label>
              <select class="form-control " name="jurusan" id="jurusan">
                <option selected disabled>----- Pilih Jurusan -----</option>
                @foreach ($jurusan as $j)
                  <option value="{{ $j->jurusan }}">{{ $j->jurusan }}</option>
                @endforeach
              </select>
            </div>
        </div>
          <div class="form-group">
             <div class="input_fields_wrap">
            <button class="add_field_button btn btn-primary">Tambah Barang</button>
            <table class="mt-3">
              <tr>
                <td>
                  <label for="">Nama Barang</label>
                      <select class="form-control" name="id_barang[]" style="width:200px">
                          <option selected disabled>Pilih Barang</option>
                          @foreach ($barang as $j)
                          <option value="{{$j->id_barang}}">{{$j->nama_barang}}</option>
                          @endforeach
                    </select>
                    </div>
                </td>
                <td class="pl-3">
                  <label for="">Jumlah</label>
                <input type="number" name="jumlah[]" class="form-control" required placeholder="Masukan Jumlah" required>
                </td>
              </tr>
            </table>

          </div>

           <div class="form-group mt-4">
                <label for="">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>
             <div class="form-group">
                <label for="">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>


  @push('scripts')
  <script type="text/javascript">
        $(document).ready(function() {
	var max_fields      = 100; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
  var add_button      = $(".add_field_button"); //Add button ID

	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment

			$(wrapper).append('<div><table><tr><td><select name="id_barang[]" style="width:200px" class="form-control mt-3"><option selected disabled>Pilih Barang</option>@foreach ($barang as $j)<option value="{{$j->id_barang}}">{{$j->nama_barang}}</option>@endforeach</select></div></td><td class="pl-3 "><input type="number" name="jumlah[]" class="form-control mt-3" required placeholder="Masukan Jumlah" required></td></tr></table><a href="#" class="remove_field">Remove</a></div>');
      $('.myselect').select2();
    }
  });

	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});


    $( "#status" ).change(function() {
        var id =$("#hid").val();
        var status =$("#status").val();
        console.log(status + " " + id);
        $.ajax({
            type: "GET",
            url: "update/"+ id + "status/" + status,
            success: function(data){
            console.log(data);
            $("#update").val(data);
            },
        });
    });

$(document).on('click','#hapus',function(){
  var id = $(this).data("id");
  Swal.fire({
    title: 'Apakah Anda yakin?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Ya',
    cancelButtonText: 'Tidak'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: "GET",
        url:  "/keranjang_peminjaman/hapus/"+id,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: "id="+ id,
        success: function (data) {
           Swal.fire(
          'Good job!',
          'Data Sukses Terhapus',
          'success'
        )
        location.reload();

        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
    }
  });
});

const status = document.getElementById('statusPinjam');
const kelasSiswa = document.getElementById('kelasSiswa');
const kelas = document.getElementById('kelas');
const jurusanGuru = document.getElementById('jurusanGuru');
const jurusanX = document.getElementById('jurusanX');
const jurusanXX = document.getElementById('jurusanXX');
const jurusanToi = document.getElementById('jurusanToi');
const jurusanId = document.getElementById('jurusanId');

status.addEventListener('change', () => {
  if (status.value == 'Siswa') {
    kelas.classList.remove('hide');
    jurusanId.classList.remove('hide');
    jurusanGuru.classList.add('hide');
    kelasSiswa.addEventListener('change', () => {
      if (kelasSiswa.value == 'X') {
        jurusanX.classList.remove('hide');
        jurusanToi.classList.add('hide');
        jurusanXX.classList.add('hide');
      } else if (kelasSiswa.value == "XII" || kelasSiswa.value == 'XI') {
        jurusanXX.classList.remove('hide');
        jurusanToi.classList.add('hide');
        jurusanX.classList.add('hide');
      } else if (kelasSiswa.value == "XIII") {
        jurusanToi.classList.remove('hide');
        jurusanX.classList.add('hide');
        jurusanXX.classList.add('hide');
      }
    })
  } else if(status.value == 'Guru') {
    jurusanGuru.classList.remove('hide');
    kelas.classList.add('hide');
    jurusanId.classList.add('hide');
    jurusanX.classList.add('hide');
    jurusanXX.classList.add('hide');
  }
})

</script>
@endpush

@endsection


