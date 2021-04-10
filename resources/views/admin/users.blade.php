@extends("admin/admin_layouts/app")

@section("content")


<div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card lastest-orders" style = "margin-left:300px">
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
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Connection Date</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($datas as $data)

                    <tr>
                      <td>{{$data->id }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->email }}</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $data->created_at }}</div>
                      </td>
                      <form action="{{ route('admin_users_delete') }}"method='post'>
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div id="modal" class="modal">
                        <span id="cancel" class="cancel" onclick="cancelFunc()">&times;</span>
                        <div class="modal-text">Do you really want to delete</div>
                        <button class="btn btn-danger delete-form-btn" type="submit">Delete</button>
                      </div>
                      
                    </form>
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
                <form action="{{ route('admin_users') }}" method="get">
                  <input type="hidden" name="sorting_id" value="some value">
                  <button type="submit" class="btn btn-sm btn-info float-left">Sorting</button>
                  
                </form>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            <span class="dictation-links">{{ $datas->links() }}</span>
              
            </div>
<!-- Не гавно код -->
<form method = "Get" action = "{{route('admin_users')}}" class='dictation-filter'>
  <label for = "start_date">Id от
    <input type = "text" name = "start_date" id= "start_date" size = "6">
  </label>
  <label for = "finish_date">Id до
    <input type = "text" name = "finish_date" id= "finish_date" size = "6">
  </label>
  <div>
  <button type = "submit" class = "btn btn-primary">
    Фильтр
  </button>
</div>
</form>


@endsection 
@section("sidebar")
<ul class="nav nav-treeview">
  <li class="nav-item">
    <a href="{{ route('admin_users') }}" class="nav-link active ">
      <i class="far fa-circle nav-icon"></i>
      <p>Users</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('admin_dictation') }}" class="nav-link ">
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