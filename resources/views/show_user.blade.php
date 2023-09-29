<html>

<head>

</head>

<body>

    <h1>Nutzer mit Alter and Telefon</h1>
    <ul>
        @foreach ($users as $user)
           
            @switch($user)
                @case($user['age'] < 18 && !isset($user['phone']))
                    <li style="color: green">{{ $user['name'] }}
                        <small>{{ $user['email'] }}</small>
                    </li>
                @break

                @case($user['age'] >= 18 && !isset($user['phone']))
                    <li style="color: blue">{{ $user['name'] }}
                        <small>{{ $user['email'] }}</small>
                    </li>
                @break

                @case($user['age'] < 18 && isset($user['phone']))
                    <li style="color: brown">{{ $user['name'] }}
                        <small>{{ $user['email'] }}</small>
                    </li>
                @break

                @case($user['age'] >= 18 && isset($user['phone']))
                    <li style="color: magenta">{{ $user['name'] }}
                        <small>{{ $user['email'] }}</small>
                    </li>
                @break
            @endswitch
        @endforeach

    </ul>


    <h1>Nutzer mit Alter and Telefon</h1>
    <ul>
        @foreach ($users as $user)
            @if ($user['age'] < 18 && !isset($user['phone']))
                <li style="color: green">{{ $user['name'] }}
                    <small>{{ $user['email'] }}</small>
                </li>
            @endif

            @if ($user['age'] >= 18 && !isset($user['phone']))
                <li style="color: blue">{{ $user['name'] }}
                    <small>{{ $user['email'] }}</small>
                </li>
            @endif

            @if ($user['age'] < 18 && isset($user['phone']))
                <li style="color: brown">{{ $user['name'] }}
                    <small>{{ $user['email'] }}</small>
                </li>
            @endif

            @if ($user['age'] >= 18 && isset($user['phone']))
                <li style="color: magenta">{{ $user['name'] }}
                    <small>{{ $user['email'] }}</small>
                </li>
            @endif
        @endforeach

    </ul>
</body>


</html>
{{-- @extends('layouts.app')

@section('content')
	<div class="ui grid">
	@foreach ($users as $user)
		<div class="four wide column">
			<div class="ui card"> 
				<div class="content"> 
					<p class="header">{{$user['name']}} </p>
					<div class="description"> {{$user['email']}} <br> Alter: {{$user['age']}}
					</div>
					@isset($user['phone'])
					<div class="extra content">
						<a>
							<i class="phone icon"></i>
							{{$user['phone']}}
						</a>
					</div>
					@endisset
				</div>
			</div>
		</div>
	@endforeach
	</div>
@endsection
--}}
