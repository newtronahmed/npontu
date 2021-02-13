<x-master>
    <div class="container" style="color: white;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header text-center text-dark">Updates Today</h3>
                </div>
            </div>
        </div>
        @foreach ($updatesForToday as $item) 
        <div class="row justify-content-center">
            <div class="col-md-8 ">
               
            <div class="card text-dark mt-2">
                <div class="card-content">
                    <div class="card-body">
                        @if($item->type == 'pending')
                        Status of activity <strong>"{{$item->activity->activity}}"</strong> has been updated to <strong>pending</strong> <small class="text-muted">{{$item->created_at->diffForHumans()}}</small>
                        @else
                        Status of activity <strong>"{{$item->activity->activity}}"</strong> has been updated to <strong>done</strong> <small class="text-muted">{{$item->created_at->diffForHumans()}}</small>
                        @endif
                    </div>
                </div>
            </div>
        
            </div>
        </div>
        @endforeach
        
    </div>
</x-master>