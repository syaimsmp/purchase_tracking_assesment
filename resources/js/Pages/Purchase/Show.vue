<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AddForm from './Partials/AddForm.vue';

defineProps({
    purchase: {
        type: Object,
        required: true
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Purchase Item" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Purchase Item</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Purchase Details</h2>
            <p class="mt-1 text-sm text-gray-600">
                Here are the details of your purchase.
            </p>
        </header>

        <div class="mt-6 space-y-6">
            <div>
                <h3 class="text-md font-semibold text-gray-700">Customer Details</h3>
                <p><strong>Name:</strong> {{ purchase.user.name }}</p>
                <p><strong>Email:</strong> {{ purchase.user.email }}</p>
                <p><strong>Mobile:</strong> {{ purchase.user.mobile_no }}</p>
            </div>

            <div>
                <h3 class="text-md font-semibold text-gray-700">Purchased Items</h3>
                <ul>
                    <li v-for="item in purchase.items" :key="item.id">
                        {{ item.product.name }} - RM {{ item.product.price }}
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-md font-semibold text-gray-700">Total Price</h3>
                <p><strong>RM {{ purchase.total_price }}</strong></p>
            </div>
        </div>
    </section>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
