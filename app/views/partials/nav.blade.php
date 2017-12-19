<nav class="primary-nav hide">
	@if ( Auth::user()->company_id == 1 )
		<ul>
			<li><a href="{{ route('index') }}"><span class="glyphicon glyphicon-home"></span>Home</a></li>

			<li>
				<a href="{{ route('company.index') }}"><span class="glyphicon glyphicon-briefcase"></span>Companies</a>
				<ul class="submenu">
					<li><a href="{{ route('company.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a Company</a></li>
				</ul>
			</li>
			
			<li>
				<a href="{{ route('user.index') }}"><span class="glyphicon glyphicon-user"></span>Users</a>
				<ul class="submenu">
					<li><a href="{{ route('user.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a User</a></li>
				</ul>
			</li>

			<li>
				<a href="{{ route('category.index') }}"><span class="glyphicon glyphicon-folder-open"></span>Categories</a>
				<ul class="submenu">
					<li><a href="{{ route('category.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a Category</a></li>
				</ul>
			</li>
			
			<li>
				<a href="{{ route('server.index') }}"><span class="glyphicon glyphicon-hdd"></span>Servers</a>
				<ul class="submenu">
					<li><a href="{{ route('server.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a Server</a></li>
				</ul>
			</li>
		
			<li>
				<a href="{{ route('provider.index') }}"><span class="glyphicon glyphicon-wrench"></span>Providers</a>
				<ul class="submenu">
					<li><a href="{{ route('provider.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a Provider</a></li>
				</ul>
			</li>
			
			<li>
				<a href="{{ route('login.index') }}"><span class="glyphicon glyphicon-floppy-disk"></span>Logins</a>
				<ul class="submenu">
					<li><a href="{{ route('login.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a Login</a></li>
				</ul>
			</li>

			<li>
				<a href="{{ route('domain.index') }}"><span class="glyphicon glyphicon-console"></span>Domains</a>
				<ul class="submenu">
					<li><a href="{{ route('domain.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a Domain</a></li>
				</ul>
			</li>

			<li>
				<a href="{{ route('project.index') }}"><span class="glyphicon glyphicon-paperclip"></span>Projects</a>
				<ul class="submenu">
					<li><a href="{{ route('project.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a Project</a></li>
				</ul>
			</li>

			<li>
				<a href="{{ route('line.index') }}"><span class="glyphicon glyphicon-list"></span>Lines</a>
				<ul class="submenu">
					<li><a href="{{ route('line.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a Line</a></li>
				</ul>
			</li>

			<li>
				<a href="{{ route('charge.index') }}"><span class="glyphicon glyphicon-credit-card"></span>Charges</a>
				<ul class="submenu">
					<li><a href="{{ route('charge.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a Charge</a></li>
				</ul>
			</li>
			
		</ul>
	@else
		<ul>
			<li><a href="{{ route('index') }}"><span class="glyphicon glyphicon-home"></span>Home</a></li>
			
			<li>
				<a href="{{ route('user.index') }}"><span class="glyphicon glyphicon-user"></span>Users</a>
				<ul class="submenu">
					<li><a href="{{ route('user.create') }}"><span class="glyphicon glyphicon-plus"></span>Create a User</a></li>
				</ul>
			</li>

			<li>
				<a href="{{ route('domain.index') }}"><span class="glyphicon glyphicon-console"></span>Domains</a>
			</li>

			<li>
				<a href="{{ route('project.index') }}"><span class="glyphicon glyphicon-paperclip"></span>Projects</a>
			</li>

			<li>
				<a href="{{ route('line.index') }}"><span class="glyphicon glyphicon-list"></span>Lines</a>
			</li>

			<li>
				<a href="{{ route('charge.index') }}"><span class="glyphicon glyphicon-credit-card"></span>Charges</a>
			</li>
			
		</ul>
	@endif
</nav>