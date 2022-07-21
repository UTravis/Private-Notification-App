@extends('template.app')

@section('contents')
    <div class="container">
        <h2 class="my-5 text-center">Notification App For {{auth()->user()->name}}</h2>
    </div>

    <div class="row justify-content-center text-center">
        <div class="col-md-5">
            <div class="dropdown custom-dropdown">
                <a href="javascript::void()" data-toggle="dropdown" class="dropdown-link" aria-haspopup="true" aria-expanded="false">
                    Notifications <i class="fa fa-bell" aria-hidden="true"></i> <span style="color: red">@{{noMsgs}}</span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="javascript::void()" class="dropdown-item">All Notifications </a>
                    <a href="" class="dropdown-item" title="Click to clear this message" v-on:click.prevent="markAsRead" v-for="message in messages">
                        <strong>@{{message.message}}</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="dropdown open">
        <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                    Dropdown
                </button>
        <div class="dropdown-menu" aria-labelledby="triggerId">
            <a class="dropdown-item" v-bind:href="message.id" v-for="message in messages" v-on:click.prevent="markAsRead">@{{message.message}}</a>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('notify/notify.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                messages: {},
                noMsgs: ''
            },
            mounted() {
                this.getMessage(),
                this.listen()
            },
            methods: {
                getMessage() {
                    axios.get('api/get-messages/{{ auth()->id() }}')
                        .then((result) => {
                            this.messages = result.data
                        }).catch((err) => {
                            console.log(err)
                        });
                },
                listen() {
                    Echo.private('new-message.{{ auth()->id() }}').listen('PostMessage', (e) => {
                            // alert("You've got a new messsage");
                            $.notify('You have a new notification');
                            this.messages.unshift(e)
                        });
                },
                markAsRead() {
                    var id = event.target.getAttribute('href');
                    axios.patch('api/mark-as-read/'+id)
                            .then((result) => {
                                this.getMessage();
                            }).catch((err) => {
                                console.log(err)
                            });
                }
            },
            computed: {
                getNoMessages() {
                    this.noMsgs = this.messages.length;
                    return this.noMsgs
                }
            }
        });
    </script>
@endpush
