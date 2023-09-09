<x-app-layout>
    <div>
        <form action="{{route("admin.roles.update",$role)}}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Post name</label>
                <input type="text" name="name" id="name" value="{{old('name',$role->name)}}">
                
            </div>
            @error("name")
                <span class="text-red mb-6">{{$message}}</span>
                    
                @enderror
                <br>
            <button type="submit">create</button>
        </form>
    </div>
</x-app-layout>