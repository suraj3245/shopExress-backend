<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="col-6 col-md-3 my-3 clsx">
                        <?php
                        $BtnClrCLs = [
                            'success' => 'bg-blue-700 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded inline-flex items-center',
                            'danger' => 'bg-cyan-500 hover:bg-cyan-700 text-white font-semibold py-2 px-4 rounded inline-flex items-center',
                            'warning' => 'bg-rose-700 hover:bg-rose-500 text-white font-semibold py-2 px-4 rounded inline-flex items-center',
                            'primary' => 'bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded inline-flex items-center',
                            'info' => 'bg-orange-700 hover:bg-orange-500 text-white font-semibold py-2 px-4 rounded inline-flex items-center',
                            'dark' => 'bg-violet-700 hover:bg-violet-500 text-white font-semibold py-2 px-4 rounded inline-flex items-center',
                            'secondary' => 'bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded inline-flex items-center',
                        ];
                        ?>
                        <div class="grid xl:grid-cols-4 lg:grid-cols-4 gap-6 md:grid-cols-3 sm:grid-cols-3 grid-cols-2">
                            @foreach ($menus as $menu)
                            @can($menu['permission'])
                            <a href="{{ route($menu['link']) }}"
                                class="{{ $BtnClrCLs[array_rand($BtnClrCLs, 1)] }} an_Menu_btn text-center shadow-xl transition delay-150 duration-150 ease-in-out hover:-translate-y-1 hover:scale-110 hover:animate-pulse">
                                <div class="p-2 m-auto">
                                    <!-- <i class="ti ti-{{ $menu['icon'] }} text-lg"></i> -->
                                    <i class="fa-solid fa-user-check fa-3x"></i><br>
                                    <span>{{ $menu['name'] }}</span>
                                </div>
                            </a>
                            @endcan
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>