<template>
    <Head title="Create Word"/>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="hanzi" value="Hanzi">

                                </InputLabel>
                                <TextInput id="hanzi"
                                           type="text"
                                           class="mt-1 block w-full"
                                           v-model="form.hanzi"
                                           required
                                           autofocus
                                >
                                </TextInput>
                                <InputError class="mt-2" :message="form.errors.hanzi"/>
                            </div>
                            <div>
                                <InputLabel for="pinyin" value="Pinyin">

                                </InputLabel>
                                <TextInput id="pinyin"
                                           type="text"
                                           class="mt-1 block w-full"
                                           v-model="form.pinyin"
                                           required
                                           autofocus
                                >
                                </TextInput>
                                <InputError class="mt-2" :message="form.errors.pinyin"/>
                            </div>
                            <div>
                                <InputLabel for="meaning" value="meaning">

                                </InputLabel>
                                <TextInput id="meaning"
                                           type="text"
                                           class="mt-1 block w-full"
                                           v-model="form.meaning"
                                           required
                                           autofocus
                                >
                                </TextInput>
                                <InputError class="mt-2" :message="form.errors.meaning"/>
                            </div>
                            <div class="mt-4 flex justify-end">
                                <PrimaryButton
                                    class="ms-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    v-text="!isUpdating ? 'Create' : 'Update'"
                                >
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {onMounted} from "vue";

const form = useForm({
    hanzi: "",
    pinyin: "",
    meaning: ""
});
const props = defineProps({
    isUpdating: {
        type: Boolean,
        default: false,
    },
    word: {
        type: Object,
        default: {
            hanzi: '',
            pinyin: '',
            meaning: ''
        },
    },
})
const submit = () => (props.isUpdating ? updateWord() : addWord());
const addWord = () => form.post("/words");
const updateWord = () => form.put(`/words/${props.word.id}`);
onMounted(() => {
    form.hanzi = props.word.hanzi;
    form.pinyin = props.word.pinyin;
    form.meaning = props.word.meaning;
});
</script>

<style scoped>

</style>
