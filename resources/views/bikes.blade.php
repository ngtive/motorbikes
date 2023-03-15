<x-app title="Motorbikes">
    <div class="row mt-3">
        <div class="col-12 col-md-2">
            <form method="get" enctype="application/x-www-form-urlencoded">
                <div class="border rounded p-1">
                    <div class="mb-3">
                        <label for="sort" class="form-label">Sort by</label>

                        <select class="form-control" id="sort" name="sort">
                            @if(request('sort', null) == null)
                            <option selected disabled>Choose sort option</option>
                            @endif
                            <option value="price" @if(request('sort') == 'price') selected @endif>Price</option>
                            <option value="created" @if(request('sort') == 'created') selected @endif>Created</option>
                        </select>
                        <input name="direction"
                               value="desc"
                               type="hidden">
                    </div>
                    <div class="mb-3">
                        <label for="sort" class="form-label">Filter by colors</label>

                        <div class="mt-3">
                            @foreach($colors as $color)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <span class="d-inline-block border"
                                          style="background-color: {{ $color }}; width: .8rem; height: .8rem;">
                                    </span>
                                    {{ $color }}
                                    <input name="colors[]"
                                           type="checkbox"
                                           @if(in_array($color, request('colors', []))) checked @endif
                                           value="{{ $color }}"
                                           class="form-check-inline">
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <button type="submit"
                                    class="btn btn-primary">
                                Filter
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-10">
            <div class="row">
                @foreach($bikes as $bike)
                <div class="col-12 col-md-6 mb-2">
                    <div class="border rounded p-1">
                        <div class="d-flex flex-column gap-2">
                            <div class="m-auto w-75 mb-3">
                                <img src="{{ $bike->image }}" class="rounded w-100" alt="{{ $bike->name }}">
                            </div>
                        </div>
                        <h1>{{ $bike->name }}</h1>

                        <ul class="ms-2">
                            <li>Weight: {{ number_format($bike->weight) }} KG</li>
                        </ul>
                        <a class="ms-1 text-decoration-none btn btn-link"
                           href="{{ route('show.bike', ['bike' => $bike]) }}">More information</a>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $bikes->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</x-app>
