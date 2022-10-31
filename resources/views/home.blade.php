@extends('adminlte::page')
@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Selamat Datang di Dashboard</p>
                </div>
            </div>
        </div>
    </div>
    {{--  <bphutton id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>  --}}

    <div class="row">
        <div class="col-lg-4">
            <div class="info-box ">
                <span class="info-box-icon bg-info"><i class="fas fa-user-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"></span>
                  <span class="info-box-number"></span>
                </div>
              </div>
            </div>
        <div class="col-lg-4">
            <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number"></span>
            </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fa fa-fw fa-tasks"></i></span>
            <div class="info-box-content">
                <span class="info-box-text"></span>
                <span class="info-box-number"></span>
            </div>
            </div>
        </div>
    </div>
@stop
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

    var firebaseConfig = {
        apiKey: "AIzaSyCzxsb3f6qaAZeV6g5ILHycAuiRDGOjO1k",
        authDomain: "notiftes-a4953.firebaseapp.com",
        projectId: "notiftes-a4953",
        storageBucket: "notiftes-a4953.appspot.com",
        messagingSenderId: "969175479697",
        appId: "1:969175479697:web:af24f60476d360a76a9630"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route("save-token") }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });

            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
    }

    messaging.onMessage(function(payload) {
        console.log(payload);
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
            click_action: payload.notification.click_action,

        };
        var notif = new Notification(noteTitle, noteOptions);
        notif.onclick = (event)=>{
            event.preventDefault();
            window.open(payload.notification.click_action);
        }
    });

</script>
