 @if (session('message-updated'))
                         @component('admink.components.alert')
                             @slot('type')
                                 success
                             @endslot
                             {!! session('message-updated') !!}
                         @endcomponent
                      @endif     