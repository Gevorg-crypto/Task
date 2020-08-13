@extends('site.layout.app')
@section('title','User')
@section('content')
    <div class="col-lg-12" id="app">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-1 ">
                        <img src="{{ asset('site/img/avatars/first.png')}}" height="48" width="48"  style="border-radius: 50%;object-fit: cover"  alt="Second slide">
                    </div>
                    <div class="col-md-11">
                        <h6 class="d-inline">{{ "$user->name" }}</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div style="max-height: 410px;overflow-y: scroll;" id="style-6" v-chat-scroll>
                    @foreach($messages->reverse() as $message)
                    <div class="message @if($message->from_id == \Auth::id()) self @endif">
                        <div class="message-wrapper">
                            <div class="message-content">
                                <span>
                                    {{ $message->message }}
                                </span>
                            </div>
                        </div>
                        <div class="message-options">
                            <div class="avatar avatar-sm">
                                @if($message->from_id == \Auth::id())
                                    <img alt="" src="{{ asset('site/img/avatars/two.png') }}">
                                @else
                                    <img alt="" src="{{ asset('site/img/avatars/first.png' ) }}">
                                @endif
                            </div>
                            <span class="message-date">{{ $message->created_at->diffForHumans() }}</span>
                            <div class="dropdown">
                                <a class="text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                    </svg>
                                </a>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Copy</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                        </svg>
                                        <span>Replay</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18  rotate-y mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                        </svg>
                                        <span>Forward</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                        </svg>
                                        <span>Favourite</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                <message-component v-for="value,index in chat.message"
                                   :user="chat.user[index]?chat.user[index]:{{ $user }}"
                                   :isActive=chat.isActive[index]
                                   :time=chat.time[index]
                                   :image="'{{ asset('site/img/avatars/first.png') }}'"
                                   :key="value.index">
                    @{{ value }}
                </message-component>
                </div>
                <div>

                        @csrf
                        <div class="form-group" >
                            <input type="text" class="form-control" v-model="message" @keyup.enter="send"  placeholder="Message" name="message">
                            <input type="number" hidden name="user_id" >
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success w-25" v-on:click="send">Sent</button>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $( window ).on('load',scrollDown())
        function scrollDown() {
            $('#style-6').scrollTo(-1)
        }
    </script>
@stop

