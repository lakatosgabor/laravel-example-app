<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import AdminLayout from '@/layouts/admin/Layout.vue';
import { views as permissions} from '@/routes/permissions';
import type { BreadcrumbItem } from '@/types';

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Permissions',
        href: permissions(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Permissions" />

        <h1 class="sr-only">Permissions</h1>

        <AdminLayout>
            <div class="flex flex-col space-y-6">
                <Heading
                    variant="small"
                    title="Permissions"
                    description="Set the roles and permissions"
                />      
            </div>
        </AdminLayout>
    </AppLayout>
</template>
