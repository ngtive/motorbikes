<x-app :title="'Motorbike - ' . $bike->name">
    <div class="row mt-3">
        <div class="col-12 col-md-6 mb-3">
            <img class="rounded w-100" src="{{ $bike->image }}" alt="{{ $bike->name }}">
        </div>
        <div class="col-12 col-md-6 mb-3">
            <h1 class="border-bottom">{{ $bike->name }}</h1>
            <span class="text-muted">Specifications</span>

            <ul class="nav flex-column mt-3">
                <li class="nav-item">Price: ${{ number_format($bike->price) }}</li>
                <li class="nav-item">Weight: {{ number_format($bike->weight) }} Kg</li>
                <li class="nav-item">Color: <span class="d-inline-block border" style="width: .8rem; height: .8rem; background-color: {{ $bike->color->color_name }}"></span></li>
            </ul>
        </div>

        <a href="{{ url()->previous() }}" class="link-primary text-decoration-none"><- Back</a>
    </div>
</x-app>
