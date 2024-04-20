@extends('Layout.app')

@section('content')
    <div class="ftco-section ftco-no-pt bg-dark">
    </div>

    {{--  section form login --}}
    <section class="ftco-section bg-light mt-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Login</span>
                    <h2 class="mb-2">Silahkan Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('login') }}" method="POST" class="billing-form ftco-animate">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email"
                                        class="form-control
                                    @error('email')
                                        is-invalid
                                    @enderror
                                    "
                                        placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password"
                                        class="form-control
                                    @error('password')
                                        is-invalid
                                    @enderror
                                    "
                                        placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
