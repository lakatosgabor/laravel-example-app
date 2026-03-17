<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import AdminLayout from '@/layouts/admin/Layout.vue';
import { views as activities} from '@/routes/activities';
import type { BreadcrumbItem } from '@/types';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();
const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: t('activities'),
        href: activities(),
    },
];

const props = defineProps({
  activities: Object,
  default: () => ({})
});

const headers = [
  { text: t('created_at'), value: "created_at", sortable: true },
  { text: t('description'), value: "description" },
  { text: t('causer'), value: "causer" },
  { text: t('subject_type'), value: "subject_type" },
  { text: t('properties'), value: "properties" },
];

const getStatusClass = (desc: string) => {
  switch (desc) {
    case 'created': return 'bg-green-100 text-green-700';
    case 'updated': return 'bg-blue-100 text-blue-700';
    case 'deleted': return 'bg-red-100 text-red-700';
    default: return 'bg-gray-100 text-gray-700';
  }
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head :title="$t('activities')" />

        <h1 class="sr-only">{{ $t('activities') }}</h1>

        <AdminLayout>
            <div class="flex flex-col space-y-6">
                <Heading
                    variant="small"
                    :title="$t('activities')"
                    :description="$t('activities_desc')"
                />      
            </div>

            <EasyDataTable
                :headers="headers"
                :items="props.activities.data"
                :server-items-length="props.activities.total"
                buttons-pagination
            >
                <template #item-description="item">
                    <span :class="getStatusClass(item.description)" class="px-2 py-1 rounded text-xs font-bold uppercase">
                    {{ item.description }}
                    </span>
                </template>

                <template #item-causer="item">
                    {{ item.causer ? item.causer.name : 'Rendszer' }}
                </template>

                <template #item-properties="item">
                    <div v-if="item.properties.attributes" class="text-xs">
                    <div v-for="(value, key) in item.properties.attributes" :key="key">
                        <strong>{{ key }}:</strong> {{ value }}
                        <span v-if="item.properties.old" class="text-gray-400 italic">
                        (volt: {{ item.properties.old[key] }})
                        </span>
                    </div>
                    </div>
                    <span v-else class="text-gray-400 italic">{{ $t('no_details') }}</span>
                </template>

                <template #item-created_at="item">
                    {{ new Date(item.created_at).toLocaleString('hu-HU') }}
                </template>
            </EasyDataTable>

        </AdminLayout>
    </AppLayout>
</template>
