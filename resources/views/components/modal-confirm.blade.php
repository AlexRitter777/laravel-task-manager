@props([
    'deletePath' => '',
])

<div
    x-show="confirmOpen"
    x-cloak
    class="fixed inset-0 flex items-center justify-center bg-gray-900/50 backdrop-blur-sm z-50"
>
    <div
        @click.away="confirmOpen = false"
        class="bg-white dark:bg-gray-800 rounded-xl shadow-lg w-full max-w-sm p-6"
    >
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
            Confirm deletion
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            Are you sure you want to delete this contact?
        </p>

        <div class="mt-6 flex justify-end gap-3">

            <form action="{{ $deletePath  }}">
                @csrf
                @method('DELETE')
                <button
                    type="button"
                    @click="confirmOpen = false"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400 dark:bg-red-500 dark:hover:bg-red-400"
                >
                    Yes, delete
                </button>
            </form>

        </div>
    </div>
</div>
