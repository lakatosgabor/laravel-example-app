<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import { useCurrentUrl } from '@/composables/useCurrentUrl';
import { toUrl } from '@/lib/utils';
import type { NavItem } from '@/types';
import { useI18n } from 'vue-i18n';
import { requests } from '@/routes/overtime';
import { handleRequests } from '@/routes/overtime';
import { views as overtime } from '@/routes/overtime';

const { t } = useI18n();

const sidebarNavItems: NavItem[] = [
    {
        title: "Túlóra igénylő",
        href: overtime(),
    },
    {
        title: "Igényeim",
        href: requests(),
    },
    {
        title: "Igénylések kezelése",
        href: handleRequests(),
    },
];

const { isCurrentOrParentUrl } = useCurrentUrl();
</script>

<template>
    <div class="px-4 py-6 md:px-8">
        <Heading
            title="Túlóra igénylő"
            description="Túlóra igénylések kezelése"
        />

        <div class="flex flex-col lg:flex-row lg:space-x-12 mt-6">
            <aside class="w-full lg:w-40 flex-shrink-0">
                <nav
                    class="flex flex-col space-y-1"
                    aria-label="Settings"
                >
                    <Button
                        v-for="item in sidebarNavItems"
                        :key="toUrl(item.href)"
                        variant="ghost"
                        :class="[
                            'w-full justify-start',
                            { 'bg-muted': isCurrentOrParentUrl(item.href) },
                        ]"
                        as-child
                    >
                        <Link :href="item.href">
                            <component :is="item.icon" v-if="item.icon" class="mr-2 h-4 w-4" />
                            {{ item.title }}
                        </Link>
                    </Button>
                </nav>
            </aside>

            <Separator class="my-6 lg:hidden" />

            <div class="flex-1 "> 
                <section class="space-y-6">
                    <slot />
                </section>
            </div>
        </div>
    </div>
</template>
