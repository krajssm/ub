<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" href="/">New Media Guru </a>
        <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/projects">Projects</a></li>
            <li><a href="/contact">Contact</a></li>
            @if(Auth::check())
            <li><a href="<?php echo URL::to('/logout');?>">LogOut</a></li>
            @else
            <li><a href="<?php echo URL::to('/login');?>">LogIn</a></li>
            @endif
        </ul>
    </div>
</div>
