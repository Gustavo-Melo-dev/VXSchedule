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
                        <form class="form-card" action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Nome<span class="text-danger"> *</span></label>
                                    <input type="text" id="name" name="name" placeholder="Digite seu nome...">
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Telefone<span class="text-danger"> *</span></label>
                                    <input type="text" id="phone" name="phone" placeholder="Digite seu telefone...">
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Endereço<span class="text-danger"> *</span></label>
                                    <input type="text" id="address" name="address" placeholder="Digite seu endereço...">
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Upload<span class="text-danger"> *</span></label>
                                    <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-4 flex-column d-flex">
                                    <label class="form-control-label px-3">Cep<span class="text-danger"> *</span></label>
                                    {{-- <input type="text" id="address" name="address" placeholder="Digite seu endereço..."> --}}
                                    <input name="cep" type="text" id="cep" value="{{ $addresses['cep']}}" size="10" maxlength="9" />
                                </div>
                                <div class="form-group flex-column col-sm-2 d-flex">
                                    <label class="form-control-label px-3">Buscar<span class="text-danger"> *</span></label>
                                    <input type="submit"/>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Rua<span class="text-danger"> *</span></label>
                                    <input name="rua" type="text" id="rua" size="60" />
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Bairro<span class="text-danger"> *</span></label>
                                    {{-- <input type="text" id="address" name="address" placeholder="Digite seu endereço..."> --}}
                                    <input name="bairro" type="text" id="bairro" size="40" />
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Cidade<span class="text-danger"> *</span></label>
                                    <input name="cidade" type="text" id="cidade" size="40" />
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Estado<span class="text-danger"> *</span></label>
                                    {{-- <input type="text" id="address" name="address" placeholder="Digite seu endereço..."> --}}
                                    <input name="uf" type="text" id="uf" size="2" />
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">IBGE<span class="text-danger"> *</span></label>
                                    <input name="ibge" type="text" id="ibge" size="8" />
                                </div>
                            </div>
                            <div class="row justify-content-center mt-2">
                                <div class="form-group col-sm-6">
                                    <button type="submit" class="btn-block btn-primary">Criar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
