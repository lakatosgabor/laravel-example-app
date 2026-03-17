<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import type { BreadcrumbItem } from '@/types';
import { PageProps } from '@/types';
import DashboardNotify from '@/components/DashboardNotify.vue';
import BarChart from '@/components/BarChart.vue';

const page = usePage<PageProps>();
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
    },
];

interface Notification {
    id: string;
    data: {
        message: string;
    };
    created_at: string;
    read_at: string | null;
}

defineProps<{
    notifications: Notification[];
    chartData: Object,
}>();

</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
        >
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="shadow-sm sm:rounded-lg bg-white p-2 relative aspect-video rounded-xl border border-sidebar-border/70 dark:border-sidebar-border flex flex-col">
                    <DashboardNotify :notifications="notifications" />
                </div>
                <div
                    class="shadow-sm sm:rounded-lg bg-white p-2 relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    <button v-if="page.props.auth.user?.permissions.includes('*') || page.props.auth.user?.permissions.includes('read_dashboard')">
                        Jogosultsághoz teszt
                    </button>
                </div>
                <div
                    class="shadow-sm sm:rounded-lg bg-white p-2 relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    Grafikon
                    <div v-if="chartData">
                        <BarChart :chartData="chartData" />
                    </div>
                    <div v-else class="h-64 flex items-center justify-center text-gray-400">
                        Adatok betöltése...
                    </div>                
                </div>
            </div>
            <div
                class="shadow-sm sm:rounded-lg bg-white p-2 relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border"
            >
                Grafikon
                <div v-if="chartData">
                    <BarChart :chartData="chartData" />
                </div>
                <div v-else class="h-64 flex items-center justify-center text-gray-400">
                    Adatok betöltése...
                </div> 
                Grafikon
                <div v-if="chartData">
                    <BarChart :chartData="chartData" />
                </div>
                <div v-else class="h-64 flex items-center justify-center text-gray-400">
                    Adatok betöltése...
                </div> 
            </div>
            <div
                class="shadow-sm sm:rounded-lg bg-white p-2 relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border"
            >
                Grafikon
                <div v-if="chartData">
                    <BarChart :chartData="chartData" />
                </div>
                <div v-else class="h-64 flex items-center justify-center text-gray-400">
                    Adatok betöltése...
                </div> 
                Grafikon
                <div v-if="chartData">
                    <BarChart :chartData="chartData" />
                </div>
                <div v-else class="h-64 flex items-center justify-center text-gray-400">
                    Adatok betöltése...
                </div> 
            </div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="shadow-sm sm:rounded-lg bg-white p-2 relative aspect-video rounded-xl border border-sidebar-border/70 dark:border-sidebar-border flex flex-col">
                    <DashboardNotify :notifications="notifications" />
                </div>
                <div
                    class="shadow-sm sm:rounded-lg bg-white p-2 relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    <button v-if="page.props.auth.user?.permissions.includes('*') || page.props.auth.user?.permissions.includes('read_dashboard')">
                        Jogosultsághoz teszt
                    </button>
                </div>
                <div
                    class="shadow-sm sm:rounded-lg bg-white p-2 relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border"
                >
                    Grafikon
                    <div v-if="chartData">
                        <BarChart :chartData="chartData" />
                    </div>
                    <div v-else class="h-64 flex items-center justify-center text-gray-400">
                        Adatok betöltése...
                    </div>                
                </div>
            </div>
        </div>
    </AppLayout>
</template>
