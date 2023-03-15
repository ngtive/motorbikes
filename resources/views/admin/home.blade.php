<x-app title="Admin">

    <div class="d-flex align-items-center gap-2 mt-3">
        <form action="{{ route('logout') }}"
              method="post">
            @csrf
            <button type="submit" class="btn btn-outline-dark">Logout</button>
        </form>
        <span>{{ $user->name }}</span>
    </div>

    <div class="row mt-3">
        <div class="col-12 mb-3">
            <a href="{{ route('bikes.create') }}"
               class="btn btn-outline-primary">
                Register new motorcycle
            </a>
        </div>
        @foreach($bikes as $bike)
            <div class="col-12 col-md-6 mb-2">
                <div class="border rounded p-1">
                    <div class="d-flex flex-column gap-2">
                        <div class="m-auto w-75 mb-3">
                            <img src="{{ $bike->image }}" class="rounded w-100" alt="{{ $bike->name }}">
                        </div>
                    </div>
                    <h1>{{ $bike->name }}</h1>
                    <a class="ms-1 text-decoration-none btn btn-link" href="{{ route('bikes.edit', ['bike' => $bike]) }}">Edit</a>
                </div>
            </div>
        @endforeach
        {{ $bikes->links('vendor.pagination.bootstrap-5') }}
    </div>
</x-app>
