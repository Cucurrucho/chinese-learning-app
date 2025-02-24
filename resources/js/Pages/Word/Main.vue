<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, Link, useForm} from '@inertiajs/vue3';

defineProps({
    words: {
        type: Array,
        default: () => []
    }
})
const form = useForm({});

const deleteWord = (id) => {
    form.delete(`words/${id}`);
};
const headers = ['Hazni', 'Pinyin', 'Meaning', 'Actions']
</script>

<template>
    <Head title="Words"/>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Words
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <div class="pb-3">
                            <Link class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                  href="words/create">Create new word
                            </Link>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3" v-for="header in headers" :key="header">{{ header }}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                                v-for="word in words" :key="word.id">
                                <td class="px-6 py-4 text-3xl">{{ word.hanzi }}</td>
                                <td class="px-6 py-4 text-2xl">{{ word.pinyin }}</td>
                                <td class="px-6 py-4 text-2xl">{{ word.meaning }}</td>
                                <td class="px-6 py-4 space-x-4">
                                    <a @click="deleteWord(word.id)"
                                            class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                        Delete
                                    </a>
                                    <Link :href="`words/${word.id}/edit`"
                                          class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
