@extends('Layout.app')


@section('content')
    {{--  show profile  --}}
    <section class="ftco-section bg-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="h1 text-white">Profile</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{--  billing form  --}}
                    <form action="{{ route('profile.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="billing-form ftco-animate">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    {{--  phone_number  --}}
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                                            value="{{ Auth::user()->phone_number }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{--  SIM_number  --}}
                                    <div class="form-group">
                                        <label for="SIM_number">SIM Number</label>
                                        <input type="text" class="form-control" name="SIM_number" id="SIM_number"
                                            value="{{ Auth::user()->SIM_number }}">
                                    </div>
                                    {{--  address  --}}
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ Auth::user()->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
