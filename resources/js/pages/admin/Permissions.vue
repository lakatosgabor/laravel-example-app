<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import AdminLayout from '@/layouts/admin/Layout.vue';
import { views as permissions} from '@/routes/permissions';
import type { BreadcrumbItem } from '@/types';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();
const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: t('permissions'),
        href: permissions(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head :title="$t('permissions')" />

        <h1 class="sr-only">{{$t('permissions')}}</h1>

        <AdminLayout>
            <div class="flex flex-col space-y-6">
                <Heading
                    variant="small"
                    :title="$t('permissions')"
                    :description="$t('set_roles_and_permissions')"
                />      
            </div>
        </AdminLayout>
    </AppLayout>
</template>
