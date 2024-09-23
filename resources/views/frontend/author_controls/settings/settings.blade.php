@extends('frontend.author_controls.layout')
@section('main')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Update Social Links</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('author.facebook') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-labl">Facebook</label>
                        <div class="col-sm-7">
                            <input type="text" name="facebook" class="form-control @error('facebook') border-danger @enderror" id="inputPassword" placeholder="Facebook">
                        </div>
                        <div class="col">
                            <button class="col btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>
                <form action="{{ route('author.instagram') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-labl"><I></I>Instagram</label>
                        <div class="col-sm-7">
                            <input type="text" name="instagram" class="form-control @error('instagram') border-danger @enderror" id="inputPassword" placeholder="Instagram">
                        </div>
                        <div class="col">
                            <button class="col btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('author.twiter') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-labl">Twiter</label>
                        <div class="col-sm-7">
                            <input type="text" name="twiter" class="form-control @error('twiter') border-danger @enderror" id="inputPassword" placeholder="Twiter">
                        </div>
                        <div class="col">
                            <button class="col btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('author.youtube') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-labl">YouTube</label>
                        <div class="col-sm-7">
                            <input type="text" name="youtube" class="form-control @error('youtube') border-danger @enderror" id="inputPassword" placeholder="YouTube">
                        </div>
                        <div class="col">
                            <button class="col btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- About section --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center text-white">Update About</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('author.about') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Write something about you</label>
                        <textarea name="about" id="" class="form-control @error('about') border-danger @enderror" rows="9"></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="col btn btn-primary" type="submit">Update about</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
