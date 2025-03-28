<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4">
                    <div class="btn-list col-start-1">
                        <h1>Add New</h1>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{route('permissions.update', $permission->id)}}">
            @method('PUT')
                @csrf
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h2 class="text-lg">Permission Name <span class="text-red-500">*</span></h2>
                    <div class="grid grid-cols-1">
                        <div class="input-group input-group-flat grid grid-cols-1">
                            <input type="text" name="name" id="item_name"  value="{{$permission->name}}" class="form-control grid grid-cols-1" required autocomplete="off">
                        </div>
                        @error('item_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-full mt-3">
                                <x-primary-button class="py-3 w-full text-2xl">{{ __('Save') }}</x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>