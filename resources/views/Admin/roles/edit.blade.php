<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-start-1">
                        <h1 class="text-2xl">Edit Role</h1>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <form method="POST" action="{{route('roles.update',$role->id)}}"
                    onsubmit="return confirm('Do you want to save this?');">
                    @method('PUT')
                    @csrf
                    <div class="grid grid-cols-1">
                            <label class="form-label req">Role name</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name',$role->name) }}"
                                autocomplete="off">
                    </div>
                    <div class="grid grid-cols-1 overflow-auto mt-4">
                        <h2>Set Permissions</h2>
                        <table class="table-auto border-seperate border-spacing-36">
                            <thead class="bg-blue-700 text-white">
                                <tr class="text-center py-3">
                                    <th class="px-4 py-2">No</th>
                                    <th class="text-center px-4 py-2">MENU NAME</th>
                                    <th class="text-center px-4 py-2">ACCESS</th>
                                </tr>
                            </thead>
                            <?php $count = '1'; ?>
                            @foreach ($permissions as $item)
                            <tr>
                                <td class="text-center border py-3 px-3">{{ $count }}</td>
                                <td class="text-center  border py-3 px-3">{{ $item->name }}</td>

                                <td class="text-center border py-3 px-3">
                                    <label class="flex items-center space-x-2">
                                        <input
                                            type="checkbox"
                                            class="w-6 h-6 rounded border-gray-300 text-blue-600 focus:ring focus:ring-blue-300 open_check"
                                            value="{{$item->id}}"
                                            @if(count($role->permissions->where('id', $item->id))) checked @endif
                                        name="permissions[]">
                                    </label>
                                </td>
                            </tr>
                            <?php $count++; ?>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-full mt-3">
                            <x-primary-button class="py-3 w-full text-2xl">{{ __('Save') }}</x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>