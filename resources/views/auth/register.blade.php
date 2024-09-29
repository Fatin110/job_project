<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>


    <form method="POST" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" required/>
                            <x-form-error name="first_name"/>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" required/>
                            <x-form-error name="last_name"/>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" required/>
                            <x-form-error name="email"/>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-label for="password">User Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required/>
                            <x-form-error name="password"/>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" type="password_confirmation" required/>
                            <x-form-error name="password_confirmation"/>
                        </div>
                    </div>

                </div>

                {{-- showing all the validation errors --}}
                {{-- <div class="mt-10">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500 font-extrabold">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div> --}}

            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

            <x-form-button>Register</x-form-button>
               </div>
    </form>


</x-layout>
