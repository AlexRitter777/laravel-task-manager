@props([
    'title' => 'Title',
    'type' => 'text',
    'name' => '',
    'value' => ''
])

<div class="sm:col-span-3">
    <label for="name" class="block text-sm/6 font-medium text-gray-900 dark:text-white">
        {{ $title }}
    </label>
    <div class="mt-2">
        <input id="{{ $name }}"
               type="{{ $type }}"
               name="{{  $name }}"
               value="{{ $value }}"
               class="block w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:border-white/10 dark:placeholder:text-gray-500 dark:focus:border-indigo-500 dark:focus:ring-indigo-500"
        />
        @error($name)
        <span
            class="text-red-600 dark:text-red-400 text-sm mt-1 block"
        >
            {{ $message }}
        </span>
        @enderror
    </div>
</div>
