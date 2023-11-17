<div>

    <form method="POST" action="{{ route('publish') }}">
        @csrf
        <textarea name="body" class="form-control"  placeholder="What's app do?" required></textarea>
        {{--  <textarea  name="body"  class="form-control" placeholder="What's app do?"  required>  --}}

    {{--  </textarea>  --}}
        <hr class="">
        <footer class="gud">
            <img src="{{Auth::user()->avatar}}" alt="" srcset=""
                style="width:60px; height:60px; border-radius:50%;">
            <button type="submit" class="btn btn-primary mt-2 ">Tweet-a-roo!</button>
        </footer>

    </form>
    @error('body')
<p class="text-danger mt-3">{{ $message }}</p>
    @enderror
</div>
