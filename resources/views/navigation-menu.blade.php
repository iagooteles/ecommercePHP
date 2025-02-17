<nav class="flex justify-end ">
    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf

        <button type="submit" 
                class="btn btn-link text-danger text-sm font-weight-bold hover:text-gray-700 focus:outline-none active:bg-transparent logout-btn">
            {{ __('Logout') }}
        </button>
    </form>
</nav>
