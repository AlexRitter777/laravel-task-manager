@props([
    'url' => '',
    'term' => '',
    'status' => ''

])

<div>
    <label for="search" class="block text-sm/6 font-medium text-gray-900 dark:text-white">Search and filters</label>
    <form action="{{ $url }}" method="GET">
        <div class="mt-2 flex justify-start">
            <input
                id="search"
                type="text"
                name="q"
                placeholder="Enter text..."
                value="{{ $term ?? '' }}"
                class="block w-96 rounded-md mr-3 bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500"
            />

            <div class="mr-3 w-32">
                <x-forms.select
                    name="s"
                    :status="$status"
                    :options="App\Enums\TaskStatus::values()"
                />
            </div>

            <input
                type="submit"
                class="rounded-md bg-indigo-600 px-3 mr-3 py-2 text-sm font-semibold text-white shadow-xs min-w-[70px] hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500"
                value="Find"

            >
            <a
                href="{{ $url }}"
                class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 dark:bg-white/10 dark:text-white dark:shadow-none dark:inset-ring-white/5 dark:hover:bg-white/20"
            >
                Refresh
            </a>
        </div>
    </form>
</div>
