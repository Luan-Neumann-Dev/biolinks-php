<x-layout.app>
    <div>
        <h1>Register</h1>

        @if ($message = session()->get('message'))
            <div>{{ $message }}</div>
            <br>
        @endif

        <form action="{{ route('register') }}" method="post">
            @csrf

            <div>
                <input name="name" placeholder="Nome" value="{{ old('name') }}" />
                @error('name')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <br>

            <div>
                <input name="email" placeholder="Email" value="{{ old('email') }}" />
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <br>

            <div>
                <input name="email_confirmation" placeholder="Confirme seu email" />
            </div>

            <br>

            <div>
                <input type="password" name="password" placeholder="Senha" />
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <br>

            <button>Registrar</button>
        </form>
    </div>
</x-layout.app>
