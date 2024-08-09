<nav x-data="{ open: false }" class="border-b">
    <!-- Primary Navigation Menu -->
    <div class="container">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex items-center shrink-0 me-6">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block w-auto fill-current h-9"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="items-center hidden gap-2 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                        {{ __('Users') }}
                    </x-nav-link>
                </div>
            </div>

            <x-theme-toggle class="mx-2 ms-auto"/>

            <!-- Settings Dropdown -->
            <div class="flex items-center justify-end gap-3">
                <div class="hidden sm:flex sm:items-center">
                    @guest
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-nav-link>
                    @endguest
                    @auth
                        <x-dropdown class="w-48" align="right">
                            <x-slot name="trigger">
                                <div class="p-2 border rounded-full size-10">
                                    <x-lucide-user-circle class="stroke-1 text-muted-foreground"/>
                                </div>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Profile -->
                                <x-dropdown.label>
                                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                                    <span class="text-sm">{{ Auth::user()->email }}</span>
                                </x-dropdown.label>
                                <hr/>
                                <x-dropdown.link :href="route('profile.edit')">
                                    <x-lucide-settings-2 class="mr-2"/>
                                    {{ __('Profile') }}
                                </x-dropdown.link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown.link :href="route('logout')"
                                                     onclick="event.preventDefault(); this.closest('form').submit();">
                                        <x-lucide-log-out class="mr-2"/>
                                        {{ __('Log Out') }}
                                    </x-dropdown.link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <x-button x-data="" x-on:click.prevent="$dispatch('open-drawer', 'navigation')"
                          variant="outline" size="icon">
                    <x-lucide-menu class="w-6 h-6"/>
                </x-button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <x-drawer side="right" name="navigation" class="sm:hidden">
        <!-- Responsive Settings Options -->
        <div class="px-2 space-y-1">
            @guest
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    <x-lucide-settings/>
                    {{ __('Login') }}
                </x-nav-link>
            @endguest
            @auth
                <div class="flex flex-row items-center gap-2 py-2 mb-2 border-b">
                    <div class="p-2 border rounded-full size-10">
                        <x-lucide-user-circle class="stroke-1 text-muted-foreground"/>
                    </div>
                    <div class="flex flex-col gap-0.5">
                        <div class="text-xs font-semibold">{{ Auth::user()->name }}</div>
                        <div class="text-xs">{{ Auth::user()->role() }}</div>
                    </div>
                </div>

                <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    <x-lucide-settings/>
                    {{ __('Profile') }}
                </x-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <x-lucide-log-out/>
                        {{ __('Log Out') }}
                    </x-nav-link>
                </form>
            @endauth
        </div>
    </x-drawer>
</nav>
