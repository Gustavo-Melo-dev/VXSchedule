<input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link, useForm  } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Link,
        useForm
    },
    props: {
        contacts: {
            type: String
        }
    },
    setup () {
    const form = useForm({
        image: null,
        name: null,
        tel_number: null,
        address: null,
    })
    return { form }
  },
  methods: {
    handleSubmit() {
      this.$inertia.post('/contact/create', this.form)
    }
  }
}
</script>

<template>
    <Head title="Contatos" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Adicionar Contato
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-end p-6">
                        <Link type="button" href="/contact" class="bg-indigo-700 hover:bg-indigo-500 text-white px-4 py-2 rounded-md">Voltar</Link>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-col justify-center items-center">
                        <div class="forms">
                            <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
                                <div class="">
                                    <label for="file_input">Carregar imagem</label>
                                    <div class="py-4">
                                        <input class="block w-full text-sm bg-white rounded-lg input input-bordered pt-3 max-w-xs"  @input="form.image = $event.target.files[0]" id="file_input" name="file_input" type="file" multiple="">
                                    </div>
                                </div>
                                <div class="">
                                    <label for="name">Nome</label>
                                    <div class="py-4">
                                        <input type="text" placeholder="Type here" v-model="form.name" class="input input-bordered bg-white w-full max-w-xs" />
                                    </div>
                                    {{ form.name }}
                                </div>
                                <div class="">
                                    <label for="name">Telefone</label>
                                    <div class="py-4">
                                        <input type="text" placeholder="Type here" v-model="form.tel_number" class="input input-bordered bg-white w-full max-w-xs" />
                                    </div>
                                </div>
                                <div class="">
                                    <label for="name">Endereço</label>
                                    <div class="py-4">
                                        <input type="text" placeholder="Type here" v-model="form.address" class="input input-bordered bg-white w-full max-w-xs" />
                                    </div>
                                </div>
                                <div class="btn flex flex-end bg-indigo-700 hover:bg-indigo-500 border-indigo-700 hover:border-indigo-500 text-white text-lg mt-2">
                                    <button type="submit">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<style>
</style>
