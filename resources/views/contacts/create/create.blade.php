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
                        }
                        </script>
                        </head>
                        @if($errors->any())
                            <div class="flex justify-center bg-red-100 my-3">
                                <ul class="py-3">
                                    @foreach ($errors->all() as $message)
                                        <li>{{$message}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="flex justify-end mb-3">
                            <a href="{{ route('contacts.index') }}">
                                <button type="button" class="btn btn-block bg-indigo-700 hover:bg-indigo-500 py-2 px-2 rounded text-white">Voltar</button>
                            </a>
                        </div>
                        <div class="form flex justify-center">
                            <form class="w-full max-w-lg shadow-xl px-3 py-3" method="POST" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Nome
                                        </label>
                                        <input name="first_name" type="text" id="first_name" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Sobrenome
                                        </label>
                                        <input name="last_name" type="text" id="last_name" size="60" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0" id="div-phone">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Telefone
                                            <button type="button" id="btn-phone" onclick="addBtn()" class="btn bg-indigo-500 px-1 rounded-full text-white">+</button>
                                        </label>
                                        <div>
                                            <input name="phone" type="text" id="phone[]" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                        </div>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Apelido
                                        </label>
                                        <input name="surname" type="text" id="surname" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Cep
                                        </label>
                                        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Rua
                                        </label>
                                        <input name="road" type="text" id="road" size="60" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Bairro
                                        </label>
                                        <input name="district" type="text" id="district" size="40" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Cidade
                                        </label>
                                        <input name="city" type="text" id="city" size="40" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                            Estado
                                        </label>
                                        <input name="uf" type="text" id="uf" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        IBGE
                                        </label>
                                        <input name="ibge" type="text" id="ibge" size="8" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"/>
                                    </div>
                                </div>
                                <div class="row flex justify-center mt-2">
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn btn-block bg-indigo-700 hover:bg-indigo-500 py-2 px-2 rounded text-white">Criar Contato</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Adicionar novo campo telefone
        // var cont = 1;
        //  $("#btn-phone").click(function() {
        //     $( "#div-phone" ).append(
        //         '<br><label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Telefone <button type="button" id="'+ cont +'" class="btn bg-indigo-500 px-1 rounded-full text-white">-</button></label><input name="phone" type="text" id="phone[]" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />'
        //     );
        // });
        // Remover campo extra telefone
        $( "form" ).on( "click", "", function() {
            $( this ).after( "<p>Another paragraph! " + (++count) + "</p>" );
        });

        var controleCampo = 1;

        function addBtn(){
            this.controleCampo++;
            document.getElementById('div-phone').insertAdjacentHTML('beforeend', '<div id="campo"><label id="" class="my-2 block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Telefone <button type="button" id="btn-phone" onclick="removeBtn('+ controleCampo +')" class="btn bg-indigo-500 px-1 rounded-full text-white">-</button></label><input name="phone" type="text" id="phone'+controleCampo+'" value="" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" /></div>');
        }
        // var controleCampo = 1;
        // function adicionarCampo() {
        //     controleCampo++;
        //     document.getElementById('formulario').insertAdjacentHTML('beforeend', '<div class="form-group" id="campo' + controleCampo + '"><span id="msgAlerta' + controleCampo + '"></span><label>CPF: </label><input type="text" name="cpf' + controleCampo + '" id="cpf' + controleCampo + '" onkeyup="pesquisarUsuario(' + controleCampo + ')" placeholder="Digite o CPF sem ponto" /><label> Nome: </label><input type="text" name="nome' + controleCampo + '" id="nome' + controleCampo + '" placeholder="Nome do usuário" /><label> E-mail: </label><input type="text" name="email' + controleCampo + '" id="email' + controleCampo + '" placeholder="E-mail do usuário" /><input type="hidden" name="id' + controleCampo + '" id="id' + controleCampo + '" /> <button type="button" id="' + controleCampo + '" onclick="removerCampo(' + controleCampo + ')"> - </button></div>');
        //     document.getElementById("qnt_campo").value = controleCampo;
        // }

        function removerCampo(idCampo){
            document.getElementById('campo' + idCampo).remove();
        }
    </script>
</x-app-layout>
