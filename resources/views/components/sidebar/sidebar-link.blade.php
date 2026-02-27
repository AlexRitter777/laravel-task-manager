@props([
    'href' => '#',
    'title' => ''
])

<li>
    <!-- Current: "bg-gray-50 dark:bg-white/5 text-indigo-600 dark:text-white", Default: "text-gray-700 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-white hover:bg-gray-50 dark:hover:bg-white/5" -->
    <a
        href="{{ $href }}"
        class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold text-gray-700 hover:bg-gray-50 hover:text-indigo-600 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white"
    >
        {{$slot}}
        {{$title}}
    </a>
</li>

