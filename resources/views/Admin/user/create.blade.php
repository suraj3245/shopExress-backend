<x-app-layout>
    <div class="py-12">
        @if (\Session::has('success'))
        <div class=" alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg text-center">
                <div class="grid grid-cols-1 gap-4">
                    <div class="col-start-1 col-end-3">
                        <h1 class="text-lg">Add New User</h1>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('subuser.store') }}" enctype="multipart/form-data"
                onsubmit="return confirm('Do you want to save this?');">
                @csrf
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="grid grid-cols-2 gap-1">
                        <div class="">
                            <label for="username" class="block text-sm/6 font-medium text-gray-900">Full Name<span class="text-red-800">*</span></label>
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="name" id="username" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="">
                            <label for="username" class="block text-sm/6 font-medium text-gray-900">Email<span class="text-red-800">*</span></label>
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                <input type="email" name="email" id="username" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Enter the Email">
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="password" class="block text-sm/6 font-medium text-gray-900">password<span class="text-red-800">*</span></label>
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">

                                <input type="password" name="password" id="password" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="password" class="block text-sm/5 font-medium text-gray-900">User Role<span class="text-red-800">*</span></label>
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <select name="roles" class="form-select" required style="width: 100%;">
                                    <option disabled selected>Choose Role</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-full mt-3">
                            <x-primary-button class="py-3 w-full text-2xl">{{ __('Submit') }}</x-primary-button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    </div>
</x-app-layout>