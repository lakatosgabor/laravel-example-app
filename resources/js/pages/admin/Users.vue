<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import AdminLayout from '@/layouts/admin/Layout.vue';
import { views as users} from '@/routes/users';
import type { BreadcrumbItem } from '@/types';

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Users',
        href: users(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Users" />

        <h1 class="sr-only">Users</h1>

        <AdminLayout>
            <div class="flex flex-col space-y-6">
                <Heading
                    variant="small"
                    title="Users"
                    description="Manage your users"
                />      
            </div>
        </AdminLayout>
    </AppLayout>
</template>
