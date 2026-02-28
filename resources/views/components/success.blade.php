@props(['message'])

@if ($message)
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-green-900 dark:text-green-200 mt-3">
        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-7V7a1 1 0 112 0v4a1 1 0 01-2 0zm1 4a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
        </svg>
        <span class="font-medium">{{ $message }}</span>
    </div>
@endif
