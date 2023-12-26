@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Formulir</div>
        <div class="card-body">
            <a href="{{ route('formulir.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Tambah Data</a>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($formulir as $forms)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $forms->name }}</td>
                        <td>{{ $forms->address }}</td>
                        <td>
                            <form action="{{ route('formulir.destroy', $forms->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('formulir.show', $forms->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                <a href="{{ route('formulir.edit', $forms->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan dihapus?');"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>Tidak ada formulir tersimpan</strong>
                        </span>
                    </td>
                @endforelse
                </tbody>
            </table>

            {{ $formulir->links() }}

        </div>
    </div>
@endsection
