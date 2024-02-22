<div class="py-12">
    @foreach($plans as $plan)
        <div class="col-md-4 mt-md-0 mt-4">
            <div class="gallery-demo">
                <a href="#gal{{ $plan->id }}">
                    <img src="{{ asset('helps/images/blog2.jpg') }}" alt=" " class="img-fluid" />
                    <h4 class="p-mask">{{ $plan->name }} - <span>${{ $plan->price }}</span></h4>
                    <h4 class="p-mask">{{ $plan->name }}</h4>
                </a>
            </div>
        </div>
    @endforeach
</div>