<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#show{{ $classe->id }}">
    <i class="fa-solid fa-eye"></i> 
</button>

<!-- Modal -->
<div class="modal fade" id="show{{ $classe->id }}" tabindex="-1" aria-labelledby="show{{ $classe->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="show{{ $classe->id }}Label">{{ $classe->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
                {{-- ici c'est la suppression des images  --}}

                <div id="carousel{{ $classe->id }}" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($classe->classimgs as $key => $classimg)
                            <div class="carousel-item @if ($key === 0) active @endif">
                                <img height="200" width="400" src="{{ asset('storage/imgs/classeImgs/' . $classimg->img_url) }}"
                                    class="d-block w-100" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <form action={{ route('admin.classe.image.destroy', $classimg->id) }} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $classe->id }}"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $classe->id }}"
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
