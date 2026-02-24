@php $extension = pathinfo($document->file_path, PATHINFO_EXTENSION); @endphp

@if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
<div class="flex justify-center items-center h-full bg-gray-50 dark:bg-gray-900 rounded-[2rem] overflow-auto">
    <img src="{{ asset('storage/' . $document->file_path) }}" class="max-h-full rounded-lg shadow-md">
</div>
@else
<iframe src="{{ asset('storage/' . $document->file_path) }}#toolbar=0" class="w-full h-full rounded-[2rem] border-none"></iframe>
@endif
