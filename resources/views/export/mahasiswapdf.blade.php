<table class="table" style="border:1px solid #ddd">
    <thead>
        <tr>
            <th>NAMA</th>
            <th>NIM</th>
            <th>ALAMAT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mahasiswa as $mhs)
        <tr>
            <td>{{$mhs->nama}}</td>
            <td>{{$mhs->nim}}</td>
            <td>{{$mhs->alamat}}</td>
        </tr>
        @endforeach
    </tbody>
</table>