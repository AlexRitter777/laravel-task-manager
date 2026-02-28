<x-layout-component>


    <div class="px-4 sm:px-6 lg:px-8">

        <x-success  :message="session('success')"/>

        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold text-gray-900 dark:text-white">All Tasks</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-confirm-button :href="route('tasks.create')">Add task</x-confirm-button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                    <div class="pl-3">
                        <x-search
                            :term="$term"
                            :status="$status"
                            :url="route('tasks.index')"
                        />
                    </div>

                    @if(count($tasks))
                    <table class="relative min-w-full divide-y divide-gray-300 dark:divide-white/15">
                        <thead>
                        <tr>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Task</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Status</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-white">Deadline at</th>
                            <th scope="col" class="py-3.5 pr-4 pl-3 sm:pr-0">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-white/10">

                            @foreach($tasks as $task)
                                <tr>
                                    <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">{{ $task->title }}</td>
                                    <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">{{ $task->status->label() }}</td>
                                    <td class="px-3 py-4 text-sm whitespace-nowrap text-gray-500 dark:text-gray-400">{{ $task->deadline_at->format('d.m.Y') }}</td>
                                    <td class="py-4 pr-4 pl-3 text-right text-sm font-medium whitespace-nowrap sm:pr-0">
                                        <a
                                            href="{{ route('tasks.edit', ['task' => $task]) }}"
                                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300"
                                        >
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $tasks->onEachSide(1)->appends(['q' => $term, 's' => $status])->links() }}
                    @else
                        <div class="pt-10 text-center">No tasks found...</div>
                    @endif
                </div>
            </div>
        </div>
    </div>



</x-layout-component>
