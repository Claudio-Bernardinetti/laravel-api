@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-2">
          @include('admin.partials.sidebar')
        </div>
       <div class="col-md-10">
         <div class="d-flex justify-content-between align-items-center py-2"> 
         </div>
    
        @if(session('message'))
          <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
            <strong>Congratulations:</strong> {{session('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
    
        
        
        <table class="table ">
            <h1>
                All Projects index
            </h1>
        <thead>
          <tr>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>
                    <img src="{{$project->cover_image}}" alt="" width="100">
                </td>
                <td>
                    {{$project->id}}
                </td>
                <td>
                    {{$project->title}}
                </td>
                <td>
                    {{$project->slug}}
                </td>
                <td>
                    <a href="{{route('admin.projects.show',$project->id)}}" class="btn btn-primary">View</a>
                    <a href="{{route('admin.projects.edit',$project->id)}}" class="btn btn-success">Edit</a>
                    
                </td>
            <td>
            <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                @csrf
                @method('DELETE')
              
                <button type="button" class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$project->id}}">
                  Delete
                </button>
              
                <div class="modal fade" id="exampleModal_{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                          Delete item {{$project->id}}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body bg-danger">
                        You really want to delete <p>{{$project->title}} ?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="py-2">
        {{ $projects->links('pagination::bootstrap-5') }}
      </div>
      </div>
    </div> 

</div>


@endsection