<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
		<a class="navbar-brand" href="/cpanel">
			<h2>{{ config('app.name') }}</h2>
		</a>
		<ul class="nav_tool ml-auto">
			<li class="dropdown">
				<a class="dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					<img src="{{ asset('assets/images/user-icon.png') }}" width="25" height="25" class="rounded-circle" alt="">
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left"
					aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#"><span class="la la-user-edit"></span> Edit Profile</a>
					<form style="cursor: pointer" method="POST" action="{{ route('logout') }}">
						@csrf
						<a class="dropdown-item" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Log Out
						</a>
					</form>
				</div>
			</li>
			<li>
				<a href="/notification"><span class="la la-envelope"><span class="badge badge-light">@livewire('unread-notifications-count')</span></span></a>
			</li>
		</ul>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarMenu"
			aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="la la-bars"></span>
		</button>
</nav>