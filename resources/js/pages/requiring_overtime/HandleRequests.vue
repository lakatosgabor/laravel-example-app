<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import OvertimeLayout from '@/layouts/requiring_overtime/Layout.vue';
import { handleRequests } from '@/routes/overtime';
import type { BreadcrumbItem } from '@/types';
import { useI18n } from 'vue-i18n';

const { t } = useI18n();
const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Igénylések kezelése',
        href: handleRequests(),
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Igénylések kezelése" />

        <h1 class="sr-only">Igénylések kezelése</h1>

        <OvertimeLayout>
            <div class="flex flex-col space-y-6">
                <Heading
                    variant="small"
                    title="Igénylések kezelése"
                    description="HR jogosult felhasználók itt tekinthetik meg a beérkezett túlóra igényléseket és kezelhetik azokat"
                />      
            </div>
        </OvertimeLayout>
    </AppLayout>
</template>
