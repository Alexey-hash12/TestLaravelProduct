@extends("admin/admin_layouts/app")


@section("content")

<div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- TABLE: LATEST ORDERS -->
    <div class="card lastest-orders">
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
                <th>ID</th>
                <th>Title of Dictation</th>
                <th>User's name</th>
                <th>User's Email</th>
                <th>Text</th>
                <th>Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($datas as $data)

              <tr>
                <td>{{$data->id}}</td>
                <td>{{ $data->title_of_dictation }}</td>
                <td>{{ $data->user_name }}</td>
                <td>{{ $data->user_email }}</td>
                <td>{{ $data->text }}</td>
                <td>{{ $data->updated_at }}</td>

                <td>
                 <form action="{{ route('admin_dictation_result_delete') }}"method='post'>
                  @csrf
                  <input type="hidden" name="id" value="{{$data->id}}">
                  <div id="modal" class="modal">
                    <span id="cancel" class="cancel" onclick="cancelFunc()">&times;</span>
                    <div class="modal-text">Do you really want to delete</div>
                    <button class="btn btn-danger delete-form-btn" type="submit">Delete</button>
                  </div>

                </form>
              </td>
              <td><button id="form-btn" class="btn btn-danger" onclick="deleteFunc()" type="submit">Delete</button></td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
      <div class="panel">
        <table>
          <thead>
            <tr>
            </tr>
          </thead>
        </table>
      </div>
      <!-- <form action="{{ route('admin_dictation_result') }}"></form> -->

    </div>
    <span class="dictation-links">{{ $datas->links() }}</span>
    <!-- /.card-footer -->
  </div>
  <form method = "Get" action = "{{route('admin_dictation_result')}}" class="dictation-filter">
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
  <form action="{{ route('admin_dictation_result') }}" method="get">
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
      <a href="{{ route('admin_dictation') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Dictation</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('admin_dictation_result') }}" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Dictation Result</p>
      </a>
    </li>
  </ul>
  @endsection 
