@if ($errors->any())
    <div class="my-3 py-2 px-2 border border-red-500 bg-red-100 text-red-700 rounded-md">
        <strong>Whoops!</strong> Something went wrong:
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
