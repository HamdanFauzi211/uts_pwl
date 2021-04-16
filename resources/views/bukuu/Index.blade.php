@extends('bukuu.layout')

@section('content') 
    <div class="row"> 
        <div class="col-lg-12 margin-tb"> 
            <div class="pull-left mt-2"> 
                <h2>Daftar Buku Perpustakaan - Kabupaten Magetan</h2> 
            </div> 
            <div class="float-right my-2"> 
                <a class="btn btn-success" href="{{ route('bukuu.create') }}"> Input Buku</a> 
            </div>
            <form action="{{route('bukuu.index')}}" class="row g-3" method="GET">
                <div class="col-auto">
                    <input name="cari" type="cari" class="form-control" id="inputcari" placeholder="cari">
                </div>
                <div class="col-auto"?
                    <button type="submit" class="btn btn-primary mb-3">Cari Data</button>
             </div> 
        </div> 
                
    @if ($message = Session::get('success')) 
         <div class="alert alert-success"> 
            <p>{{ $message }}</p> 
        </div> 
    @endif
<table class="table table-bordered"> 
    <tr> 
            <th>Id_buku</th>
            <th>Judul</th> 
            <th>Kategori</th> 
            <th>Penerbit</th> 
            <th>Pengarang</th>
            <th>Jumlah</th> 
            <th>Status</th> 

            <th width="280px">Action</th> 
    </tr> 
    @foreach ($bukuu as $Buku) 
    <tr> 
            <td>{{ $Buku->Id_buku }}</td> 
            <td>{{ $Buku->Judul }}</td> 
            <td>{{ $Buku->Kategori }}</td> 
            <td>{{ $Buku->Penerbit }}</td> 
            <td>{{ $Buku->Pengarang }}</td>
            <td>{{ $Buku->Jumlah }}</td> 
            <td>{{ $Buku->Status }}</td> 
            <td> <form action="{{ route('bukuu.destroy',$Buku->Id_buku) }}" method="POST"> 
            <a class="btn btn-info" href="{{ route('bukuu.show',$Buku->Id_buku) }}">Show</a> 
            <a class="btn btn-primary" href="{{ route('bukuu.edit',$Buku->Id_buku) }}">Edit</a> 
            
            @csrf 
            @method('DELETE') 
            <button type="submit" class="btn btn-danger">Delete</button> 
            </form> 
            </td> 
    </tr> 
    @endforeach 
    </table>
    {{ $bukuu->links() }} 
@endsection