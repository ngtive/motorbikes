<x-app>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="border p-2 rounded">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="d-flex flex-column">
                    <div class="mb-2">
                        <label class="form-label"
                               for="email">Email</label>
                        <input class="form-control form-control-sm @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email', null) }}"
                               id="email"
                               type="email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control form-control-sm @error('password') is-invalid @enderror"
                               name="password"
                               id="password"
                               type="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <button type="submit"
                                class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app>
