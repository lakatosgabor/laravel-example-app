<script setup lang="ts">
import { Form, Head } from '@inertiajs/vue3';
import Heading from '@/components/Heading.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { edit } from '@/routes/language';
import type { BreadcrumbItem } from '@/types';
import LanguageController from '@/actions/App/Http/Controllers/Settings/LanguageController';
import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';
import InputError from '@/components/InputError.vue';
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectLabel,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select"

const breadcrumbItems: BreadcrumbItem[] = [
    {
        title: 'Language settings',
        href: edit(),
    },
];

const items = [
  { label: "Magyar", value: "hu" },
  { label: "English", value: "en" },
]

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbItems">
        <Head title="Language settings" />

        <SettingsLayout>
            <div class="space-y-6">
                <Heading
                    variant="small"
                    title="Language settings"
                    description="Update your account's language settings"
                />
                <Form
                    v-bind="LanguageController.update.form()"
                    :options="{
                        preserveScroll: true,
                    }"
                    reset-on-success
                    :reset-on-error="[
                        'language',
                    ]"
                    class="space-y-6"
                    v-slot="{ errors, processing, recentlySuccessful }"
                >
                    <div class="grid gap-2">
                        <Select name="language">
                            <SelectTrigger class="w-full max-w-xs">
                                <SelectValue placeholder="Choose language" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectGroup>
                                    <SelectLabel>Languages</SelectLabel>
                                    <SelectItem v-for="item in items" :key="item.value" :value="item.value">
                                    {{ item.label }}
                                    </SelectItem>
                                </SelectGroup>
                            </SelectContent>
                        </Select>
                        <InputError :message="errors.language" />
                    </div>

                    <div class="flex items-center gap-4">
                        <Button
                            :disabled="processing"
                            data-test="update-language-button"
                            >Save</Button
                        >

                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                            <p
                                v-show="recentlySuccessful"
                                class="text-sm text-neutral-600"
                            >
                                Saved.
                            </p>
                        </Transition>
                    </div>
                </Form>
            </div>
        </SettingsLayout>
    </AppLayout>
</template>
