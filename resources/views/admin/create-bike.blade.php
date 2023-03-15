<x-app title="Admin - Create bike">
   <form class="row mt-4"
         action="{{ route('bikes.store') }}"
         enctype="multipart/form-data"
         method="post">
       @csrf

       <div class="col-6 col-md-3 mb-3">
           <label class="form-label" for="name">
               Motorcycle name
           </label>
           <input class="form-control form-control-sm @error('name') is-invalid @enderror"
                  name="name"
                  type="text"
                  placeholder="Name"
                  id="name">
           @error('name')
           <div class="invalid-feedback">
               {{ $message }}
           </div>
           @enderror
       </div>
       <div class="col-6 col-md-2 mb-3">
           <label class="form-label" for="price">
               Price
           </label>
           <input name="price"
                  class="form-control form-control-sm @error('price') is-invalid @enderror"
                  id="price"
                  type="number"
                  placeholder="Price">
           @error('price')
           <div class="invalid-feedback">
               {{ $message }}
           </div>
           @enderror
       </div>
       <div class="col-6 col-md-2 mb-3">
           <label class="form-label" for="weight">
               Weight
           </label>
           <input name="weight"
                  type="number"
                  id="weight"
                  placeholder="Weight"
                  class="form-control form-control-sm @error('weight') is-invalid @enderror">
           @error('weight')
           <div class="invalid-feedback">
               {{ $message }}
           </div>
           @enderror
       </div>
       <div class="col-6 col-md-3 mb-3">
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
       <div class="col-6 col-md-2 mb-3">
           <label class="form-label" for="color">
               Color
           </label>
           <select name="color_id"
                   class="form-control form-control-sm @error('color_id') is-invalid @enderror"
                   id="color">
               <option disabled value="" selected>Select Color</option>
               @foreach($colors as $color)
               <option value="{{ $color->id }}">{{ $color->color_name }}</option>
               @endforeach
           </select>
           @error('color_id')
           <div class="invalid-feedback">
               {{ $message }}
           </div>
           @enderror
       </div>
       <div class="col-12">
           <button class="btn btn-primary" type="submit">Submit</button>
       </div>
   </form>
</x-app>
