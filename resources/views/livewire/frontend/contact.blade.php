
 <!--contact-->
 <section class="contact">
    <div class="container-fluid">
        <div class="contact-area">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-image">
                        <img src="{{ asset('frontend/') }}/img/other/contact.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h3>feel free to contact us</h3>
                    </div>
                    <!--form-->
                    <form action="#" class="form contact_form " wire:submit="sent" method="POST" id="main_contact_form">
                        @if(Session::has('message'))
                            <div class="alert alert-success contact_msg" role="alert">
                                Your message was sent successfully.
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" wire:model="name" id="name" class="form-control" placeholder="Name*">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" wire:model="email" id="email" class="form-control" placeholder="Email*">
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" wire:model="subject" id="subject" class="form-control" placeholder="Subject*">
                            @error('subject')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea wire:model="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*"></textarea>
                            @error('message')
                            <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <button wire:loading.remove type="submit" class="btn-custom">Send Message</button>

                        <button wire:loading class="btn-custom border-0" type="button" disabled>
                            <span class="spinner-border text-primary spinner-border-sm" role="status" aria-hidden="true"></span>
                            Sending...
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

