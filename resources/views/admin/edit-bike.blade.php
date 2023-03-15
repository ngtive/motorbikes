<x-app title="Admin - Edit Bike">
    <div class="row mt-4">
        <div class="col-12 col-md-5">
            <img src="{{ $bike->image }}" class="w-100 rounded" alt="{{ $bike->name }}">
        </div>
        <div class="col-12 col-md-7">
            <form action="{{ route('bikes.update', ['bike' => $bike]) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">
                        Name
                    </label>
                    <input value="{{ $bike->name }}"
                           type="text"
                           id="name"
                           name="name"
                           placeholder="Motorcycle name"
                           class="form-control form-control-sm @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="price">
                        Price
                    </label>
                    <input name="price"
                           class="form-control form-control-sm @error('price') is-invalid @enderror"
                           id="price"
                           value="{{ $bike->price }}"
                           type="number"
                           placeholder="Price">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="weight">
                        Weight (KG)
                    </label>
                    <input name="weight"
                           type="number"
                           id="weight"
                           value="{{ $bike->weight }}"
                           placeholder="Weight"
                           class="form-control form-control-sm @error('weight') is-invalid @enderror">
                    @error('weight')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="image">
                        Image
                    </label>
                    <input name="image"
                           type="file"
                           id="image"
                           class="form-control form-control-sm @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="color">
                        Color
                    </label>
                    <select name="color_id" id="color" class="form-control form-control-sm @error('color') is-invalid @enderror">
                        @foreach($colors as $color)
                        <option value="{{ $color->id }}" @if($bike->color->id == $color->id) selected @endif>{{ $color->color_name }}</option>
                        @endforeach
                    </select>
                    @error('color')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary"
                            type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app>
