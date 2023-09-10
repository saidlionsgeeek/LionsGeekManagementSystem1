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
          <thead align="center">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Email</th>
              <th scope="col">Role/Roles</th>
              <th scope="col">Type</th>
              <th scope="col">Modifier les Roles</th>
              <th scope="col"> Information d'utilisateur</th>
              <th scope="col">Changer les informations</th>
              <th scope="col">Supprimer l'utilisateur</th>
            </tr>
          </thead>
          <tbody align="middle" >
              @foreach ($users as $key => $user )
              @if (!$user->hasrole(["admin"]))
                  <tr>
              <th scope="row">{{$key}}</th>
              <td>{{{$user->name}}}</td>
              <td>{{$user->email}}</td>
              @if ($user->roles)
            <td>
                @foreach ($user->roles as $role )
                @unless ($role->name === "externe" || $role->name === "interne")
                  <form action="{{ route('admin.user.role.remove', [$user->id, $role->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger">{{ $role->name }}</button>
                  </form>
                @endunless
              @endforeach
            </td>
              <td>@foreach ($user->roles as $role )
                @if ($role->name === "externe" || $role->name === "interne")
                  <form action="{{route('admin.user.role.remove',[$user->id,$role->id])}}" method="POST">
                  @csrf
                  @method("DELETE")
                  <button class="btn btn-danger">{{$role->name}} </button>
                </form>
                @endif
                
                @endforeach</td>
              @endif
              <td>@include("admin.users.components.assignrole")</td>
              <td>
                @include("admin.users.components.show")
              </td>
              <td>
                @include("admin.users.components.edit")
              </td>
              <td>
                <form action="{{route("admin.users.destroy",$user->id)}}" method="POST">
                    @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer?')">Supprimer</button>
                </form>
            </td>
            </tr>
              @endif
                
              @endforeach
          </tbody>
        </table>
  </x-app-layout>