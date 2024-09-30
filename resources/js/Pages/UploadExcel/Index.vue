<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

defineProps({
    uploadedData: {
        type: Object,
    },
});

const page = usePage();

</script>

<template>
    <Head title="Uploaded Excel Data" />

    <AuthenticatedLayout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-lg font-medium text-gray-900">Imported File's data</h2>

                    <div class="mt-6 overflow-x-auto">
                        <table class="table-auto w-full text-left">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">mobile_no</th>
                                    <th class="px-4 py-2">text1</th>
                                    <th class="px-4 py-2">amount</th>
                                    <th class="px-4 py-2">text2</th>
                                    <th class="px-4 py-2">Created At</th>
                                    <th class="px-4 py-2">Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="record in uploadedData.data" :key="record.id">
                                    <td class="border px-4 py-2">{{ record.id }}</td>
                                    <td class="border px-4 py-2">{{ record.mobile_no }}</td>
                                    <td class="border px-4 py-2">{{ record.text1 }}</td>
                                    <td class="border px-4 py-2">{{ record.amount }}</td>
                                    <td class="border px-4 py-2">{{ record.text2 }}</td>
                                    <td class="border px-4 py-2">{{ record.created_at }}</td>
                                    <td class="border px-4 py-2">{{ record.updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-6">
                        <nav class="flex justify-between items-center">
                            <div>
                                <span v-if="uploadedData.prev_page_url">
                                    <Link :href="uploadedData.prev_page_url" class="text-blue-500">Previous</Link>
                                </span>
                            </div>
                            
                            <div>
                                <span>
                                    Page {{ uploadedData.current_page }} of {{ uploadedData.last_page }}
                                </span>
                            </div>

                            <div>
                                <span v-if="uploadedData.next_page_url">
                                    <Link :href="uploadedData.next_page_url" class="text-blue-500">Next</Link>
                                </span>
                            </div>
                        </nav>
                    </div>

                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
