{{-- <table class="table mb-0 text-nowrap">
    <thead>
        <tr>
            <th scope="col" class="border-0 text-uppercase">Restaurant ID</th>
            <th scope="col" class="border-0 text-uppercase">Name</th>
            <th scope="col" class="border-0 text-uppercase">Location</th>
            <th scope="col" class="border-0 text-uppercase">Type de cuisine</th>
            <th scope="col" class="border-0 text-uppercase">Status</th>
            <th scope="col" class="border-0 text-uppercase">ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach($restaurants as $restaurant)
        <tr data-id="{{ $restaurant->id }}">
            <td class="border-top-0">
                @if($restaurant->logo)
                    <img src="data:image/jpeg;base64,{{ $restaurant->logo }}" class="img-fluid mb-3" alt="Restaurant Logo" style="width: 100%; max-height: 200px; object-fit: cover;">
                @else
                    <p>No logo available</p>
                @endif
            </td>
            <td class="align-middle border-top-0">{{ $restaurant->name }}</td>
            <td class="align-middle border-top-0">{{ $restaurant->city }}</td>
            <td class="align-middle border-top-0">{{ $restaurant->cuisine_type }}</td>
            <td class="align-middle border-top-0">
                <span class="status-circle" style="background-color: {{ $restaurant->status === 'pending' ? '#ffc107' : ($restaurant->status === 'approved' ? '#28a745' : '#dc3545') }}; display: inline-block; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px; vertical-align: middle;"></span>
                <form action="{{ route('restaurants.updateStatus', $restaurant->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="form-control d-inline-block status-select" style="width: auto; display: inline; vertical-align: middle;">
                        <option value="pending" {{ $restaurant->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $restaurant->status == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $restaurant->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </form>
            </td>
            <td class="align-middle border-top-0">
                <span class="dropdown">
                    <a class="btn btn-sm btn-outline-secondary dropdown-toggle" href="#" role="button" id="actions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </a>

                    <div class="dropdown-menu" aria-labelledby="actions">
                        <a class="dropdown-item" href="{{ route('restaurants.edit', $restaurant->id) }}">Edit</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal{{ $restaurant->id }}">Delete</a>
                    </div>
                </span>
            </td>
        </tr>

        <div class="modal fade" id="deleteModal{{ $restaurant->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this restaurant?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table> --}}
