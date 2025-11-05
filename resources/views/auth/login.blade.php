<div>
    <h1>Login</h1>

    @if($message = session('message'))
        <div>{{ $message }}</div>
        <br>
    @endif

    <form action="/login" method="post">
        @csrf

        <div>
            <input name="email" placeholder="email" value="{{old('email')}}"/>
            @error('email')<span>{{ $message }}</span>@enderror
        </div>

        <br>

        <div>
            <input name="password" type="password" placeholder="senha"/>
            @error('password')<span>{{ $message }}</span>@enderror
        </div>

        <br>

        <button>Logar</button>
    </form>
</div>
