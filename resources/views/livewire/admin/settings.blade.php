<div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-center text-white">Change Logo</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control">
                            <img src="" alt="">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-center text-white">Change Title</h3>
                </div>
                <div class="card-body">

                    <form wire:submit.prevent="updatetitle" action="#">
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" wire:model="title" class="form-control">
                            <small>Current title: <span class="text-warning">{{ $settings->title }}</span></small>
                            <div>
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <button wire:loading.remove class="btn btn-primary m-0" type="submit" wire:click='updatetitle()'>Chnage</button>
                            <button wire:loading class="btn border-0" type="button" disabled wire:target='updatetitle()'>
                                <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                                Changing...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-center text-white">Change Icon</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent='updateIcon'>
                        <div class="mb-3">
                            <label for="" class="form-label">Icon</label>
                            <input type="file" wire:model="i_photo" class="form-control">
                            @error('i_photo') <span class="text-danger">{{ $message }}</span> @enderror
                            {{-- <img src="{{ $settings->icon != null ? asset('uploads/settings/icon'.$settings->icon):'' }}" id="icon" height="30px" alt=""> --}}
                        </div>
                        <div class="mb-3">
                            <button wire:loading.remove class="btn btn-primary m-0" type="submit" wire:click='updateIcon()'>Chnage</button>
                            <button wire:loading class="btn border-0" type="button" disabled wire:target='updateIcon()'>
                                <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                                Changing...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>


{{-- Social Media --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center text-white">Social Media Links</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- Facebook --}}
                            <div class="col">
                                <form wire:submit.prevent="updateFacebook" >
                                    <div class="mb-3">
                                        <label for="" class="form-label">Facebook link</label>
                                        <input type="text"  wire:model="facebook" class="form-control">
                                        <small>Current link: <span class="text-warning">{{ $settings->facebook != null ? 'Linked':'Not linked' }}</span></small>
                                        <div>
                                            @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button wire:loading.remove class="btn btn-primary m-0" type="submit" wire:click='updateFacebook()'>Chnage</button>
                                        <button wire:loading class="btn border-0" type="button" disabled wire:target='updateFacebook()'>
                                            <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Changing...
                                        </button>
                                    </div>
                                </form>
                                <div class="mb-3">
                                    <label for="">Active status</label>
                                    <div><a wire:click='f_active()' class="btn btn-sm btn-outline-{{ $settings->facebook_status == 0 ? 'danger':'success' }}">{{ $settings->facebook_status == 0 ? 'Inactive':'Active' }}</a></div>
                                </div>
                            </div>
                            {{-- Instagram --}}
                            <div class="col">
                                <form wire:submit.prevent="updateInstagram" action="#">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Instagram link</label>
                                        <input type="text"  wire:model="instagram" class="form-control">
                                        <small>Current link: <span class="text-warning">{{ $settings->instagram != null ? 'Linked':'Not linked' }}</span></small>
                                        <div>
                                            @error('instagram') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button wire:loading.remove class="btn btn-primary m-0" type="submit" wire:click='updateInstagram()'>Chnage</button>
                                        <button wire:loading class="btn border-0" type="button" disabled wire:target='updateInstagram()'>
                                            <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Changing...
                                        </button>
                                    </div>
                                </form>
                                <div class="mb-3">
                                    <label for="">Active status</label>
                                    <div><a wire:click='i_active()' class="btn btn-sm btn-outline-{{ $settings->instagram_status == 0 ? 'danger':'success' }}">{{ $settings->instagram_status == 0 ? 'Inactive':'Active' }}</a></div>
                                </div>
                            </div>
                            {{-- Twiter --}}
                            <div class="col">
                                <form wire:submit.prevent="updateTwiter" action="#">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Twiter link</label>
                                        <input type="text"  wire:model="twiter" class="form-control">
                                        <small>Current link: <span class="text-warning">{{ $settings->twiter != null ? 'Linked':'Not linked' }}</span></small>
                                        <div>
                                            @error('twiter') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button wire:loading.remove class="btn btn-primary m-0" type="submit" wire:click='updateTwiter()'>Chnage</button>
                                        <button wire:loading class="btn border-0" type="button" disabled wire:target='updateTwiter()'>
                                            <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Changing...
                                        </button>
                                    </div>
                                </form>
                                <div class="mb-3">
                                    <label for="">Active status</label>
                                    <div><a wire:click='t_active()' class="btn btn-sm btn-outline-{{ $settings->twiter_status == 0 ? 'danger':'success' }}">{{ $settings->twiter_status == 0 ? 'Inactive':'Active' }}</a></div>
                                </div>
                            </div>
                            {{-- Youtube --}}
                            <div class="col">
                                <form wire:submit.prevent="updateYoutube" action="#">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Youtube link</label>
                                        <input type="text"  wire:model="youtube" class="form-control">
                                        <small>Current link: <span class="text-warning">{{ $settings->youtube != null ? 'Linked':'Not linked' }}</span></small>
                                        <div>
                                            @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button wire:loading.remove class="btn btn-primary m-0" type="submit" wire:click='updateYoutube()'>Chnage</button>
                                        <button wire:loading class="btn border-0" type="button" disabled wire:target='updateYoutube()'>
                                            <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Changing...
                                        </button>
                                    </div>
                                </form>
                                <div class="mb-3">
                                    <label for="">Active status:</label>
                                    <div><a wire:click='y_active()' class="btn btn-sm btn-outline-{{ $settings->youtube_status == 0 ? 'danger':'success' }}">{{ $settings->youtube_status == 0 ? 'Inactive':'Active' }}</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
