<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import AdminLayout from '@/layouts/admin/Layout.vue';
import { views as users} from '@/routes/users';
import type { BreadcrumbItem } from '@/types';
import { ref, watch } from 'vue';
import CreateUser from '@/components/CreateUser.vue';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();
const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: t('users'),
        href: users(),
    },
];

const props = defineProps<{
    users: any;
}>();

const serverOptions = ref({
    page: props.users.current_page,
    rowsPerPage: props.users.per_page,
});

const updateData = () => {
    router.get('/admin/users', {
        page: serverOptions.value.page,
        per_page: serverOptions.value.rowsPerPage,
    }, {
        preserveState: true,
        replace: true,
    });
};

watch(() => serverOptions.value.rowsPerPage, () => {
    serverOptions.value.page = 1;
}); 

watch(serverOptions, (value) => {
    updateData();
}, { deep: true });

const tableHeaders = [
    {text: t('name'), value: "name", sortable: true},
    {text: 'Email', value: "email"}, 
    {text: t('roles'), value: "roles"},
    {text: t('created_at'), value: "created_at", sortable: true}, 
];

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head :title="t('users')" />

        <h1 class="sr-only">{{ $t('users') }}</h1>

        <AdminLayout>
            <div class="flex flex-col space-y-6">
                <Heading
                    variant="small"
                    :title="$t('users')"
                    :description="$t('manage_users')"
                />      
            </div>
            <CreateUser />
            <EasyDataTable
                v-model:server-options="serverOptions"
                :headers="tableHeaders"
                :items="props.users.data"
                :server-items-length="props.users.total"
                :loading="false"
                buttons-pagination
            />
        </AdminLayout>
    </AppLayout>
</template>
