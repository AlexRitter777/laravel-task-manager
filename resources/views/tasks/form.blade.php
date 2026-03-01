<x-layout-component>


    <h2 class="text-base/7 font-semibold mb-3 text-gray-900 dark:text-white">
        @isset($task)
            Edit task - {{ $task->title }}
        @else
            Add new task
        @endisset
    </h2>

    <form
        method="POST"
        @isset($task)
            action="{{ route('tasks.update', $task->id) }}"
        @else
            action="{{ route('tasks.store') }}"
        @endisset
        class="bg-white shadow-xs outline outline-gray-900/5 sm:rounded-xl md:col-span-2 dark:bg-gray-800/50 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10"
    >
        @isset($task)
        <input type="hidden" name="_method" value="PUT">
        @endisset

        @csrf

        <div class="px-4 py-6 sm:p-8">
            <div class="mt-10 grid grid-cols-1 mb-10 gap-x-6 gap-y-8 ">

                <x-forms.input-text
                    title="Title"
                    name="title"
                    :value="old('title', $task->title ?? null)"
                />

                <x-forms.textarea
                    name="description"
                    label="Description"
                >
                    {{ old('description', $task->description ?? null) }}
                </x-forms.textarea>

                <x-forms.input-text
                    type="date"
                    title="Deadline at"
                    name="deadline_at"
                    :value="old('deadline_at', isset($task) ? $task->deadline_at->format('Y-m-d') : null)"
                />

            </div>
            <div
                class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8 dark:border-white/10">
                <a
                    href="{{ route('tasks.index') }}"
                    class="text-sm/6 font-semibold text-gray-900 dark:text-white"
                >
                    Back
                </a>

                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500">
                    Save
                </button>
                @isset($task)
                    <div
                        x-data="{confirmOpen: false}"
                        x-init="console.log('Alpine is running!')"
                    >
                        <button
                            type="button"
                            @click="confirmOpen = true"
                            class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 dark:bg-white/10 dark:text-white dark:shadow-none dark:inset-ring-white/5 dark:hover:bg-white/20"

                        >
                            Delete
                        </button>
                        <x-modal-confirm
                            :delete-path="route('tasks.destroy', $task->id)"
                        />
                    </div>
                @endisset
            </div>
        </div>
    </form>


</x-layout-component>

