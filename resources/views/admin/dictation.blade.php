@extends("admin/admin_layouts/app")


@section("content")
<div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->

    <!-- TABLE: LATEST ORDERS -->
    <div class="card lastest-orders dictation-lastest-orders">
      <div class="card-header border-transparent">
        <h3 class="card-title">Latest Orders</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table m-0">
            <thead>
              <tr>
                <th>id</th>
                <th>title</th>
                <th>link</th>
                <th>status </th>
                <th>started_at</th>
                <th>finisheed_at</th>
              </tr>
            </thead>
            <tbody>
              @foreach($datas as $data)
              <tr>
                <!-- <td>{{ $loop->index+1 }}</td>4 -->
                <form action="{{ route('admin_update_dictation') }}" method='post'>
                  @csrf
                  <td><input type="hidden" name='id' value='{{ $data->id }}'>{{ $data->id }}</td>
                  <td><input type="text" name="title" value='{{ $data->title }}'></td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20"><input name="link" type="text" value="{{ $data->link }}"></div>
                  </td>
                  <td><input type="text" name='status' value='{{ $data->status }}'></td>
                  <td><input type="text" name="started_at" value='{{ $data->started_at}}'></td>
                  <td><input type="text" name="finished_at" value='{{ $data->finished_at}}'></td>
                  <td><button type="submit" class="btn btn-sm btn-info float-left">Update Dictation</button></td>
                </form>
              </tr>
              @endforeach

            </div>
          </div> 

        </tbody>

      </table>
      <button class="btn btn-sm btn-info float-left accordion">Create New Dictation</button>
      <div class="panel">
        <table>
          <thead>
            <tr>
              <th>title</th>
              <th>link</th>
              <th>description</th>
              <th>status</th>
              <th>started_at</th>
              <th>finished_at</th>
            </tr>
          </thead>
          <tr>
            <form action="{{ route('admin_create_dictation') }}" method='post'>
              @csrf
              <td><input type="text" name="title"></td>
              <td>
                <input name="link" type="text">
              </td>
              <td><input type="text" name="description"></td>
              <td><input type="text" name='status'></td>
              <td><input type="text" name="started_at"></td>
              <td><input type="text" name="finished_at"></td>
              <td><button type="submit" class="btn btn-sm btn-info float-left">Create Dictation</button></td>
            </form>
          </tr>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer -->
  </div>
  <span class="dictation-links">{{ $datas->links() }}</span>

  <form method = "Get" action = "{{route('admin_dictation')}}" class="">
    <label for = "id_start">Id от
      <input type = "text" name = "id_start" id= "id_start" size = "6">
    </label>
    <label for = "id_finish">Id до
      <input type = "text" name = "id_finish" id= "id_finish" size = "6">
    </label>
    <div>
      <button type = "submit" class = "btn btn-primary">
        Фильтр
      </button>
    </div>
  </form>
 <form action="{{ route('admin_dictation') }}" method="get">
                  <input type="hidden" name="sorting_id" value="some value">
                  <button type="submit" class="btn btn-sm btn-info float-left">Sorting</button>
                  
                </form>
  @endsection 


  @section("sidebar")
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin_users') }}" class="nav-link ">
        <i class="far fa-circle nav-icon"></i>
        <p>Users</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin_dictation') }}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Dictation</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin_dictation_result') }}" class="nav-link  ">
        <i class="far fa-circle nav-icon"></i>
        <p>Dictation Result</p>
      </a>
    </li>
  </ul>
  @endsection 