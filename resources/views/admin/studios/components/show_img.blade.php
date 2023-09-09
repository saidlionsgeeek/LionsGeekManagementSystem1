<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#show{{ $studio->id }}">
    Afficher les image de studio
</button>

<!-- Modal -->
<div class="modal fade" id="show{{ $studio->id }}" tabindex="-1" aria-labelledby="show{{ $studio->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="show{{ $studio->id }}Label">{{ $studio->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
                {{-- ici c'est la suppression des images  --}}

                <div id="carousel{{ $studio->id }}" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($studio->studioImgs as $key => $studioImg)
                            <div class="carousel-item @if ($key === 0) active @endif">
                                <img height="200" width="400" src="{{ asset('storage/imgs/studioImgs/' . $studioImg->img_url) }}"
                                    class="d-block w-100" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <form action={{ route('admin.studio.image.destroy', $studioImg->id) }} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $studio->id }}"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $studio->id }}"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                {{-- {{$studio->studioimgs}} --}}
            </div>
           
        </div>
    </div>
</div>
