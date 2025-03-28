<x-app-layout>
    <!-- <div class="an-pre-loader"></div> -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="page">
                <div class="page-wrapper">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg text-center">
                        <div class="grid grid-cols-1 gap-4">
                            <div class="col-start-1 col-end-3">
                                <h1 class="text-lg">Add New Role</h1>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg text-center">
                        <div class="grid grid-cols-1 gap-4">

                            <form method="POST" action="{{route('roles.store')}}" enctype="multipart/form-data"
                                onsubmit="return confirm('Do you want to save this?');">
                                @csrf
                                <div class="grid grid-cols-1">
                                    <div class="grid grid-cols-1">
                                            <label class="form-label req">Role name</label>
                                            <div class="input-group input-group-flat">
                                                <input type="text" name="name" class="form-control" required
                                                    autocomplete="off">
                                            </div>
                                    </div>
                                    <table
                                        class="table-auto border-seperate border-spacing-36 mt-3"
                                        id="resultTable">
                                        <thead class="bg-blue-700 text-white">
                                            <tr>
                                                <th class="text-center px-4 py-2">No</th>
                                                <th class="text-center px-4 py-2">Menu Name</th>
                                                <th class="text-center px-4 py-2">OPEN ACCESS</th>
                                                <th class="text-center px-4 py-2">View ACCESS</th>
                                                <th class="text-center px-4 py-2">CREATE ACCESS</th>
                                                <th class="text-center px-4 py-2">EDIT ACCESS</th>
                                                <th class="text-center px-4 py-2">DELETE ACCESS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1; ?>
                                            @foreach ($menus as $menu)
                                            <tr>
                                                <td class="text-center px-4 py-3 border"><span class="text-muted">{{ $count }}</span></td>
                                                <td class="text-center px-4 py-3 border">{{ $menu->name }}</td>
                                                <td class="text-center px-4 py-3 border">
                                                    <label class="form-check form-check-single form-switch">
                                                        <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-open" name="permissions[]">
                                                    </label>
                                                </td>
                                                <td class="text-center px-4 py-3 border">
                                                    <label class="form-check form-check-single form-switch">
                                                        <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-view" name="permissions[]">
                                                    </label>
                                                </td>
                                                <td class="text-center px-4 py-3 border">
                                                    <label class="form-check form-check-single form-switch">
                                                        <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-create" name="permissions[]">
                                                    </label>
                                                </td>
                                                <td class="text-center px-4 py-3 border">
                                                    <label class="form-check form-check-single form-switch">
                                                        <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-edit" name="permissions[]">
                                                    </label>
                                                </td>
                                                <td class="text-center px-4 py-3 border">
                                                    <label class="form-check form-check-single form-switch">
                                                        <input class="form-check-input btn btn-lg" type="checkbox" value="{{ $menu->name }}-delete" name="permissions[]">
                                                    </label>
                                                </td>
                                            </tr>
                                            <?php $count++; ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="grid grid-cols-1 mt-4">
                                            <x-primary-button class="py-3 w-full text-2xl" type="submit">{{ __('Submit') }}</x-primary-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        $("#clickItem").change(function() {
            var element = $(this).find('option:selected');
            var product_id = element.attr("value");
            var size_name = element.attr("cick_code");
            var item_name = element.text();


            $("#item_name").val(item_name);
            $("#item_nameSize").text(size_name);
        })

        $(".open_check").click(function() {
            var now = $(this).parent("td label").find(".open_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".open_access").val("active");
            } else {
                $(this).parent("td label").find(".open_access").val("block");
            }
        })


        $(".view_check").click(function() {
            var now = $(this).parent("td label").find(".view_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".view_access").val("active");
            } else {
                $(this).parent("td label").find(".view_access").val("block");
            }
        })

        $(".create_check").click(function() {
            var now = $(this).parent("td label").find(".create_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".create_access").val("active");
            } else {
                $(this).parent("td label").find(".create_access").val("block");
            }
        })

        $(".edit_check").click(function() {
            var now = $(this).parent("td label").find(".edit_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".edit_access").val("active");
            } else {
                $(this).parent("td label").find(".edit_access").val("block");
            }
        })

        $(".delete_check").click(function() {
            var now = $(this).parent("td label").find(".delete_access").val();
            if (now == 'block') {
                $(this).parent("td label").find(".delete_access").val("active");
            } else {
                $(this).parent("td label").find(".delete_access").val("block");
            }
        })
    </script> -->
</x-app-layout>