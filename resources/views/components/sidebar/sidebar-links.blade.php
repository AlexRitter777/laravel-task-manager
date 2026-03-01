<ul role="list" class="flex flex-1 flex-col gap-y-4">


    <li>
        <ul role="list" class="-mx-2 space-y-1">

            <x-sidebar.sidebar-link
                title="New task"
                :href="route('tasks.create')"
            >
                <x-icons.icon-plus
                    class="size-6 text-gray-400 group-hover:text-indigo-600 dark:group-hover:text-white"
                />
            </x-sidebar.sidebar-link>

            <x-sidebar.sidebar-link
                title="Tasks"
                :href="route('tasks.index')"
            >
                <x-icons.icon-documents
                    class="size-6 text-gray-400 group-hover:text-indigo-600 dark:group-hover:text-white"
                />
            </x-sidebar.sidebar-link>

        </ul>
    </li>
</ul>
