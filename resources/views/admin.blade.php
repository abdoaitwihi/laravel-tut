this is administarion
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link
        :href="route('logout')"
        onclick="event.preventDefault();
        this.closest('form').submit();"
    >
        {{ __("Log out") }}
    </x-dropdown-link>
</form>
