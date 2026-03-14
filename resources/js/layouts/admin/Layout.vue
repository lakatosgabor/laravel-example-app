<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import { useCurrentUrl } from '@/composables/useCurrentUrl';
import { toUrl } from '@/lib/utils';
import { views as admin } from '@/routes/admin';
import { views as permissions } from '@/routes/permissions';
import { views as users } from '@/routes/users';
import type { NavItem } from '@/types';


const sidebarNavItems: NavItem[] = [
    {
        title: 'Admin panel',
        href: admin(),
    },
    {
        title: 'Users',
        href: users(),
    },
    {
        title: 'Permissions',
        href: permissions(),
    },
];

const { isCurrentOrParentUrl } = useCurrentUrl();
</script>

<template>
    <div class="px-4 py-6 md:px-8">
        <Heading
            title="Admin panel"
            description="Manage your users and permissions settings"
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
