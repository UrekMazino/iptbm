@props([
    'loadingLabel'=>'Processing...',
])

<div>
    <button {{ $attributes->merge([
'class' => 'inline-flex items-center px-4 py-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs w-full sm:w-auto  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800  uppercase tracking-widest shadow-sm disabled:opacity-25 transition ease-in-out duration-150']) }}>
        {{ ($slot)? : $loadingLabel}}
    </button>

</div>

