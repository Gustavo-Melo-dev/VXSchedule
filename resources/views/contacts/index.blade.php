@extends('layout.layout')

@section('title', 'VXSchedule')

@section('content')
    <div class="index">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-wrap">
                    <div>
                        <form action="{{ route('contacts.index') }}" method="get">
                            <div class="form-group">
                                <input type="text" name="filter" placeholder="Procurar..." id="filter">
                                <input type="submit" value="Pesquisar">
                            </div>
                        </form>
                        <div>
                            @if($filter)
                                <p id="filter-result">Buscando por "{{ $filter }}"</p>
                            @endif
                        </div>
                        {{ $github['login'] }}
                        @foreach ($github as $git)

                        @endforeach
                    </div>
                    <div>
                        <a href="{{ route('contacts.create') }}">
                            <button type="button" class="btn btn-primary">+Add</button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th data-priority="1">Position</th>
                                <th>Office</th>
                                <th data-priority="2">Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->address }}</td>
                                <td><img src="{{ $contact->image }}" alt=""></td>
                                <td>2010/11/14</td>
                                <td>$357,650</td>
                                <td>
                                    <div class="d-flexs">
                                        <div>
                                            <a href="{{ route('contacts.edit', $contact->id) }}">
                                                <button type="submit" class="btn btn-dark">Editar</button>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('contacts.delete', $contact->id) }}">
                                                <form action="{{ route('contacts.delete', $contact->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
