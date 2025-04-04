<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="container mx-auto flex items-center justify-center">
                            <div class="basis-1 px-4">
                                <x-input-label for="name" :value="__('Name')"></x-input-label>
                                <x-text-input id="name" name="name" class="block mt-1" />
                                <span><x-input-error class="mt-2" :messages="$errors->get('name')" /></span>
                            </div>
                        </div>
                        <div class="container mx-auto flex items-center justify-center mt-4">
                            <div class="basis-1 px-4">
                                <x-input-label for="contact" :value="__('Contact')" />
                                <x-text-input id="contact" name="contact" class="block mt-1" />
                                <span><x-input-error class="mt-2" :messages="$errors->get('contact')" /></span>
                            </div>
                        </div>
                        <div class="container mx-auto flex items-center justify-center mt-4">
                            <div class="basis-1 px-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" class="block mt-1" />
                                <span><x-input-error class="mt-2" :messages="$errors->get('email')" /></span>
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
