<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import AdminLayout from '@/layouts/admin/Layout.vue';
import { views as admin} from '@/routes/admin';
import type { BreadcrumbItem } from '@/types';

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Admin panel',
        href: admin(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Admin panel" />

        <h1 class="sr-only">Admin panel</h1>

        <AdminLayout>
            <div class="flex flex-col space-y-6">
                <Heading
                    variant="small"
                    title="Admin activites"
                    description="Administraton your application"
                />      
            </div>
        </AdminLayout>
    </AppLayout>
</template>
