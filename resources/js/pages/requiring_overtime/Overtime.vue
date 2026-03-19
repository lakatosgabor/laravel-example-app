<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import OvertimeLayout from '@/layouts/requiring_overtime/Layout.vue';
import { views as overtime } from '@/routes/overtime';
import type { BreadcrumbItem } from '@/types';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Túlóra igénylő',
        href: overtime(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Admin panel" />

        <h1 class="sr-only">Túlóra igénylő</h1>

        <OvertimeLayout>
            <div class="flex flex-col space-y-6">
                <Heading
                    variant="small"
                    title="Túlóra igénylő"
                    description="Túlóra igénylések kezelése"
                />      
            </div>
        </OvertimeLayout>
    </AppLayout>
</template>
