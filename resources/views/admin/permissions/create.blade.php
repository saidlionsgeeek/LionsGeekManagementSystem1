
<x-app-layout>
    <div>
        <form action="{{route("admin.permissions.store")}}" method="post">
            @csrf
            <div>
                <label for="name">Post name</label>
                <input type="text" name="name" id="name">
                
            </div>
            @error("name")
                <span class="text-red mb-6">{{$message}}</span>
                    
                @enderror
                <br>
            <button type="submit">create</button>
            
            
            
        </form>
    </div>
</x-app-layout>