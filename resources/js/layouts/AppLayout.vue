<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItem } from '@/types';
import { onMounted } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";

type Props = {
    breadcrumbs?: BreadcrumbItem[];
};

const page = usePage();
const toast = useToast();

onMounted(() => {
    const user = page.props.auth.user;
    if (user && window.Echo) {
        window.Echo.private(`App.Models.User.${user.id}`)
            .notification((notification: any) => {
                const message = notification.message;
                const style = notification.style || 'info';

                router.reload({ 
                    only: ['notifications'],
                    preserveScroll: true
                });

                if (typeof (toast as any)[style] === 'function') {
                    (toast as any)[style](message);
                } else {
                    toast(message);
                }
            });
    }
});

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <slot />
    </AppLayout>
</template>