<div>
    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">{{Session::get('success')}}</span>
    </div>
    @elseif(Session::has('error'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">{{Session::get('error')}}</span>
    </div>
    @endif
</div>