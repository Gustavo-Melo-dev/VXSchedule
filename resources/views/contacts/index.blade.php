<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos') }}
        </h2>
    </x-slot>
    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            display: none;
        }
        @media screen and (max-width: 768px) {
            #display-none{
                display: none;
            }
        }
    </style>

    <script>
        function myFunction(element) {
            let condition = new RegExp('^'+element.value+'.*$', 'i')
            var contacts = {!! json_encode($contacts) !!};
            let sugestion = contacts.filter((el)=>{ return condition.test(el.first_name)})
        }
        $(document).ready(function() {
            $('#search').select2();
        });
    </script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between flex-wrap">
                        <div>
                            <form action="{{ route('contacts.index') }}" method="get">
                                <div class="">
                                    <select name="search" id="search" onkeyup="myFunction(this)" class="py-2">
                                        <option value="0">Buscar Contato</option>
                                        @foreach ($contacts as $contact)
                                            <option value="{{ $contact->first_name }}">{{ $contact->first_name . ' ' . $contact->last_name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text"  placeholder="Procurar..." id="search"> --}}
                                    <div class="flex sm:flex-wrap py-3" id="btn-search">
                                        <button type="submit" class="btn btn-block bg-indigo-700 hover:bg-indigo-500 py-2 px-2 rounded text-white">Buscar</button>
                                    </div>
                                </div>
                            </form>
                            <div>
                                @if($search)
                                    <p id="search-result" class="italic py-2">Buscando por "{{ $search }}"</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex mb-3">
                            <a href="{{ route('contacts.create') }}">
                                <button type="button" class="btn btn-block bg-indigo-700 hover:bg-indigo-500 py-2 px-2 rounded text-white">+Add</button>
                            </a>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg xl:rounded-lg  mt-3">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3" id="display-none">
                                        Telefone
                                    </th>
                                    <th scope="col" class="px-6 py-3" id="display-none">
                                        Cidade
                                    </th>
                                    <th scope="col" class="px-6 py-3" id="display-none">
                                        Apelido
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{$contact->first_name . ' ' . $contact->last_name}}
                                        </th>
                                        <td class="px-6 py-4" id="display-none">
                                            {{$contact->phone}}
                                        </td>
                                        <td class="px-6 py-4" id="display-none">
                                            {{$contact->city}}
                                        </td>
                                        <td class="px-6 py-4" id="display-none">
                                            {{$contact->email}}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex">
                                                <div class="mr-2">
                                                    <a href="{{ route('contacts.edit', $contact->id) }}">
                                                        <button type="submit" class="btn btn-block bg-indigo-700 hover:bg-indigo-500 py-2 px-2 rounded text-white">Editar</button>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="{{ route('contacts.delete', $contact->id) }}">
                                                        <form action="{{ route('contacts.delete', $contact->id) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn bg-red-600 btn btn-block hover:bg-red-500 py-2 px-2 rounded text-white">Excluir</button>
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
    </div>
</x-app-layout>
