<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => '
                inline-flex 
                items-center 
                justify-center
                px-6 
                py-3 
                bg-red-600
                from-red-600
                rounded-lg 
                font-bold 
                text-sm 
                text-white 
                uppercase 
                tracking-wide 
                shadow-lg 
                hover:shadow-xl 
                hover:bg-gradient-to-r 
                hover:from-red-800 
                focus:outline-none 
                focus:ring-2 
                focus:ring-red-800 
                focus:ring-offset-2 
                transition-all 
                duration-300 
                ease-in-out',
    ]) }}>
    {{ $slot }}
</button>
