<div>
    <h1>Dashboard</h1>

    @if($message = session()->get('message'))
        <div>{{ $message }}</div>
    @endif

    <a href="{{route('links.create')}}">Criar novo link</a>

    <ul>
        @foreach ($links as $link)
            <li style="display: flex; gap: 10px;">
                <a href="{{route('links.edit', $link)}}">{{ $link->name }}</a>

                <form action="{{route('links.destroy', $link)}}" method="post" onsubmit="return confirm('Tem certeza?')">
                    @csrf
                    @method('DELETE')

                    <button>Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
