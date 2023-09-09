<x-app-layout>
  <div class="text-center">
    @include("admin.roles.create")
  </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role )
                <tr>
            <th scope="row">1</th>
            <td>{{{$role->name}}}</td>
            <td>
              <form action="{{route("admin.roles.destroy" ,$role->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger" type="submit">delete</button>
              </form>
            </td>
            {{-- <td><button  class="btn btn-primary "><a href="{{route("admin.roles.edit",$role->id)}}">edit</a></button></td> --}}
          </tr>
            @endforeach
        </tbody>
      </table>
</x-app-layout>