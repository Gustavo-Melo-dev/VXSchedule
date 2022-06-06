<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <script>
                        function limpa_formulário_cep() {
                                //Limpa valores do formulário de cep.
                                document.getElementById('road').value=("");
                                document.getElementById('district').value=("");
                                document.getElementById('city').value=("");
                                document.getElementById('uf').value=("");
                                document.getElementById('ibge').value=("");
                        }

                        function meu_callback(conteudo) {
                            if (!("erro" in conteudo)) {
                                //Atualiza os campos com os valores.
                                document.getElementById('road').value=(conteudo.logradouro);
                                document.getElementById('district').value=(conteudo.bairro);
                                document.getElementById('city').value=(conteudo.localidade);
                                document.getElementById('uf').value=(conteudo.uf);
                                document.getElementById('ibge').value=(conteudo.ibge);
                            } //end if.
                            else {
                                //CEP não Encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        }

                        function pesquisacep(valor) {

                            //Nova variável "cep" somente com dígitos.
                            var cep = valor.replace(/\D/g, '');

                            //Verifica se campo cep possui valor informado.
                            if (cep != "") {

                                //Expressão regular para validar o CEP.
                                var validacep = /^[0-9]{8}$/;

                                //Valida o formato do CEP.
                                if(validacep.test(cep)) {

                                    //Preenche os campos com "..." enquanto consulta webservice.
                                    document.getElementById('road').value="...";
                                    document.getElementById('district').value="...";
                                    document.getElementById('city').value="...";
                                    document.getElementById('uf').value="...";
                                    document.getElementById('ibge').value="...";

                                    //Cria um elemento javascript.
                                    var script = document.createElement('script');

                                    //Sincroniza com o callback.
                                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                                    //Insere script no documento e carrega o conteúdo.
                                    document.body.appendChild(script);

                                } //end if.
                                else {
                                    //cep é inválido.
                                    limpa_formulário_cep();
                                    alert("Formato de CEP inválido.");
                                }
                            } //end if.
                            else {
                                //cep sem valor, limpa formulário.
                                limpa_formulário_cep();
                            }
                        };

                        </script>
                        </head>
                        <div class="flex justify-end mb-3">
                            <a href="{{ route('contacts.index') }}">
                                <button type="button" class="btn btn-block bg-indigo-700 hover:bg-indigo-500 py-2 px-2 rounded text-white">Voltar</button>
                            </a>
                        </div>
                        <div class="form flex justify-center">
                            <form class="w-full max-w-lg" method="POST" action="{{ route('contacts.update', $contact->id) }}" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Nome
                                        </label>
                                        <input name="first_name" type="text" id="first_name" value="{{$contact->first_name}}" size="10" maxlength="9" onblur="pesquisacep(this.value);" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Sobrenome
                                        </label>
                                        <input name="last_name" type="text" id="last_name" value="{{$contact->last_name}}" size="60" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Telefone
                                        </label>
                                        <input name="phone" type="text" id="phone" value="{{$contact->phone}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Email
                                        </label>
                                        <input name="email" type="email" id="email" value="{{$contact->email}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Cep
                                        </label>
                                        <input name="cep" type="text" id="cep" value="{{$contact->cep}}" size="10" maxlength="9" onblur="pesquisacep(this.value);" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Rua
                                        </label>
                                        <input name="road" type="text" id="road" value="{{$contact->road}}" size="60" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Bairro
                                        </label>
                                        <input name="district" type="text" id="district" value="{{$contact->district}}" size="40" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Cidade
                                        </label>
                                        <input name="city" type="text" id="city" size="40" value="{{$contact->city}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Estado
                                        </label>
                                        <input name="uf" type="text" id="uf" value="{{$contact->uf}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        IBGE
                                        </label>
                                        <input name="ibge" type="text" id="ibge" value="{{$contact->ibge}}" size="8" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>
                                <div class="row flex justify-center mt-2">
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn btn-block bg-indigo-700 hover:bg-indigo-500 py-2 px-2 rounded text-white">Atualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
