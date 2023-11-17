<style>
    li {
        padding: 15px;
        list-style: none;
    }

    .new:hover {
        font-size: 1.5rem;
        background: rgb(159, 211, 211);
        text-decoration: none;
    }
</style>


<ul class="p-3 new">
    <li>
        <a style="text-decoration:none" href="{{ route('tweety_home') }}">Home</a>
    </li>
    <li>
        <a style="text-decoration:none" href="{{ route('explore') }}">Explore</a>
    </li>
    <li>
        <a style="text-decoration:none" href="{{ route('request') }}">Request</a>
    </li>

    <li>
        <a style="text-decoration:none" href="{{ route('message') }}">Message</a>
    </li>

    <li>
        <a style="text-decoration:none" href="{{ route('profile', auth()->user()) }}">Profile</a>
    </li>

    <li>


        <a style="text-decoration:none" href="{{ route('userloggedout') }}">Logout</a>


    </li>
</ul>
