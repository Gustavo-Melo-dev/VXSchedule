@extends('layout.layout')

@section('title', 'VXSchedule')

@section('content')
    <div class="create">
        <div class="container-fluid px-1 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('contacts.index') }}">
                            <button type="button" class="btn btn-primary">Voltar</button>
                        </a>
                    </div>
                    <div class="card mt-0">
                        <form class="form-card" action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Nome<span class="text-danger"> *</span></label>
                                    <input type="text" id="name" name="name" placeholder="Digite seu nome..." value="{{ $contact->name }}">
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Telefone<span class="text-danger"> *</span></label>
                                    <input type="text" id="phone" name="phone" placeholder="Digite seu telefone..." value="{{ $contact->phone }}">
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Endereço<span class="text-danger"> *</span></label>
                                    <input type="text" id="address" name="address" placeholder="Digite seu endereço..." value="{{ $contact->address }}">
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Upload<span class="text-danger"> *</span></label>
                                    <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01" value="{{ $contact->image }}">
                                </div>
                            </div>
                            <div class="row justify-content-center mt-2">
                                <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Atualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
