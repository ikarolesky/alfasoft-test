<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contacts') }}
        </h2>
        <a class="font-medium text-gray-900 whitespace-nowrap dark:text-white" href="{{route('contacts.create')}}">Create</a>
    </x-slot>
    <div class="container mx-auto">
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table id="search-table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        Name
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Email
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Contact
                                    </span>
                                </th>
                                @if(Auth::user())
                                <th>
                                    <span class="flex items-center">
                                        Actions
                                    </span>
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                @if(Auth::user())
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="{{ route('contacts.view', $contact->id) }}">{{$contact->name}}</a>
                                </td>
                                @else
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$contact->name}}</td>
                                @endif
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->contact}}</td>
                                @if(Auth::user())
                                <td>
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
                                            {{ __('X') }}    
                                            </x-primary-button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
