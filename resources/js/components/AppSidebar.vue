<script setup lang="ts">
import { usePage, Link } from '@inertiajs/vue3';
import { LayoutGrid, ShieldHalf, ExternalLink, MonitorCog, IdCardLanyard, ClipboardClock,
    Contact, Network, GlobeLock, NotebookPen, GraduationCap, Key, PiggyBank, ScrollText } from 'lucide-vue-next';
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
import { views as overtime } from '@/routes/overtime';
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
    {
        title: 'Látogató lista',
        href: "#",
        icon: IdCardLanyard,
    },
    {
        title: 'Túlóra igénylő',
        href: overtime(),
        icon: ClipboardClock,
    },
    {
        title: 'Munkaerő igénylő',
        href: "#",
        icon: Contact,
    },
    {
        title: 'Kölcsönzött munkaerő',
        href: "#",
        icon: Network,
    },
    {
        title: 'Belső változás kezelés',
        href: "#",
        icon: GlobeLock,
    },
        {
        title: 'LMS',
        href: "#",
        icon: NotebookPen,
    },
    {
        title: 'Képzés igénylő',
        href: "#",
        icon: ScrollText,
    },
    {
        title: 'ATS',
        href: "#",
        icon: GraduationCap,
    },
    {
        title: 'KPI menedzsment',
        href: "#",
        icon: Key,
    },
    {
        title: 'E-számla kezelő',
        href: "#",
        icon: PiggyBank,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'GL solutions',
        href: "https://glsolutions.hu",
        icon: ExternalLink,
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
        <hr>
        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
