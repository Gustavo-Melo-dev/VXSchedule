<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end flex-wrap">
                        <div class="flex mb-3">
                            <a href="{{ route('contacts.index') }}">
                                <button type="button" class="btn btn-block bg-indigo-700 hover:bg-indigo-500 py-2 px-2 rounded text-white">Voltar</button>
                            </a>
                        </div>
                    </div>
                    <div class="sm:rounded-lg xl:rounded-lg flex flex-column justify-center mt-3">
                        <form class="w-full max-w-lg shadow-xl sm:rounded-lg xl:rounded-lg px-5 py-3 mt-3 ">
                            <div class="p-8 d-flex justify-center">
                                <div class="flex flex-wrap justfy-center -mx-3 mb-6">
                                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Nome
                                    </label>
                                    {{$contact->first_name . ' ' . $contact->last_name}}
                                  </div>
                                  <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                      Telefone
                                    </label>
                                    {{$contact->phone}}
                                  </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                          Email
                                      </label>
                                      {{$contact->email}}
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        CEP
                                      </label>
                                      {{$contact->cep}}
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                          Rua
                                      </label>
                                      {{$contact->road}}
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        Bairro
                                      </label>
                                      {{$contact->district}}
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                          Estado
                                      </label>
                                      {{$contact->uf}}
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                        IBGE
                                      </label>
                                      {{$contact->ibge}}
                                    </div>
                                </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
