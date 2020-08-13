@extends('site.layout.app')
@section('title','Inbox Table')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Inbox Table
                <div class="float-right">
                </div>
            </div>
            <div class="card-body">
                @foreach($users as $user)
                   <div class="card">
                        <div class="card-header">
                            <img src="{{ asset('site/img/avatars/default-avatar.jpg') }}" style="object-fit: cover;border-radius: 50%" alt="" width="40" height="40" srcset="">
                            <a href="{{ route('chat.show',$user->id) }}" class="breadcrumb-item active"> {{ "$user->name" }} </a>
                        </div>
                    </div>
                @endforeach
                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection

