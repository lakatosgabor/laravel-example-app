<script setup lang="ts">
import { usePage, Link } from '@inertiajs/vue3';
import { LayoutGrid, ShieldHalf, ExternalLink, MonitorCog, MessagesSquare } from 'lucide-vue-next';
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
import { useI18n } from 'vue-i18n'

const page = usePage();
const user = page.props.auth?.user;
const isSuperAdmin = user.roles.includes('super-admin');
const { t } = useI18n();

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Admin',
        href: admin(),
        icon: ShieldHalf,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'GL solutions',
        href: "https://glsolutions.hu",
        icon: ExternalLink,
    },
    {
        title: 'Chat',
        href: "#",
        icon: MessagesSquare,
    },
];

if (isSuperAdmin) {
    footerNavItems.push({
        title: t('system_error_logs'),
        href: '/log-viewer',
        icon: MonitorCog,
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
