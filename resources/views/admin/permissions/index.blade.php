<x-app-layout>
    <a href="{{route("admin.permissions.create")}}">create</a>
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($permissions as $permission )
                  <tr>
              <th scope="row">1</th>
              <td>{{{$permission->name}}}</td>
              <td>a</td>
              <td>@mdo</td>
            </tr>
              @endforeach
          </tbody>
        </table>
  </x-app-layout>