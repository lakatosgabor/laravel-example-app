<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import OvertimeLayout from '@/layouts/requiring_overtime/Layout.vue';
import { requests } from '@/routes/overtime';
import type { BreadcrumbItem } from '@/types';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();
const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Igényeim',
        href: requests(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Igényeim" />

        <h1 class="sr-only">Igényeim</h1>

        <OvertimeLayout>
            <div class="flex flex-col space-y-6">
                <Heading
                    variant="small"
                    title="Igényeim"
                    description="Itt tekinthetőek meg az igényeim, valamint azok státuszai és itt lehet leadni új igényeket is"
                />      
            </div>
        </OvertimeLayout>
    </AppLayout>
</template>
