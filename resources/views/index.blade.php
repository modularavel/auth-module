<x-auth::layouts.master>
    <div class="flex flex-col items-center justify-center">
        <h1 class="text-4xl font-bold mb-5">{!! config('auth.name') !!}</h1>
        <p class="text-lg text-zinc-500 mb-5">{{ Module::find('Auth')->getComposerAttr('name') }} v{{ Module::find('Larabase')->getComposerAttr('version') }}</p>
        <p class="text-sm text-zinc-500">Laravel: {{ app()->version() }}</p>
    </div>
</x-auth::layouts.master>
