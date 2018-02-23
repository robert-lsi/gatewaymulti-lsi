@extends('emails.master')

@section('title', env('EMAIL_ORDER_SUBJECT'))

@section('content')

<tr>
	<td>
        <p style="font-size:14px; margin-top:30px; margin-bottom:20px;">Hi {{ $name }},</p>
	</td>
</tr>

<tr>
	<td>
        <p style="font-size:14px; margin-top:30px; margin-bottom:20px;">Thank you for visiting us at SMMEX. Your personalised product will be despatched to you within the next couple of days.</p>
	</td>
</tr>

@foreach($basket as $row)
<tr>
	<td>
		<table cellpadding="0" cellspacing="0" border="0" width="600" align="center">
			<tr>
				<td width="100">
				    <img src="{{ $row->options->imageurl }}" width="80" height="80" alt="{{ $row->name }}">
				</td>
				<td>
					<p style="margin-top:0;margin-bottom:5px;font-size:20px;color:#DD5A12;">{{ $row->name }}</p>
					<p style="margin-top:0;margin-bottom:5px;font-size:14px;">Quantity: {{ $row->qty }}</p>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<img src="{{ asset('images/emails/hr.png') }}" style="display:block" border="0" />
	</td>
</tr>
@endforeach

<tr>
	<td>
        <p style="font-size:11px; margin-top:30px; margin-bottom:20px;">
            &copy; <a href="http://lsi.co.uk">LSi</a> 2018 @if(date('Y') !== '2018') &ndash; {{ date('Y') }} @endif
        </p>
	</td>
</tr>

@endsection