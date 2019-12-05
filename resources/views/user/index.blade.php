{{-- @extends('layouts.app') --}}
@extends('layouts.admin_sidebar')
@section('content')

@if (session('status_edit'))
            <div class="alert alert-info" role="alert">
                {{ session('status_edit') }}
            </div>
            @endif

            @if (session('status_delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('status_delete') }}
            </div>
            @endif

            <div class="container">
                                    <div class="table-responsive">
                                            <table class="table table-dark">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Sl.</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Updated at</th>
                                                        <th scope="col">Created at</th>
                                                        <th scope="col">Actions</th>



                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php $i=1 ?>
                                                        @foreach ($users as $user)
                                                        <tr>
                                                                <td> {{ $i }} </td>
                                                                <td>  {{ $user->name}}</td>
                                                                <td>  {{ $user->email}}</td>
                                                                <td>  {{ $user->updated_at->diffForHumans()}}</td>
                                                                <td>  {{ $user->created_at->diffForHumans()}}</td>
                                                                <td>


                                                                <div class="container">
                                                                <div class="row justify-content-start">
                                                                <div class="col-2">

                                                                            {{-- edit --}}
                                                                            <div class="container">
                                                                                    <!-- Trigger the modal with a button -->
                                                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal_edit">Edit</button>

                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade" id="myModal_edit" role="dialog">
                                                                                    <div class="modal-dialog modal-sm">
                                                                                        <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                        <h5 class="modal-title" style="color:black;">Edit User profile</h5>

                                                                                                </div>
                                                                                                <div class="modal-body">

                                                                                                <div class="container">
                                                                                                    <div class="row justify-content-md-center">


                                                                                                            <form method="put" class="fm-inline"   action="{{ route('users.show',['user'=>$user->id]) }}">

                                                                                                                <input type="text" name="name" value={{ $user->name }}>
                                                                                                                <input type="text" name="email" value={{ $user->email }}>

                                                                                                                <input type="submit" value="Submit" class="btn btn-primary"/>
                                                                                                            </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    </div>
                                                                                </div>
                                                                </div>
                                                                <div class="col-6">

                                                                {{-- delete --}}
                                                                <div class="container">
                                                                        <!-- Trigger the modal with a button -->
                                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">Delete</button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="myModal" role="dialog">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                            <h5 class="modal-title" style="color:black;">Are you sure you want to delete?</h5>

                                                                                    </div>
                                                                                    <div class="modal-body">

                                                                                    <div class="container">
                                                                                        <div class="row justify-content-md-center">
                                                                                            <div class="col-sm">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                                                            </div>
                                                                                        <div class="col-sm">

                                                                                                <form method="POST" class="fm-inline"
                                                                                                action="{{ route('users.destroy',['user'=>$user->id]) }}">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <input type="submit" value="Yes" class="btn btn-danger"/>
                                                                                                </form>
                                                                                        </div>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>



                                                            </td>

                                                        </tr>
                                                        <?php $i++ ?>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                    </div>

            </div>



@endsection
