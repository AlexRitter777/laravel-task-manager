<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col dark:bg-gray-900">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4 dark:border-white/10 dark:bg-black/10">
        <div class="flex h-16 shrink-0 items-center">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" class="h-8 w-auto dark:hidden" />
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="h-8 w-auto not-dark:hidden" />
        </div>
        <nav class="flex flex-1 flex-col">
            <x-sidebar.sidebar-links/>
        </nav>
    </div>
</div>
