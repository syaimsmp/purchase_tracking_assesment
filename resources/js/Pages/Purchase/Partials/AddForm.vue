<script setup>
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue'; // Import computed from Vue

defineProps({
    availableItems: {
        type: Array,
        required: true
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    items : [],
    total_price: 0
});

const totalPrice = computed(() => {
    form.total_price =  form.items.reduce((prev, curr) => {
        return prev + curr.price;
    }, 0);

    return form.total_price;
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Purchase New Item</h2>

            <p class="mt-1 text-sm text-gray-600">
                Create a new purchase
            </p>
        </header>

        <form @submit.prevent="form.post(route('purchases.store'))" class="mt-6 space-y-6">

            <div class="item-selection">
                <h2>Select Items to Purchase</h2>
                <div v-for="item in availableItems" :key="item.id" class="item-checkbox">
                <label>
                    <input type="checkbox" :value="item" v-model="form.items" />
                    {{ item.name }} - RM {{ new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(item.price) }}
                </label>
                </div>
            </div>

             <div class="total-price">
                <h3>Total Price: RM {{ totalPrice }}</h3>
            </div>

            <InputError class="mt-2" :message="form.errors.total_price" />

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
