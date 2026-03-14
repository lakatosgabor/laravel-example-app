<script setup lang="ts">
import { router } from '@inertiajs/vue3';

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
}>();

const markAsRead = (id: string) => {
    router.post(`/notifications/${id}/mark-as-read`, {}, {
        preserveScroll: true,
    });
};
</script>

<template>
    <div class="flex flex-col h-full">
        <h3 class="text-lg font-bold mb-4 flex items-center shrink-0">
            <span class="mr-2">🔔</span> Értesítések
        </h3>

        <div class="overflow-y-auto flex-1 pr-2 custom-scrollbar">
            <div v-if="notifications.length > 0" class="divide-y divide-gray-100">
                <div 
                    v-for="notif in notifications" 
                    :key="notif.id" 
                    class="py-3 flex items-start justify-between group border-b last:border-0 border-gray-50"
                >
                    <div class="flex flex-col pr-2">
                        <p :class="['text-sm', notif.read_at ? 'text-gray-500' : 'text-gray-900 font-medium leading-tight']">
                            {{ notif.data.message }}
                        </p>
                        <span class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider">
                            {{ notif.created_at }}
                        </span>
                    </div>

                    <button 
                        v-if="!notif.read_at" 
                        @click="markAsRead(notif.id)"
                        class="shrink-0 text-[10px] font-bold bg-blue-50 text-blue-600 px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity"
                    >
                        OLVASOTT
                    </button>
                </div>
            </div>

            <div v-else class="h-full flex items-center justify-center text-gray-500 text-sm italic">
                Nincsenek új értesítéseid.
            </div>
        </div>
    </div>
</template>