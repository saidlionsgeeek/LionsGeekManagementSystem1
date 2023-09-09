<x-app-layout>
  @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
  <div class="text-center bg-light">
    @include('admin.users.components.create')
  </div>
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th scope="col">Handle</th>
              <th scope="col">role/roles</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $key => $user )
              @if (!$user->hasrole(["admin"]))
                  <tr>
              <th scope="row">{{$key}}</th>
              <td>{{{$user->name}}}</td>
              <td>{{$user->email}}</td>
              @if ($user->roles)
              <td>@foreach ($user->roles as $role )
              <form action="{{route('admin.user.role.remove',[$user->id,$role->id])}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger">{{$role->name}} </button>
              </form>
              @endforeach</td>
              @endif
              <td>@include("admin.users.components.assignrole")</td>
              <td>
                
                <form action="{{route("admin.users.destroy",$user->id)}}" method="POST">
                    @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </td>
            </tr>
              @endif
                
              @endforeach
          </tbody>
        </table>
  </x-app-layout>