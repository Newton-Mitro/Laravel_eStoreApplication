@extends('layouts.admin')

@section('title', 'Page Title')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
            <div class="row mt-3 mb-2">
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Site Settings</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('setting.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Site Logo</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <div class="input-group"><span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                   class="btn btn-dark text-white"><i
                                                            class="fa fa-picture-o"></i> Choose</a></span>
                                        <input id="thumbnail" class="form-control" type="text" name="logo">
                                    </div>
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="site_title" class="col-md-4 col-form-label text-md-right">Site Title</label>
                            <div class="col-md-6">
                                <input id="site_title" type="text"
                                       class="form-control @error('site_title') is-invalid @enderror" name="site_title"
                                       value="{{ $setting->site_title }}" autocomplete="site_title" autofocus>

                                @error('site_title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_line_1" class="col-md-4 col-form-label text-md-right">Address Line 1</label>

                            <div class="col-md-6">
                                <input id="address_line_1" type="text"
                                       class="form-control @error('address_line_1') is-invalid @enderror" name="address_line_1"
                                       value="{{ $setting->address_line_1 }}" autocomplete="address_line_1" autofocus>

                                @error('address_line_1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_line_2" class="col-md-4 col-form-label text-md-right">Address Line 2</label>
                            <div class="col-md-6">
                                <input id="address_line_2" type="text"
                                       class="form-control @error('address_line_2') is-invalid @enderror" name="address_line_2"
                                       value="{{ $setting->address_line_2 }}" autocomplete="address_line_2" autofocus>

                                @error('address_line_2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_line_3" class="col-md-4 col-form-label text-md-right">Address Line 3</label>
                            <div class="col-md-6">
                                <input id="address_line_3" type="text"
                                       class="form-control @error('address_line_3') is-invalid @enderror" name="address_line_3"
                                       value="{{ $setting->address_line_3 }}" autocomplete="address_line_3" autofocus>

                                @error('address_line_3')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone1</label>
                            <div class="col-md-6">
                                <input id="phone1" type="text" class="form-control @error('phone1') is-invalid @enderror"
                                       name="phone1" value="{{ $setting->phone1 }}" required autocomplete="phone1"
                                       data-inputmask='"mask": "99999-999999"' data-mask>

                                @error('phone1')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone2" class="col-md-4 col-form-label text-md-right">Phone2</label>
                            <div class="col-md-6">
                                <input id="phone2" type="text" class="form-control @error('phone2') is-invalid @enderror"
                                       name="phone2" value="{{ $setting->phone2 }}" required autocomplete="phone2"
                                       data-inputmask='"mask": "99999-999999"' data-mask>

                                @error('phone2')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="text"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ $setting->email }}" autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fax" class="col-md-4 col-form-label text-md-right">Fax</label>
                            <div class="col-md-6">
                                <input id="fax" type="text"
                                       class="form-control @error('fax') is-invalid @enderror" name="fax"
                                       value="{{ $setting->fax }}" autocomplete="fax" autofocus>

                                @error('fax')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-success">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
