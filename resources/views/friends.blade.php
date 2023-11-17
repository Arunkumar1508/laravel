<style>
    .hlo:hover {
       background: #afedf1;
       text-decoration: none;
    }
</style>

<h2 class="text-center" > Following</h2>
<ul>
    @forelse (auth()->user()->followers as $user)
    <li>

        <div class="flex hlo" >
            <a href="{{ route('profile',$user) }}">
            <img src="{{ asset('css/bootstrap/image/cart.jpg') }}" alt="" srcset=""
                style="width:50px; height:50px; border-radius:50%;">
                
            {{ $user->name }}
            </a>
        </div>
    </li>
    @empty
    <li>No Friends Yet!</li>
    @endforelse
</ul>
