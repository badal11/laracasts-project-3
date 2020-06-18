<div class="flex items-center mb-1">
    <div class="text-orange-600">
        <svg class="fill-current h-6 w-6 z-10" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m4.5 6.25v-4.5c0-.26.03-.51.1-.75h-2.85c-.96 0-1.75.79-1.75 1.75v4.5c0 .96.79 1.75 1.75 1.75h.37l1.28 1.7c.14.18.35.29.57.3h.03c.22 0 .42-.09.56-.26l1.5-1.71c-.93-.58-1.56-1.61-1.56-2.78z"/><path d="m22.25 1h-2.85c.07.24.1.49.1.75v4.5c0 1.17-.63 2.2-1.56 2.78l1.5 1.71c.14.17.34.26.56.26h.03c.22-.01.43-.12.57-.3l1.27-1.7h.38c.96 0 1.75-.79 1.75-1.75v-4.5c0-.96-.79-1.75-1.75-1.75z"/><path d="m12 10c-.009 0-.019 0-.028 0-.226-.009-.436-.119-.572-.3l-1.275-1.7h-2.375c-.965 0-1.75-.785-1.75-1.75v-4.5c0-.965.785-1.75 1.75-1.75h8.5c.965 0 1.75.785 1.75 1.75v4.5c0 .965-.785 1.75-1.75 1.75h-2.16l-1.526 1.744c-.142.163-.348.256-.564.256z"/><circle cx="4" cy="15" r="2"/><path d="m6.67 18.4c-1.01.76-1.67 1.98-1.67 3.35v.25h-4.25c-.41 0-.75-.34-.75-.75v-.5c0-1.52 1.23-2.75 2.75-2.75h2.5c.52 0 1.01.15 1.42.4z"/><circle cx="20" cy="15" r="2"/><path d="m24 20.75v.5c0 .41-.34.75-.75.75h-4.25v-.25c0-1.37-.66-2.59-1.67-3.35.41-.25.9-.4 1.42-.4h2.5c1.52 0 2.75 1.23 2.75 2.75z"/><circle cx="12" cy="14.5" r="3"/><path d="m14.75 19h-5.5c-1.517 0-2.75 1.233-2.75 2.75v1.5c0 .414.336.75.75.75h9.5c.414 0 .75-.336.75-.75v-1.5c0-1.517-1.233-2.75-2.75-2.75z"/></svg>
    </div>
    <div class="flex-1 ml-4 font-bold">
        {{ $action->created_at->format('M d, g:i a') }}
    </div>
</div>
<div class="ml-12">
    {{ ucwords($user->name) }} {{ $action->description }} {{ $action->subject_type }}
    @if (isset($action->subject))
        <a href="{{ route('threads.filter', [$action->subject]) }}" class="text-blue-500 hover:text-blue-300 italic">{{ $action->subject->name }}</a>
    @else
        <span class="italic">"{{ json_decode($action->changes, true)['attributes']['name'] }}"</span>
    @endif
</div>
