<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show ') }} {{$contact['name']}}
        </h2>
        <div class="container mx-auto flex items-center justify-center">
            <form action="{{route('contacts.edit', $contact->id)}}">
                <x-primary-button class="ms-4 danger">
                {{ __('Edit') }}
                </x-primary-button>
            </form>
            <form action="{{route('contacts.delete', $contact->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <x-primary-button class="ms-4 danger">
                {{ __('Delete') }}    
                </x-primary-button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="container mx-auto flex items-center justify-center">
                            <div class="basis-1 px-4">
                                <x-input-label for="name" :value="__('Name')"></x-input-label>
                                <x-text-input id="name" name="name" class="block mt-1" value="{{$contact['name']}}" disabled />
                            </div>
                        </div>
                        <div class="container mx-auto flex items-center justify-center mt-4">
                            <div class="basis-1 px-4">
                                <x-input-label for="contact" :value="__('Contact')" />
                                <x-text-input id="contact" name="contact" class="block mt-1" value="{{$contact['contact']}}" disabled  />
                            </div>
                        </div>
                        <div class="container mx-auto flex items-center justify-center mt-4">
                            <div class="basis-1 px-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" class="block mt-1" value="{{$contact['email']}}" disabled  />
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
