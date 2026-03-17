<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import UsersController from '@/actions/App/Http/Controllers/Admin/UsersController';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import Input from '@/components/ui/input/Input.vue';
import {
    Dialog,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
    DialogTrigger,
} from '@/components/ui/dialog';
import { Label } from '@/components/ui/label';

</script>

<template>
    <div class="space-y-6">

            <Dialog>
                <DialogTrigger as-child>
                    <Button variant="default" data-test="create-user-button"
                        >{{ $t('create_user') }}</Button
                    >
                </DialogTrigger>
                <DialogContent>
                    <Form
                        v-bind="UsersController.store.form()"
                        reset-on-success
                        :options="{
                            preserveScroll: true,
                        }"
                        class="space-y-6"
                        v-slot="{ errors, processing, recentlySuccessful, reset, clearErrors }"
                    >
                        <DialogHeader class="space-y-3">
                            <DialogTitle
                                >{{ $t('create_user') }}</DialogTitle
                            >
                            <DialogDescription>
                                {{ $t('create_user_description') }}
                            </DialogDescription>
                        </DialogHeader>

                        <div class="grid gap-2">
                            <Label for="firstName" class="sr-only"
                                >{{ $t('first_name') }}</Label
                            >
                            <Input
                                id="firstName"
                                name="firstName"
                                ref="firstNameInput"
                                :placeholder="$t('first_name')"
                            />
                            <InputError :message="errors.firstName" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="lastName" class="sr-only"
                                >{{ $t('last_name') }}</Label
                            >
                            <Input
                                id="lastName"
                                name="lastName"
                                ref="lastNameInput"
                                :placeholder="$t('last_name')"
                            />
                            <InputError :message="errors.lastName" />
                        </div>

                        <div class="grid gap-2">
                            <Label for="email" class="sr-only"
                                >Email</Label
                            >
                            <Input
                                id="email"
                                name="email"
                                ref="emailInput"
                                placeholder="Email"
                            />
                            <InputError :message="errors.email" />
                        </div>

                        <DialogFooter class="gap-2">
                            <DialogClose as-child>
                                <Button
                                    variant="secondary"
                                    @click="
                                        () => {
                                            clearErrors();
                                            reset();
                                        }
                                    "
                                >
                                    {{ $t('cancel') }}
                                </Button>
                            </DialogClose>

                            <Button
                                type="submit"
                                variant="default"
                                :disabled="processing"
                                data-test="confirm-create-user-button"
                            >
                                {{ $t('save') }}
                            </Button>

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
                                {{ $t('saved') }}
                            </p>
                        </Transition>
                        </DialogFooter>
                    </Form>
                </DialogContent>
            </Dialog>
    </div>
</template>
