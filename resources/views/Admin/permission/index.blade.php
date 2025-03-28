<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4">
                    <div class="btn-list col-end-8">
                        @can('Sub Users-create')
                        <a href="{{route('permissions.create')}}" class="bg-blue-700 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Add New Permission
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h2 class="text-lg">Permissions List</h2>
                <div class="grid grid-cols-1 overflow-auto">
                    <table class="table">
                        <thead class="bg-blue-700 text-white">
                            <tr class="text-center py-3">
                                <th class="px-4 py-2">No</th>
                                <th class="text-center px-4 py-2">Name</th>
                                <th class="text-center px-4 py-2" width="100px">Edit</th>
                                <th class="text-center px-4 py-2" width="100px">Delete</th>
                            </tr>
                        </thead>
                        <?php $count = '1'; ?>
                        @foreach ($permission as $item)
                        <tr>
                            <td class="text-center border px-2 py-2">{{ $count }}</td>
                            <td class="text-center border">{{ $item->name }}</td>
                            <td class="text-center border">
                                @can('User Roles-edit')<a
                                    href="{{route('permissions.edit',$item->id)}}"
                                    class="btn btn-warning" style="color: #000">
                                    <i class="fa-solid fa-pen-to-square text-blue-600"></i></a>
                                @endcan
                            </td>
                            <td class="text-center border">
                                @can('User Roles-delete')
                                <form action="{{route('permissions.destroy',$item->id)}}"
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('{{ __(`Are you sure you want to delete?`) }}')">
                                        <i class="fa-solid fa-trash text-red-600"></i>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        <?php $count++; ?>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>