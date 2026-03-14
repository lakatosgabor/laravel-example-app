<script setup lang="ts">
import { usePage, Link } from '@inertiajs/vue3';
import { FolderGit2, LayoutGrid } from 'lucide-vue-next';
import AppLogo from '@/components/AppLogo.vue';
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import type { NavItem } from '@/types';
import { views as admin } from '@/routes/admin';

const page = usePage();
const user = page.props.auth?.user;
const isSuperAdmin = user.roles.includes('super-admin');

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Admin',
        href: admin(),
        icon: LayoutGrid,
    },
];

const footerNavItems: NavItem[] = [
        {
        title: 'GL solutions',
        href: "https://glsolutions.hu",
        icon: LayoutGrid,
    },
];

if (isSuperAdmin) {
  footerNavItems.push({
    title: 'System error logs',
    href: '/log-viewer',
    icon: FolderGit2,
  });
}

</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
