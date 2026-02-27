<div class="sticky top-0 z-40 lg:mx-auto lg:max-w-7xl lg:px-8">
    <div class="flex h-16 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-xs sm:gap-x-6 sm:px-6 lg:px-0 lg:shadow-none dark:border-white/10 dark:bg-gray-900 dark:shadow-none">
        <button type="button" command="show-modal" commandfor="sidebar" class="-m-2.5 p-2.5 text-gray-700 hover:text-gray-900 lg:hidden dark:text-gray-400 dark:hover:text-white">
            <span class="sr-only">Open sidebar</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>

        <!-- Separator -->
        <div aria-hidden="true" class="h-6 w-px bg-gray-200 lg:hidden dark:bg-gray-700"></div>

        <div class="flex flex-1 justify-end gap-x-4 self-stretch lg:gap-x-6">

            <div class="flex items-center gap-x-4 lg:gap-x-6">

                <!-- Separator -->
                <div aria-hidden="true" class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-200 dark:lg:bg-white/10"></div>

                <!-- Profile dropdown -->
                <el-dropdown class="relative">
                    <button class="relative flex items-center">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" class="h-7"  alt="{{ auth()->user()->name }}"/>
                        <span class="hidden lg:flex lg:items-center">
                <span aria-hidden="true" class="ml-4 text-sm/6 font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="ml-2 size-5 text-gray-400">
                  <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                </svg>
              </span>
                    </button>
                    <el-menu anchor="bottom end" popover class="w-32 origin-top-right rounded-md bg-white py-2 shadow-lg outline-1 outline-gray-900/5 transition transition-discrete [--anchor-gap:--spacing(2.5)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in dark:bg-gray-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10">
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block px-3 w-full text-left py-1 text-sm/6 hover:cursor-pointer text-gray-900 focus:bg-gray-50 focus:outline-hidden dark:text-white dark:focus:bg-gray-700"> Sign out </button>
                        </form>
                    </el-menu>
                </el-dropdown>
            </div>
        </div>
    </div>
</div>
