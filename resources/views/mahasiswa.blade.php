
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Table Mahasiswa</h1>
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                    
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->nama }}</td>
                        <td>{{ $datas->alamat }}</td>
                        @if(md5_file('uploads/file/'.$datas->file) == $datas->md5)
                        <td><a href="{{ url('uploads/file/'.$datas->file) }}" > {{$datas->file}}</a></td>
                        @else
                        {<td>data sudah diganti</td>}
                        @endif</td>
                        <td>
                            <form action="{{ route('mahasiswa.destroy', $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('mahasiswa.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->

