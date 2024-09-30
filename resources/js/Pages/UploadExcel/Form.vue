<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    file: null,
});

const fileInput = ref(null);

const handleSubmit = () => {
    form.post(route('user-imports.store'), {
        onSuccess: () => {
            form.reset('file'); // Reset the form after successful upload
        },
    });
};

</script>

<template>
    <Head title="Upload Excel" />

    <AuthenticatedLayout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-lg font-medium text-gray-900">Upload Excel File</h2>

                    <form @submit.prevent="handleSubmit" class="mt-6 space-y-6" enctype="multipart/form-data">
                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-700">Excel File</label>
                            <input ref="fileInput" type="file" name="file" id="file" @change="form.file = $event.target.files[0]" accept=".xlsx, .xls" class="mt-1 block w-full" required />
                            <p v-if="form.errors.file" class="mt-2 text-sm text-red-600">{{ form.errors.file }}</p>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" :disabled="form.processing">
                                Upload
                            </button>
                        </div>
                    </form>

                    <p v-if="form.recentlySuccessful" class="mt-2 text-sm text-green-600">File uploaded successfully! Processing...</p>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
