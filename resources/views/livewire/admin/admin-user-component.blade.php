<div>
    <style>
        .btn-danger{
            background-color: #d9534f !important;
            border: 1px solid #d9534f !important;
        }
        .btn-danger:hover{
            background-color: #b54643 !important;
            border: 1px solid #b54643 !important;
        }

        .btn-primary{
            background-color: #0275d8 !important;
            border: 1px solid #0275d8 !important;
        }
        .btn-primary:hover{
            background-color: #025bd8 !important;
            border: 1px solid #025bd8 !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Utilisateurs
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row text-center">
                                    <h3>Tous les utilisateurs</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <table class="table table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Date création</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->utype}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.user.edit',['user_id'=>$user->id])}}" class="btn btn-sm btn-primary">Modifier</a>
                                                <a href="{{route('admin.user.delete')}}" class="btn btn-sm btn-danger" wire:click.prevent="destroy({{$user->id}})">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                                    {{$users->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
