<tr>
<td class="header">
@if (trim($slot) === 'Laravel')
<img src="https://www.bcmanabi.com/img/logolr.png" alt="{{config('app.name', 'Laravel')}}" style="width:45%">
<!--<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">-->
@else
<img src="https://www.bcmanabi.com/img/logolr.png" alt="{{config('app.name', 'Laravel')}}" style="width:45%">
<!--{{ $slot }}-->
@endif
</td>
</tr>
