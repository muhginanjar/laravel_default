@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Lembaga List</div>
        <div class="card-body">
            @can('create-lembaga')
                <a href="{{ route('lembaga.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Lembaga</a>
            @endcan
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">S#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($lembaga as $lembagas)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $lembagas->nama }}</td>
                        <td>{{ $lembagas->deskripsi }}</td>
                        <td>
                            <form action="{{ route('lembaga.destroy', $lembagas->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('lembaga.show', $lembagas->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                @can('edit-lembaga')
                                    <a href="{{ route('lembaga.edit', $lembagas->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                @endcan

                                @can('delete-lembaga')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this lembaga?');"><i class="bi bi-trash"></i> Delete</button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Lembaga Found!</strong>
                        </span>
                    </td>
                @endforelse
                </tbody>
            </table>

            {{ $lembaga->links() }}

        </div>
    </div>
@endsection
