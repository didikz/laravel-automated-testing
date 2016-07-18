@if($errors->any())
    <div class="alert alert-danger alert-dismissable alert-important">
        <ul>
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">&times;</button>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => session('flash_notification.title'),
            'body'       => session('flash_notification.message')
        ])
    @else
        <div class="alert
                    alert-{{ session('flash_notification.level') }}
                    {{ session()->has('flash_notification.important') ? 'alert-important' : '' }}"
        >
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>

            {!! session('flash_notification.message') !!}
        </div>
    @endif
@endif
