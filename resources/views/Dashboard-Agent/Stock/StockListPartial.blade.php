@foreach($stocks as $stock)
    @php
        $franchise = $stock->franchise;
        $cardColor = $franchiseColors[$franchise->id];
    @endphp
    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
        <!-- Card with link to detailed viewss -->
        <a href="{{ route('stocks.show', $stock->id) }}" class="card mb-4" style="background-color: {{ $cardColor }}; height: 100%;">
            <div class="card-body d-flex flex-column">
                <div class="text-center">
                    <div class="position-relative">
                        @if ($stock->image_data)
                            <img src="data:image/jpeg;base64,{{ $stock->image_data }}" class="img-fluid mb-3" alt="Stock Image" style="width: 100%; max-height: 200px; object-fit: cover;" />
                        @else
                            <img src="{{ asset('path/to/default/image.jpg') }}" class="img-fluid mb-3" alt="Stock Image" style="width: 100%; max-height: 200px; object-fit: cover;" />
                        @endif
                    </div>
                    <h4 class="mb-0">{{ $franchise->name }}</h4>
                    <p class="mb-0">
                        <i class="fe fe-map-pin mr-1 font-size-xs"></i>{{ $franchise->location }}
                    </p>
                </div>
                <div class="mt-auto">
                    <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                        <span>Food</span>
                        <span class="text-dark">{{ $stock->food->foodName }}</span>
                    </div>
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>Quantity</span>
                        <span>{{ $stock->quantity }}</span>
                    </div>
                    <div class="d-flex justify-content-between pt-2">
                        <span>Expires</span>
                        <span class="text-dark">{{ $stock->expiration_date->format('Y-m-d') }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
