@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Data Formulir
                    </div>
                    <div class="float-end">
                        <a href="{{ route('formulir.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nama :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $formulir->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Alamat :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $formulir->address }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
